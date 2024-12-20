<?php
require_once 'classes/Database.php';
require_once 'classes/Crud.php';

$db = (new Database())->connect();
$crud = new Crud($db);

$id = $_GET['id'];
$user = null;

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    if ($crud->update($id, $name, $email, $age)) {
        header("Location: index.php");
    } else {
        echo "Error updating user.";
    }
} else {
    $user = $crud->readById($id);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <?php if ($user): ?>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
            <label>Age:</label>
            <input type="number" name="age" value="<?= $user['age'] ?>" required><br>
            <button type="submit">Update</button>
        </form>
    <?php else: ?>
        <p>User not found!</p>
    <?php endif; ?>
</body>
</html>
