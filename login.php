<?php
	include('conn.php');
	session_start();
	
	if (FILTER_INPUT(INPUT_SERVER, "REQUEST_METHOD" == "POST") {

		function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}

		$email=check_input(FILTER_INPUT(INPUT_POST, 'email');
		$password=md5(check_input(FILTER_INPUT(INPUT_POST, 'password');

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			FILTER_INPUT(INPUT_SESSION, 'log_msg') = "Invalid email format";
  			header('location:index.php');
		}
		else{
			$query=mysqli_query($conn,"select * from user where email='$email' and password='$password'");
			if(mysqli_num_rows($query)==0){
				FILTER_INPUT(INPUT_SESSION, 'log_msg') = "User not found";
  				header('location:index.php');
			}
			else{
				$row=mysqli_fetch_array($query);
				if($row['verify']==0){
					FILTER_INPUT(INPUT_SESSION, 'log_msg') = "User not verified. Please activate account";
  					header('location:index.php');
				}
				else{
					FILTER_INPUT(INPUT_SESSION, 'id')=$row['userid'];
					header('location:index.php');
				}
			}
		}

	}
?>
