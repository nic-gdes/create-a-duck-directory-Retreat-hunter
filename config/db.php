<?php

$conn = mysqli_connect("db:3306", "db", "db", "db");

if (mysqli_connect_errno()) {
echo "Connection error: " . mysqli_connect_error();
}
?>