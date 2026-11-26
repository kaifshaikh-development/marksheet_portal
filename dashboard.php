
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM marks WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>

<body>

<h1>Welcome to Student Dashboard</h1>

<h2>
    Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!
</h2>

<a href="add_mark.php">Add New Marks</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Subject</th>
    <th>Marks</th>
    <th>Actions</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td>
        <?php echo $row['id']; ?>
    </td>

    <td>
        <?php echo htmlspecialchars($row['subject']); ?>
    </td>

    <td>
        <?php echo $row['marks_obtained']; ?>
    </td>

    <td>
        <a href="edit_mark.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete_mark.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete?')">
            Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="logout.php">Logout</a>

</body>
</html>
