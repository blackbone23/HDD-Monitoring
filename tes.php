#!/usr/bin/php -q
<?php

$con = mysql_connect("localhost","root","kartika");

if(!$con) {
	die('Could not connect : '.mysql_error());
}
else {
	$root = disk_free_space("/");
	$home = disk_free_space("/home");
	$root_giga = (($root/1024)/1024)/1024;
	$home_giga = (($home/1024)/1024)/1024;
	preg_match("/(\d{2,3})(.\.*)(\d{2})/is",$root_giga,$matches);
	preg_match("/(\d{2,3})(.\.*)(\d{2})/is",$root_giga,$matches2);	
	echo "Free Space in / : ";
	echo $matches[0];
	echo " GB\n";
	echo "Free Space in /home : ";
	echo $matches2[0];
	echo " GB\n";
}
