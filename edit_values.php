<?php

$conn = mysqli_connect('localhost','root','','pay2_db');
// $query = "SELECT * FROM shifts WHERE user_id = '0'";
$query = "SELECT * FROM shifts WHERE id = [id]";
$row_record = mysqli_query($conn, $query);
$rec = mysqli_fetch_assoc($row_record);
echo json_encode($rec);

?>