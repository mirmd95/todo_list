<?php
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

   file_put_contents('test.txt', $_GET['id']);
    //$sql = "UPDATE task SET status=1 WHERE id=".$_GET['id'];
    $sql = "DELETE FROM task  WHERE id=".$_GET['id'];
	mysqli_query($db, $sql);

?>