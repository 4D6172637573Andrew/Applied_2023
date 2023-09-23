<?php
if (!empty($_POST)) {
    $conn = mysqli_connect('localhost','root','','pay2_db');
    $query = "UPDATE table_fixed SET
        help = '" . $_POST['edit_fixed_row_help'] ."', 
        sal_pack = '" . $_POST['edit_fixed_row_sal_pack'] ."', 
        other_income = '" . $_POST['edit_fixed_row_other_income'] ."', 
        other_deduct = '" . $_POST['edit_fixed_row_other_deduct'] ."', 
        sat_penalty = '" . $_POST['edit_fixed_row_sat_penalty'] ."', 
        sun_penalty = '" . $_POST['edit_fixed_row_sun_penalty'] ."', 
        tax = '" . $_POST['edit_fixed_row_tax'] ."'
        WHERE user_id ='0'";
    $isUpdated = mysqli_query($conn, $query);
}
?>  