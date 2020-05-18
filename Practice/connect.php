<?php
//Connecting:
define('DB_HOST' , 'HOST' );
define('DB_USER' , 'USER');
define('DB_PASS' , 'PASSWORD');
define('DB_NAME' , 'DB NAME');
$connection = mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);
?>