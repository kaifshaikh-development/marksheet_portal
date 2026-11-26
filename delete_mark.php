
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM marks
        WHERE id='$id' AND user_id='$user_id'";

mysqli_query($conn, $sql);

header("Location: dashboard.php");
exit;
?>

