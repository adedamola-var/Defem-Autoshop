<?php 

// connect to the database
	$conn = mysqli_connect('localhost', 'Ric', 'test1234', 'defem');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}



?>