<?php include 'inc/view/header.php'; ?>
    <div class="title-part">
        <div class="title-photo">
            <img src="assets/img/logo.png" width="50" alt="">
        </div>
        <div class="title-data">
            <b>Course Feed</b>
        </div>
    </div>


    <!-- Course Area -->
    <div class="course-feed">
        <?php 
        if (isset($_GET['courseid']))
            SingleCourseLoad($_GET['courseid']);
        ?>
    </div>
<?php include 'inc/view/footer.php'; ?>