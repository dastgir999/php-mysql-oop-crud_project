<?php
require_once 'classes/Database.php';
require_once 'classes/Crud.php';

$db = (new Database())->connect();
$crud = new Crud($db);

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    if ($crud->create($name, $email, $age)) {
        header("Location: index.php");
    } else {
        echo "Error creating user.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Age:</label>
        <input type="number" name="age" required><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
