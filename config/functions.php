<?php 
//functions.php
function redirect($url)
{
	echo '<script>window.location = "'.$url.'";</script>';
}

function WebSet($var,$title)
{
	switch ($var) {
		case 'main-title':
			echo "BoxSync - $title";
			break;
		
		default:
			echo "Variable call function not found!!";
			break;
	}
}
function baseurl()
{
	echo "http://localhost/pms/";
}

function SearchKeyword()
{
	echo "Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates";
}

function emailexists($email)
{
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `users` WHERE uemail = '$email'");
	$stmt->execute();
	if ($stmt->rowCount()>0) {
		return 1;
	}else{
		return 0;
	}

}

function uname($uname)
{
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `users` WHERE user = '$uname'");
	$stmt->execute();
	if ($stmt->rowCount()>0) {
		return 1;
	}else{
		return 0;
	}
}

//$request = $_SERVER['REQUEST_URI']; echo $request;

function ResetPass($email)
{
	$npass = md5(147);
	$DB=DBCONN();
	if (checksts($email)==1) {
		$stmt = $DB->prepare("UPDATE `users` SET `pass`='$npass',`val_code`='1' WHERE `email` = '$email'");
		$r = $stmt->execute();
		if (empty($r)) {
			echo '<div class="alert alert-danger" role="alert">Server Technical Problem!</div>';
		}else{
			echo 1;
		}
	}else{
		echo '<div class="alert alert-danger" role="alert">You account suspended & can not recover password!</div>';
	}
	

}
function checksts($id){
		$DB=DBCONN();
		$stmt = $DB->prepare("SELECT * FROM `users` WHERE email = '$id'");
		$stmt->execute();
		$r = $stmt->fetchAll();
		foreach ($r as $k) { $sts = $k['status']; }

		if ($sts == '3') {
			return 0;
		}else{
			return 1;
		}
	}
function ShowName($id)
{
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `users` WHERE uemail OR user = '$id'");
	$stmt->execute();
	$r = $stmt->fetchAll();
	foreach ($r as $k) { 
		$fname = $k['user'];
	}
	echo $fname;

}

function AccStatus($id)
{
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `users` WHERE uemail OR user = '$id'");
	$stmt->execute();
	$r = $stmt->fetchAll();
	foreach ($r as $k) { 
		$fname = $k['user'];
	}
	echo $fname;

}


?>