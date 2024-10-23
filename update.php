<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET name='$name', email='$email', position='$position', salary='$salary' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Employee</h2>
        <form method="POST" action="">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
            <label>Position:</label>
            <input type="text" name="position" value="<?php echo $row['position']; ?>"><br>
            <label>Salary:</label>
            <input type="number" name="salary" value="<?php echo $row['salary']; ?>"><br>
            <input type="submit" name="update" value="Update">
        </form>
        <a href="index.php">Back to List</a>
    </div>
</body>
</html>
