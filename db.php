<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "marksheet_db"
);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

echo "Database Connected Successfully!";

?>