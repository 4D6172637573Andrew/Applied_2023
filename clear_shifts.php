<?php
require "includes/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($conn = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME)))
    echo mysqli_query($conn, "DELETE FROM shifts") ? "success" : "error";
mysqli_close($conn);


?>
