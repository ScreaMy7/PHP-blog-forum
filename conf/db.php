<?php 
	$conn =mysqli_connect('localhost','root', 'password', 'test');

	//check
	if(mysqli_connect_errno()){
		echo 'Failed to connect to database';
	}