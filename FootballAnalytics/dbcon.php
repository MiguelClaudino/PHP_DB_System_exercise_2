<?php
$DB_HOST = 'localhost';
$DB_USER = 'miguelclaudino';
$DB_PASS = 'Golfe1377';
$DB_NAME = 'miguelclaudino';
//$DB_PORT = '8889';

global $link;
$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>