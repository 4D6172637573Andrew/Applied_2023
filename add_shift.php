<?php
ob_start();
session_start();


if(isset($_POST['s_date'])){
    $start_date_str = $_POST['s_date'];
    $start_date_str = trim($start_date_str);
    $date = strtotime($start_date_str);

    if ($date !== false && $date !== -1) {
        $s_date = date('Y-m-d', $date);
    } else {
        die("Invalid date format for 's_date'");
    }
} else {
    die("'s_date' is empty");
}

if(isset($_POST['s_time'])){
    $s_time = $_POST['s_time'];
} else {
    $s_time = "";
}

$s_hour = isset($_POST['start_hour']) ? 1 : 0;
$e_time = isset($_POST['e_time']) ? $_POST['e_time'] : "";
$e_hour = isset($_POST['end_hour']) ? 1 : 0;
$rate = isset($_POST['rate']) ? $_POST['rate'] : "";
$uni_a = isset($_POST['uni_a']) ? $_POST['uni_a'] : "";
$lau_a = isset($_POST['lau_a']) ? $_POST['lau_a'] : "";
$pm_a = isset($_POST['pm_a']) ? $_POST['pm_a'] : "";
$help = isset($_POST['help']) ? $_POST['help'] : "";
$sal_pack = isset($_POST['sal_pack']) ? $_POST['sal_pack'] : "";
$other_in = isset($_POST['other_in']) ? $_POST['other_in'] : "";
$sat_pe = isset($_POST['sat_pe']) ? $_POST['sat_pe'] : "";
$sun_pe = isset($_POST['sun_pe']) ? $_POST['sun_pe'] : "";

$conn = mysqli_connect('localhost', 'root', '', 'pay2_db');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT COUNT(id) FROM shifts WHERE s_date = '".$s_date ."'";
$rec_present = mysqli_query($conn, $query);

if (!$rec_present) {
    die("Query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($rec_present);
$rec_present = $row['COUNT(id)'];

if ($rec_present >= 1) {
    echo ($rec_present);
} else {
    $query = "INSERT INTO shifts
    (
     s_date,
     s_time,
     s_holi,
     e_time,
     e_holi,
     rate,
     uni_allow,
     lau_allow,
     pm_allow
    )
    VALUES
    (
     '" . $s_date . "',
     '" . $s_time . "',
     '" . $s_hour . "',
     '" . $e_time . "',
     '" . $e_hour . "',
     '" . $rate . "',
     '" . $uni_a . "',
     '" . $lau_a . "',
     '" . $pm_a . "'
    ) ";



    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo "Shift added successfully";
}
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>
