<?php
$connection = new mysqli("localhost","root","","php_upload");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
