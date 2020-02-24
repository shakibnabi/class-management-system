<?php include 'inc/view/header.php'; ?>
    <div class="title-part">
        <div class="title-photo">
            <img src="assets/img/logo.png" width="50" alt="">
        </div>
        <div class="title-data">
            <b>Class Notifications</b>
        </div>
    </div>
    <div class="updates-part">
        <div class="container">
            <?php ShowNotification(); ?>
        </div>
    </div>
<?php include 'inc/view/footer.php'; ?>