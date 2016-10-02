<?php
$ini = parse_ini_file('config.ini');


$mysqli = new mysqli($ini['db_server'], $ini['db_user'], $ini['db_password'], $ini['db_name']);
	
	/* check connection */
    if (mysqli_connect_errno()) {
        echo("DB Connection failed");
        exit();
    }


foreach(array('video', 'audio') as $type) {
    if (isset($_FILES["${type}-blob"])) {

        $fileName = $_POST["${type}-filename"];
        $uploadDirectory = __DIR__.'/uploads/';

        /* Create folder not exists */
        if (!is_dir($uploadDirectory)) {
        	
        	$old = umask(0);
		    mkdir($uploadDirectory, 0777, true);
		    umask($old);
		}

		/* Set writing permission */
		if(!chmod($path, 0777) ) {
		    chmod($path, 0777);
		}
		
        /* store the file to server */
        if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory.$fileName)) {
            echo(" Problem moving uploaded file, Please check folder exists and Writing permission");
            exit();
        }

        /* prepare statement */
        $stmt = $mysqli->prepare("INSERT INTO ". $ini['table_name'] ." (filename) VALUES (?)");
		if ($stmt === false) 
		{
			echo("Stament Failed");
			exit();
		}

		/* Bind value to statement */
		$stmt->bind_param('s', $filename);  

		/* execute prepared statement */
		$stmt->execute();

		if($stmt->affected_rows)
		{
			echo("Video Saved");
		}
		

		/* close statement and connection */
		$stmt->close();

		/* close connection */
		$mysqli->close();
    }
}
?>
