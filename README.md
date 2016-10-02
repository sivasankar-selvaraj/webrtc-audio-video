Record video on webcam using web-rtc
====================================================
 Record video from web-cam and store to server and also download recorded video 

Configuration
============
1) Cloning or download this repository to your machine - [/var/www/]

2) Open apache config file 
	vi /etc/apache2/site-enabled/000-default.conf

3) Change apache config file settings like 

	<VirtualHost *:80>
		DocumentRoot /var/www/video-capture
			<Directory /var/www/video-capture/>
		          DirectoryIndex index.html
		          Require all granted
		         Options Indexes FollowSymLinks MultiViews
		         AllowOverride All
		         Order allow,deny
		         allow from all
		    </Directory>
	    ErrorLog ${APACHE_LOG_DIR}/error.log
	    CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>

4) Restart apache
	sudo service apache2 restart

5) Run the following cmd to create db and table
	mysql -u root -p < db.sql

6) Change the db configuration in config.ini file



Output
======
	To open http://localhost on browser


    
