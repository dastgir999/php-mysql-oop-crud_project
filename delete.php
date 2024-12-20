<?php
require_once 'classes/Database.php';
require_once 'classes/Crud.php';

$db = (new Database())->connect();
$crud = new Crud($db);

$id = $_GET['id'];

if ($crud->delete($id)) {
    header("Location: index.php");
} else {
    echo "Error deleting user.";
}
?>
