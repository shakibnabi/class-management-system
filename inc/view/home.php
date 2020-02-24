<?php include 'inc/view/header.php'; ?>
    <div class="title-part">
        <div class="title-data">
            <b>Class Management <span>CMT 2<sup>nd</sup></span></b>
        </div>
    </div>
    <!-- Quick Area -->
    <div class="quick-part">
        <div class="container">
            <!-- Course Area -->
            <div class="course-part">
                    <?php 
                    if ($_SESSION['logged'] == false)
                        header('Location: home'); 
                    else
                        CourseLoad(); ?>
            </div>
        </div>
    </div>
<?php include 'inc/view/footer.php'; ?>