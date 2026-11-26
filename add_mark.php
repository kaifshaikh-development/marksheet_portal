
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_SESSION['user_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks_obtained'];

    $sql = "INSERT INTO marks
            (user_id, subject, marks_obtained)
            VALUES ('$user_id', '$subject', '$marks')";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error adding marks!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Marks</title>
</head>
<body>

<h2>Add Student Marks</h2>

<form method="POST">

    Subject:
    <input type="text" name="subject" required>
    <br><br>

    Marks Obtained:
    <input type="number" name="marks_obtained"
           min="0" max="100" required>
    <br><br>

    <button type="submit">Save Marks</button>

</form>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
