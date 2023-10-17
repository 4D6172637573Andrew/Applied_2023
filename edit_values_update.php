<?php
if (!empty($_POST)) {
    if (isset($_POST['edit_values_rate'], $_POST['edit_values_uni_allow'], $_POST['edit_values_lau_allow'], $_POST['edit_values_pm_allow'], $_POST['edit_values_s_date'], $_POST['edit_values_s_time'], $_POST['edit_values_e_time'], $_POST['id'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'pay2_db');
        $query = "UPDATE shifts SET
            rate = '" . $_POST['edit_values_rate'] . "',
            uni_allow = '" . $_POST['edit_values_uni_allow'] . "', 
            lau_allow = '" . $_POST['edit_values_lau_allow'] . "', 
            pm_allow = '" . $_POST['edit_values_pm_allow'] . "',
            s_date = '" . $_POST['edit_values_s_date'] . "', 
            s_time = '" . $_POST['edit_values_s_time'] . "', 
            e_time = '" . $_POST['edit_values_e_time'] . "'
            WHERE id = '" . $_POST['id'] . "'";

        $isUpdated = mysqli_query($conn, $query);
        if ($isUpdated) {
            echo "Success";
        } else {
            echo "Error updating database: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid POST data";
    }
} else {
    echo "Empty POST data"; 
}




// if (!empty($_POST)) {
//     if (isset($_POST['edit_values_rate'], $_POST['edit_values_uni_allow'], $_POST['edit_values_lau_allow'], $_POST['edit_values_pm_allow'], $_POST['edit_values_s_date'], $_POST['edit_values_s_time'], $_POST['edit_values_e_time'], $_POST['id'])) {
//         $conn = mysqli_connect('localhost', 'root', '', 'pay2_db');
//         $query = "UPDATE shifts SET
//             rate = '" . $_POST['edit_values_rate'] . "',
//             uni_allow = '" . $_POST['edit_values_uni_allow'] . "', 
//             lau_allow = '" . $_POST['edit_values_lau_allow'] . "', 
//             pm_allow = '" . $_POST['edit_values_pm_allow'] . "',
//             s_date = '" . $_POST['edit_values_s_date'] . "', 
//             s_time = '" . $_POST['edit_values_s_time'] . "', 
//             e_time = '" . $_POST['edit_values_e_time'] . "'
//             WHERE id = '" . $_POST['id'] . "'";

//         $isUpdated = mysqli_query($conn, $query);
//         if ($isUpdated) {
//             echo "Success";
//         } else {
//             echo "Error updating database";
//         }
//     } else {
//         echo "Invalid POST data";
//     }
// }
?>
