<?php
include 'conn.php';
session_start();
$id = $_POST['id'];
$name = $_SESSION['email'];
$msg = $_POST['msg'];
if($msg != ""){
	$sql = $conn->query("INSERT INTO discussion (parent_comment, student, post)
			VALUES ('$id', '$name', '$msg')");
	echo json_encode(array("statusCode"=>200));
	header('location:index.php');
}
else{
	echo json_encode(array("statusCode"=>201));
}
$conn = null;

?>