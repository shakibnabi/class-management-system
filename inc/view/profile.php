<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Md. Muhaiminul Islam Shihab (+880 1310-550188)">
    <meta name="description" content="This is a Class Management System Monile App">

    <title>Class Management System | Grow Tech</title>
    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon" href="favicon.png">

    <!-- CSS Links -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font/flaticon.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>    
    <!-- Title Area -->
    <div class="title-part">
        <div class="title-photo">
            <img src="assets/img/logo.png" width="50" alt="">
        </div>
        <div class="title-data">
            <b>Student Profile</b>
        </div>
    </div>


    <!-- Profile Area -->
    <div class="profile-part">
        <div class="container">
            <?php ProfileInfo(); ?>    
        </div>
    </div>
<?php include 'inc/view/footer.php'; ?>