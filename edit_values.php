<?php

$conn = mysqli_connect('localhost','root','','pay2_db');
$query = "SELECT * FROM table_fixed WHERE user_id = '0'";
$row_record = mysqli_query($conn, $query);
$rec = mysqli_fetch_assoc($row_record);
echo json_encode($rec);

?>