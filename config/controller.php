<?php 
function CourseLoad(){
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `courses` ORDER BY id DESC");
	$stmt->execute();
	$Result = $stmt->fetchAll();
	foreach ($Result as $k) { ?>
	<a href="course?courseid=<?php echo($k['id']); ?>" class="card card-background" style="background-image: url('<?php echo($k['img']); ?>')">
            <div class="card-body">
                <div class="card-title text-left">
                    <h3><?php echo($k['coursename']); ?></h3>
                </div>
            </div>
	    </a> 
		
<?php }

}

function SingleCourseLoad($id){
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `courses` WHERE `id` = $id");
	$stmt->execute();
	$Result = $stmt->fetchAll();
	foreach ($Result as $k) { ?>
	<div class="container">
            
            <div class="card card-background" style="background-image: url('<?php echo($k['img']); ?>')">
                <div class="card-data">
                    <h3><?php echo($k['coursename']); ?></h3>
                </div>
            </div>
            <p class="text-justify">
                <?php echo($k['content']); ?>
            </p>

            <div class="course-video text-center">
                <a href="<?php echo($k['ytblink']); ?>" class="course-video-start">
                    <div class="btn btn-success btn-round">
                        <i class="flaticon-play"></i>
                    </div>
                </a>
            </div>
        </div> 
		
<?php }

}

function ShowNotification(){
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `notify` WHERE `sts` = 1 ORDER BY `id` DESC");
	$stmt->execute();
	$Result = $stmt->fetchAll();
	foreach ($Result as $k) { 
		echo '<div class="alert alert-success rounded" role="alert"><div class="container">
            	<div class="alert-icon"><i class="flaticon-bell"></i></div>
            	<strong>Notice!</strong> '.$k['title'].'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><i class="flaticon-cancel"></i></span></button></div></div>';
	}
}
function ProfileInfo(){
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `user` WHERE `email` = '".$_SESSION['email']."'");
	$stmt->execute();
	$Result = $stmt->fetchAll();
	foreach ($Result as $k) { 
		echo('<div class="profile-data"><div class="pd-photo"><img src="'.$k['img'].'" alt=""></div>
                <div class="pd-data"><h3>'.$k['fullname'].'</h3><p>'.$k['title'].'</p></div></div>');

 }

}

function ProfileInfoTeacher(){
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `teacher`");
	$stmt->execute();
	$Result = $stmt->fetchAll();
	foreach ($Result as $k) { 
		echo('<div class="profile-data"><div class="pd-photo"><img src="'.$k['img'].'" alt=""></div>
                <div class="pd-data"><h3>'.$k['fullname'].'</h3><p>'.$k['title'].'</p></div></div>');

 }

}

function ShowBloodGroup(){
	$DB=DBCONN();
	$stmt = $DB->prepare("SELECT * FROM `bloodgroup`");
	$stmt->execute();
	$Result = $stmt->fetchAll();
	foreach ($Result as $k) { 
		echo('<tr><td>'.$k['id'].'</td><td>'.$k['fullname'].'</td><td>'.$k['bgroup'].'</td></tr>');

 }

}

function Login(){
		if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {

				header('Location: home');
			}
		if (isset($_GET['rollid']) && isset($_GET['pass'])) {
			$rollid = $_GET['rollid'];
			$pass = $_GET['pass'];
			$DB=DBCONN();
			$stmt = $DB->prepare("SELECT * FROM `user` WHERE email = :rollid AND password = :pass");
			$stmt->bindParam(':rollid',$rollid);
			$stmt->bindParam(':pass',$pass);
			$stmt->execute();
			$Result = $stmt->fetchAll();
			$_SESSION['email'] = null;
			$_SESSION['logged'] = false;
			$_SESSION['role'] = null;
			foreach ($Result as $k) { 
				$_SESSION['email'] = $k['email']; 
				$_SESSION['logged'] = true;
				$_SESSION['role'] = $k['role'];
				header('Location: home');
			}
			
		}

 ?>
	<div class="login-part">
        <div class="container">
            <div class="login-logo text-center mb-4">
                <img src="assets/img/logo.png" width="100" alt="">
            </div>
            <form action="login">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="rollid" placeholder="Board Roll" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="password" name="pass" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        	<input type="submit" class="btn btn-primary" style="width: 100%;" value="Login">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php

}

function AddTeacher(){
		if (isset($_GET['tname']) && isset($_GET['tid'])) {
			$tname = $_GET['tname'];
			$tid = $_GET['tid'];
			$tpass = $_GET['tpass'];
			$timg = $_GET['timglink'];
			$ttitle = $_GET['ttitle'];
			$temail = $_GET['temail'];
			$tmobile = $_GET['tmobile'];
			$DB=DBCONN();
			$tstmt = $DB->prepare("INSERT INTO `teacher`(`fullname`, `tid`, `title`, `emailadd`, `mobile`, `img`) VALUES (:name,:tid,:title,:email,:mobile,:img)");
			$result = $tstmt->execute(array(
					'name' => $tname,
					'tid' => $tid,
					'img' =>  $timg,
					'title' =>  $ttitle,
					'email' =>  $temail,
					'mobile' => $tmobile
				)
			);
			$stmt = $DB->prepare("INSERT INTO `user`(`title`, `fullname`, `email`, `password`, `role`, `img`) VALUES (:title,:name,:tid,:pass,:role,:img)");
			$result = $stmt->execute(array(
					'name' => $tname,
					'tid' => $tid,
					'pass' =>  $tpass,
					'img' =>  $timg,
					'title' =>  $ttitle,
					'role' =>  '2'
				)
			);
			if (!empty($result)) {
						
				echo '<div class="alert alert-success" role="alert">Successfully save</div>';
				header('Location: author-admin');
			}else{
				echo '<div class="alert alert-danger" role="alert">Could not insert!</div>';
			}
			
		}

 ?>
	<div class="">
		<div class="container">
			<div class="card card-contact card-raised">
				<form action="author-admin" role="form" id="contact-form1">
					<div class="card-header text-center">
						<h4 class="card-title">Add Teacher</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 pr-2">
								<div class="form-group">
									<label>Teacher Name</label>
									<div class="input-group">
										<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
										</div>
										<input type="text" name="tname" class="form-control" placeholder="Teacher Name" aria-label="Teacher Name">
									</div>
								</div>
							</div>
							<div class="col-md-6 pl-2">
								<div class="form-group">
									<label>Teacher I'd</label>
									<div class="input-group">
										<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
										</div>
										<input type="text" name="tid" class="form-control" placeholder="Teacher I'd" aria-label="Teacher I'd">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="tpass" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label>Photo</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="timglink" class="form-control" placeholder="Image Url">
							</div>
						</div>
						<div class="form-group">
							<label>Job Title</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="ttitle" class="form-control" placeholder="Job Title">
							</div>
						</div>
						<div class="form-group">
							<label>Email address</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="email" name="temail" class="form-control" placeholder="Email Address">
							</div>
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="tmobile" class="form-control" placeholder="Mobile Number">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="submit" class="form-control" value="Save">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
<?php

}

function AddStudent(){
		if (isset($_GET['sname']) && isset($_GET['sid'])) {
			$name = $_GET['sname'];
			$id = $_GET['sid'];
			$pass = $_GET['spass'];
			$img = $_GET['simglink'];
			$title = $_GET['stitle'];
			$email = $_GET['semail'];
			$mobile = $_GET['smobile'];
			$DB=DBCONN();
			$tstmt = $DB->prepare("INSERT INTO `students`(`fullname`, `sid`, `title`, `emailid`, `mobile`, `img`) VALUES (:name,:tid,:title,:email,:mobile,:img)");
			$result = $tstmt->execute(array(
					'name' => $name,
					'tid' => $id,
					'img' =>  $img,
					'title' =>  $title,
					'email' =>  $email,
					'mobile' => $mobile
				)
			);
			$stmt = $DB->prepare("INSERT INTO `user`(`title`, `fullname`, `email`, `password`, `role`, `img`) VALUES (:title,:name,:tid,:pass,:role,:img)");
			$result = $stmt->execute(array(
					'name' => $name,
					'tid' => $id,
					'pass' =>  $pass,
					'img' =>  $img,
					'title' =>  $title,
					'role' =>  '0'
				)
			);
			if (!empty($result)) {
						
				echo '<div class="alert alert-success" role="alert">Successfully save</div>';
				header('Location: author-admin');
			}else{
				echo '<div class="alert alert-danger" role="alert">Could not insert!</div>';
			}
			
		}

 ?>
	<div class="">
		<div class="container">
			<div class="card card-contact card-raised">
				<form action="author-admin" role="form" id="contact-form1">
					<div class="card-header text-center">
						<h4 class="card-title">Add Student</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 pr-2">
								<div class="form-group">
									<label>Student Name</label>
									<div class="input-group">
										<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
										</div>
										<input type="text" name="sname" class="form-control" placeholder="Student Name" aria-label="Student Name">
									</div>
								</div>
							</div>
							<div class="col-md-6 pl-2">
								<div class="form-group">
									<label>Student I'd</label>
									<div class="input-group">
										<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
										</div>
										<input type="text" name="sid" class="form-control" placeholder="Student I'd" aria-label="Student I'd">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="spass" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label>Photo</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="simglink" class="form-control" placeholder="Image Url">
							</div>
						</div>
						<div class="form-group">
							<label>Dept & Section</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="stitle" class="form-control" placeholder="Dept & Section">
							</div>
						</div>
						<div class="form-group">
							<label>Email address</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="email" name="semail" class="form-control" placeholder="Email Address">
							</div>
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
								</div>
								<input type="text" name="smobile" class="form-control" placeholder="Mobile Number">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="submit" class="form-control" value="Save">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
<?php

}
function CreateNotify(){
		if (isset($_GET['ntitle'])) {
			$DB=DBCONN();
			$tstmt = $DB->prepare("INSERT INTO `notify`(`title`) VALUES (:name)");
			$result = $tstmt->execute(array(
					'name' => $_GET['ntitle']
				)
			);
			if (!empty($result)) {
						
				echo '<div class="alert alert-success" role="alert">Successfully save</div>';
				header('Location: author-admin');
			}else{
				echo '<div class="alert alert-danger" role="alert">Could not insert!</div>';
			}
			
		}

 ?>
	<div class="container">
		<div class="card card-raised card-contact">
			<div class="card-body">
				<form action="">
					<div class="form-group">
						<label>New Update for Students</label>
						<textarea name="ntitle" class="form-control" id="message" rows="6"></textarea>
					</div>

						<div class="col-md-6">
							<button type="submit" class="btn btn-primary btn-round pull-right">Send Message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
<?php

}

function AddCourse(){
		if (isset($_GET['ctitle'])) {
			$DB=DBCONN();
			$tstmt = $DB->prepare("INSERT INTO `courses`(`coursename`, `content`, `ytblink`, `img`) VALUES (:title,:message,:link,:imglink)");
			$result = $tstmt->execute(array(
					'link' => $_GET['clink'],
					'imglink' => $_GET['cimglink'],
					'title' => $_GET['ctitle'],
					'message' => $_GET['cmessage']
				)
			);
			if (!empty($result)) {
						
				echo '<div class="alert alert-success" role="alert">Successfully save</div>';
				header('Location: author-admin');
			}else{
				echo '<div class="alert alert-danger" role="alert">Could not insert!</div>';
			}
			
		}

 ?>
	<div class="container">
		<div class="card card-raised card-contact">
            <div class="card-header text-center">
                <h4 class="card-title">Add Course</h4>
            </div>
			<div class="card-body">
				<form action="">
					<div class="form-group">
                        <label>Course URL</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
                            </div>
                            <input type="text" name="clink" class="form-control" placeholder="Course URL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Course Photo</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
                            </div>
                            <input type="text" name="cimglink" class="form-control" placeholder="Image URL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Course Title</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"><i class="flaticon-tick"></i></span>
                            </div>
                            <input type="text" name="ctitle" class="form-control" placeholder="Course Title">
                        </div>
                    </div>
                    <div class="form-group">
						<label>Course Description</label>
						<textarea name="cmessage" class="form-control" id="message" rows="6"></textarea>
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary btn-round" value="Add Course" />
                    </div>
				</form>
			</div>
		</div>
    </div>
<?php

}

function logout(){
	$_SESSION['email'] = null;
	$_SESSION['logged'] = false;
	$_SESSION['role'] = null;
	header('Location:login');
}
?>
