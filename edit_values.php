<?php

// $conn = mysqli_connect('localhost','root','','pay2_db');
// // $query = "SELECT * FROM shifts WHERE user_id = '0'";
// $query = "SELECT * FROM shifts WHERE user_id = 0";
// $row_record = mysqli_query($conn, $query);
// $rec = mysqli_fetch_assoc($row_record);
// echo json_encode($rec);

?>

<?php
if (!empty($_POST['id'])) {
    $id = $_POST['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'pay2_db');

    $query = "SELECT * FROM shifts WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $rec = mysqli_fetch_assoc($result);
        echo json_encode($rec);
    } else {
        echo json_encode(['error' => 'Record not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid ID']);
}
?>