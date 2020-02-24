<?php include 'inc/view/header.php'; ?>
	<div class="title-part">
		<div class="title-photo">
			<img src="assets/img/logo.png" width="50" alt="">
		</div>
		<div class="title-data"> <b>CR Admin</b>
		</div>
    </div>
    
	<!-- Update Area -->
	<?php CreateNotify(); ?>

    <!-- Course Area -->
    <?php AddCourse(); ?>
    
	<?php include 'inc/view/footer.php'; ?>