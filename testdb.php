<?php
$username = "hs0018_bini";
$password = "binipass";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
mysql_select_db(hs0018);
echo "Connected to MySQL<br>";


print_r($params);
print_r($active_record);
?>