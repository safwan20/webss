<?php

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
	die("CF".$conn->connect_error);
}

?>