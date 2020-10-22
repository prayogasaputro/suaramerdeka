<?php
	include('conn.php');
	session_start();
	if(isset(FILTER_INPUT(INPUT_GET, 'code'))){
	FILTER_INPUT(INPUT_GET, 'uid');
	FILTER_INPUT(INPUT_GET, 'code');

	$query=mysqli_query($conn,"select * from user where userid='$user'");
	$row=mysqli_fetch_array($query);

	if($row['code']==$code){
		//activate account
		mysqli_query($conn,"update user set verify='1' where userid='$user'");
		?>
		<p>Account Verified!</p>
		<p><a href="index.php#portfolio">Login Now</a></p>
		<?php
	}
	else{
		FILTER_INPUT(INPUT_SESSION, 'sign_msg') = "Something went wrong. Please sign up again.";
  		header('location:index.php#contact');
	}
	}
	else{
		header('location:index.php');
	}
?>
