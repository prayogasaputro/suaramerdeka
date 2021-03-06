<?php
	include('conn.php');
	session_start();

	FILTER_INPUT(INPUT_SERVER, REQUEST_METHOD) == "POST") {

	function check_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	$email=check_input(FILTER_INPUT(INPUT_POST, 'email'));
	$password=md5(check_input(FILTER_INPUT(INPUT_POST, 'password')));

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		FILTER_INPUT(INPUT_SESSION, 'sign_msg') = "Invalid email format";
  		header('location:index.php#contact');
	}

	else{

		$this->db->from('user');
		$this->db->where('email', '$email');
		$query= $this->db->get();
		if($query->result_array()>0){
			FILTER_INPUT(INPUT_SESSION, 'sign_msg') = "Email already taken";
  			header('location:index.php#contact');
		}
		else{
		//depends on how you set your verification code
		$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code=substr(str_shuffle($set), 0, 12);
			
		$data = array(
		'email' => '$email',
		'password' => '$password',
		'code' => '$code');
		$this->db->insert('user', $data);
		$uid=mysqli_insert_id($conn);
		//default value for our verify is 0, means it is unverified

		//sending email verification
		$to = $email;
			$subject = "Sign Up Verification Code";
			$message = "
				<html>
				<head>
				<title>Verification Code</title>
				</head>
				<body>
				<h2>Thank you for Registering.</h2>
				<p>Your Account:</p>
				<p>Email: ".$email."</p>
				<p>Password: ".FILTER_INPUT(INPUT_POST, 'password')."</p>
				<p>Please click the link below to activate your account.</p>
				<h4><a href='http://localhost/suara_merdeka_v2/activate.php?uid=$uid&code=$code'>Activate My Account</h4>
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: webmaster@sourcecodester.com". "\r\n" .
						"CC: ndevierte@gmail.com";

		mail($to,$subject,$message,$headers);

		FILTER_INPUT(INPUT_SESSION, 'sign_msg') = "Verification code sent to your email.";
  		header('location:index.php#contact');

  		}
	}
	}
?>
