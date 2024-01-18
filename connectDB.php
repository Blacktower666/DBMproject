<?php
	$servername="localhost";
	$username="root";
	$password="";
	$db="dbmproject";

	//create connection
	$conn= new mysqli($servername,$username,$password,$db);
	
	//check connection
	if ($conn->connect_error){
		die("connection failed: ".$conn->connect_error);
	}
	echo "<script>alert('database server connected successfully')</script><br>";
	return ($conn);
?>
