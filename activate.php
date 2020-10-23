<?php
	include 'conn.php';
	session_start();
	if(isset(FILTER_INPUT(INPUT_GET, 'code'))){
	FILTER_INPUT(INPUT_GET, 'uid');
	FILTER_INPUT(INPUT_GET, 'code');

	$this->db->from('user');
	$this->db->where('email', '$email');
	$query=$thi->db->get();
	$row=($query->resoult_array());

	if($row['code']==$code){
		//activate account
		$this->db->set('verify', '1');
		$this->db->where('userid', '$user');
		$this->db->update('user');
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
