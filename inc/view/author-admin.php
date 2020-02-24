<?php include 'inc/view/header.php'; ?>
	<div class="title-part">
		<div class="title-photo">
			<img src="assets/img/logo.png" width="50" alt="">
		</div>
		<div class="title-data"> <b>Author Admin</b>
		</div>
    </div>
    
	<!-- Author Admin -->
	<?php AddTeacher(); ?>
    
	<!-- Student Ad -->
	<?php AddStudent(); ?>
    
	<!-- Update Area -->
	<?php CreateNotify(); ?>

    <!-- Course Area -->
    <?php AddCourse(); ?>
    
<?php include 'inc/view/footer.php'; ?>