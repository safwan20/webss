<?php

include('connect.php');


$sql = "SELECT * FROM safwan  WHERE id=".$_GET['id'];
$result = $conn->query($sql);

$row = $result->fetch_assoc();


echo $row['first']."<br>";
echo $row['last']."<br>";
echo $row['email']."<br>";
echo $row['club']."<br>";
echo $row['events']."<br>";





?>