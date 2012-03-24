#!/usr/bin/php -q
<?php

$con = mysql_connect("localhost","root","slamdunk");

if(!$con) {
	die('Could not connect : '.mysql_error());
}
else {

	echo "Free Space in / : ";
	echo disk_free_space("/");
	echo " Byte\n";
	echo "Free Space in /home : ";
	echo disk_free_space("/home");
	echo " Byte\n";
}
