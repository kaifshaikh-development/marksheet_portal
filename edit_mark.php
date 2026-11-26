
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $subject = $_POST['subject'];
    $marks = $_POST['marks_obtained'];

    $sql = "UPDATE marks
            SET subject='$subject',
            marks_obtained='$marks'
            WHERE id='$id' AND user_id='$user_id'";

    mysqli_query($conn, $sql);

    header("Location: dashboard.php");
    exit;
}

$sql = "SELECT * FROM marks
        WHERE id='$id' AND user_id='$user_id'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Record not found!");
}
?>

<h2>Edit Student Marks</h2>

<form method="POST">

Subject:
<input type="text" name="subject"
value="<?php echo htmlspecialchars($row['subject']); ?>" required>

<br><br>

Marks:
<input type="number" name="marks_obtained"
value="<?php echo $row['marks_obtained']; ?>"
min="0" max="100" required>

<br><br>

<button type="submit">Update Marks</button>

</form>
