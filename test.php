

<?php
$start_date_str = "2023-05-06";
$date = strtotime($start_date_str);
$s_date = date('d-m-20y', $date);

$conn = mysqli_connect('localhost', 'root', '', 'pay2_db');
$query = "SELECT COUNT(id) FROM shifts WHERE s_date = '".$start_date_str ."'";
$rec_present = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($rec_present);
$rec_present = ($row['COUNT(id)']);

//echo ($rec_present );
echo ($s_date);

