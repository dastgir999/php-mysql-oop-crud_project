<?php
require_once 'classes/Database.php';
require_once 'classes/Crud.php';

$db = (new Database())->connect();
$crud = new Crud($db);

$users = $crud->read();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD with OOP PHP</title>
    <style type="text/css">
        *{margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body{
            display: flex;
            justify-content:center;
            align-items: center;
            background: whitesmoke;
            flex-direction: column;
            width:100%;
            min-height:100vh;
        }

        table{
            width:60%;
            border-collapse: collapse;
            padding:10px;
        }

        h1{
            color:red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>PHP MYSQL OOP PHP CRUD SYSTEM!</h1>
    <a href="create.php">Add User</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['age'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $user['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
