#!/usr/bin/php -q
<?php

echo "Free Space in / : ";
echo disk_free_space("/");
echo " Byte\n";
echo "Free Space in /home : ";
echo disk_free_space("/home");
echo " Byte\n";

