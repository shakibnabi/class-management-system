<?php include 'inc/view/header.php'; ?>
    <div class="title-part">
        <div class="title-photo">
            <img src="assets/img/logo.png" width="50" alt="">
        </div>
        <div class="title-data">
            <b>Blood Bank</b>
        </div>
    </div>


    <!-- Blood Area -->
    <div class="blood-part">
        <div class="container">
            <table class="table">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Blood Group</th>
                    </tr>

                    <?php ShowBloodGroup(); ?>
                </tbody>
            </table>
        </div>
    </div>


<?php include 'inc/view/footer.php'; ?>