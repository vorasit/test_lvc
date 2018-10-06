<?php
$mysqlconnect = mysql_connect("localhost","root","12345678") or die("Error Connect to Database");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>