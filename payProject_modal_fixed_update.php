<?php
if (!empty($_POST)) {
    $conn = mysqli_connect('localhost', 'root', '', 'pay2_db');
    
    // Define the array keys to avoid undefined index warnings
    $edit_fixed_row_keys = [
        'edit_fixed_row_help',
        'edit_fixed_row_sal_pack',
        'edit_fixed_row_other_income',
        'edit_fixed_row_other_deduct',
        'edit_fixed_row_sat_penalty',
        'edit_fixed_row_sun_penalty',
        'edit_fixed_row_tax'
    ];
    
    // Initialize an array to hold the values for the query
    $query_values = [];
    
    // Check if each key exists in $_POST and build the query values
    foreach ($edit_fixed_row_keys as $key) {
        if (isset($_POST[$key])) {
            $query_values[$key] = $_POST[$key];
        } else {
            // Handle the case when the key is not set (you can provide a default value or handle it as needed)
            $query_values[$key] = 'default_value'; // Change 'default_value' to your desired default value
        }
    }
    
    // Build the query with the defined values
    $query = "UPDATE table_fixed SET
        help = '" . $query_values['edit_fixed_row_help'] . "',
        sal_pack = '" . $query_values['edit_fixed_row_sal_pack'] . "',
        other_income = '" . $query_values['edit_fixed_row_other_income'] . "',
        other_deduct = '" . $query_values['edit_fixed_row_other_deduct'] . "',
        sat_penalty = '" . $query_values['edit_fixed_row_sat_penalty'] . "',
        sun_penalty = '" . $query_values['edit_fixed_row_sun_penalty'] . "',
        tax = '" . $query_values['edit_fixed_row_tax'] . "'
        WHERE user_id = '0'";
    
    $isUpdated = mysqli_query($conn, $query);
}
?>
