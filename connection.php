<?php
session_start();
$_SESSION['ename'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$email = $_SESSION['ename'];
$password = $_SESSION['password'];
$conn = new mysqli('localhost', 'root', '', 'testsql');
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO test (email, password)
// VALUES ('" . "$email" . "','" . "$password" . "')";


// $sql = "UPDATE test SET email='Doe@gmail.com' WHERE id=2";

$sql = "DELETE FROM test WHERE id=3";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();