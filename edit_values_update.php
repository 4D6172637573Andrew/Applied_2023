<?php
if (!empty($_POST)) {
    $conn = mysqli_connect('localhost', 'root', '', 'pay2_db');

    $query = "UPDATE shifts SET
        rate = '" . $_POST['edit_values_rate'] . "', 
        uni_allow = '" . $_POST['edit_values_uni_allow'] . "', 
        lau_allow = '" . $_POST['edit_values_lau_allow'] . "', 
        pm_allow = '" . $_POST['edit_values_pm_allow'] . "',
        s_date = '" . $_POST['edit_values_s_date'] . "', 
        s_time = '" . $_POST['edit_values_s_time'] . "', 
        e_time = '" . $_POST['edit_values_e_time'] . "'
        WHERE user_id = '0'";

    $isUpdated = mysqli_query($conn, $query);
}
?>