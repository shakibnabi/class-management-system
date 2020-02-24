<?php include 'inc/view/header.php'; ?>
    <div class="title-part">
        <div class="title-photo">
            <img src="assets/img/logo.png" width="50" alt="">
        </div>
        <div class="title-data">
            <b>Settings</b>
        </div>
    </div>


    <!-- Settings Area -->
    <div class="setting-par">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="profile"><i class="flaticon-user mr-2"></i> My Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="teachers"><i class="flaticon-teacher mr-2"></i> Teachers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="jobs"><i class="flaticon-job-search mr-2"></i> Job Portal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blood"><i class="flaticon-blood-donation mr-2"></i> Blood Donate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="developer"><i class="flaticon-copywriting mr-2"></i> Developer Info</a>
            </li>
            
            <!-- Admin Area Access Link -->
            <?php if ($_SESSION['role'] == '1'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="author-admin"><i class="flaticon-edit mr-2"></i> Authorised Admin</a>
                </li>
            <?php elseif ($_SESSION['role'] == '2'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="teacher-admin"><i class="flaticon-edit mr-2"></i> Teacher Admin</a>
                </li>
            <?php elseif ($_SESSION['role'] == '3'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="cr-admin"><i class="flaticon-edit mr-2"></i> CR Admin</a>
                </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="logout"><i class="flaticon-settings mr-2"></i> Logout</a>
            </li>
            
            
            
        </ul>
    </div>
<?php include 'inc/view/footer.php'; ?>