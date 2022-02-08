<?php
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

file_put_contents('test.txt', $_GET['id']);
    $sql = "UPDATE relation SET connect=1 WHERE id=".$_GET['id'];
	mysqli_query($db, $sql);

?>