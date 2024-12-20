<?php

class Crud {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($name,$email,$age){

    	$query = "INSERT INTO `users`(name,email,age) VALUES(:name,:email,:age)";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':name',$name);
    	$stmt->bindParam(':email',$email);
    	$stmt->bindParam(':age',$age);
    	return $stmt->execute();

    }

    public function read(){
    	$query = "SELECT * FROM `users`";
    	$stmt = $this->conn->prepare($query);
    	$stmt->execute();
    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id) {
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    public function update($id,$name,$email,$age){
    	$query = "UPDATE `users` SET name = :name, email = :email, age = :age
    	WHERE id = :id
    	";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':id',$id);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':age',$age);
        return $stmt->execute();
    }

    public function delete($id){
    	$query = "delete FROM `users` WHERE id = :id";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':id',$id);
    	return $stmt->execute();
    }

}






?>