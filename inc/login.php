<?php 
//login-check.php

include('../config/init.php');
if (isset($_POST['login'])) {	
	$uname = $_POST['uname'];
	$email = $_POST['uname'];
	$upass = md5($_POST['upass']);
	$DB=DBCONN();
	$ustmt = $DB->prepare("SELECT * FROM `users` WHERE uemail = :uem OR user = :usn");
	$pstmt = $DB->prepare("SELECT * FROM `users` WHERE upass = :ups");
	$ustmt->bindParam(':usn',$uname);
	$ustmt->bindParam(':uem',$email);
	$pstmt->bindParam(':ups',$upass);
	$ustmt->execute();
	$pstmt->execute();
	$uFetch = $ustmt->fetchAll();
	$pFetch = $pstmt->fetchAll();
	$_SESSION['uname'] = "";
	$_SESSION['upass'] = "";
	$_SESSION['logged'] = "";
	$_SESSION['sts'] = "";
	foreach ($uFetch as $k) { $_SESSION['uname'] = $k['user']; $_SESSION['sts'] = $k['status'];}
	foreach ($pFetch as $k) { $_SESSION['upass'] = $k['upass']; $_SESSION['role'] = $k['role']; }
	if ($_SESSION['uname'] == ($uname || $email)) {
		if ($_SESSION['upass'] == $upass && $_SESSION['sts'] == '1') {
			$_SESSION["logged"] = "yes";
			echo 1;
		}else{
			if ($_SESSION['sts'] == '0') {
				echo '<div class="alert alert-info" role="alert">Your account is pending review</div>';
			}else if ($_SESSION['sts'] == '2') {
				echo '<div class="alert alert-warning" role="alert">Your account is deactive and try to reset system</div>';
			}else if ($_SESSION['sts'] == '3') {
				echo '<div class="alert alert-danger" role="alert">Your account is Suspend</div>';
			}else{
				echo '<div class="alert alert-danger" role="alert">Wrong Password!</div>';
			}
		}
	}else if ($_SESSION['uname'] != ($uname || $email) && $_SESSION['upass'] != $upass) {
		echo '<div class="alert alert-danger" role="alert">Wrong Username & Password!</div>';
	}else{
		echo '<div class="alert alert-danger" role="alert">Wrong Username!</div>';
	}
}else if (isset($_POST['register'])) {
		$email = $_POST['email'];
		$psone = $_POST['upass'];
		$usname = $_POST['uname'];
			if (emailexists($email)==0) {
				if (uname($usname)==0) {
					
					$DB=DBCONN();
					$stmt = $DB->prepare("INSERT INTO `users`(`uemail`, `user`, `upass`, `role`, `status`) 
						VALUES (:email,:uname,:upass,:role,:status)");
					$result = $stmt->execute(array(
									'email' => $_POST['email'],
									'uname' => $_POST['uname'],
									'upass' =>  md5($_POST['upass']),
									'role' =>  '2',
									'status' => '0'
									)
					);

					if (!empty($result)) {
						
						echo 1;
					}else
					{
						echo '<div class="alert alert-danger" role="alert">Could not insert!</div>';
					}
				}else{
					echo '<div class="alert alert-warning" role="alert">'.$usname.' already taken.</div>';
				}
			}else{
				echo '<div class="alert alert-warning" role="alert">'.$email. ' already exists.</div>';
			}
}else if (isset($_POST['reset'])) {
		if (emailexists($_POST['email'])==1) {
			ResetPass($_POST['email']);
		}else{
			echo '<div class="alert alert-danger" role="alert">Email not found!</div>';
		}
}


?>