<?php
require "includes/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $rowId = $_POST['id'];


    $conn = new mysqli(HOST, DBUSER, DBPASS, DBNAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM shifts WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameter to the statement
        $stmt->bind_param("i", $rowId);

        // Execute the statement
        if ($stmt->execute()) {
            // The row has been successfully deleted
            echo "Row with ID $rowId has been deleted successfully.";
        } else {
            // Handle execution error
            echo "Error executing the DELETE query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle statement preparation error
        echo "Error preparing the DELETE statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle invalid or missing data
    echo "Invalid request.";
}
?>




