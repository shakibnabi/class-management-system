<?php 
include('config/init.php');

$path = trim( $_SERVER['REQUEST_URI'], '/' );
$path = parse_url($path, PHP_URL_PATH);
$baseUrl = 'project-cms';
$routes = [
  $baseUrl => 'inc/view/index.php',
  $baseUrl.'/course' => 'inc/view/course.php',
  $baseUrl.'/home' => 'inc/view/home.php',
  $baseUrl.'/updates' => 'inc/view/updates.php',
  $baseUrl.'/settings' => 'inc/view/settings.php',
  $baseUrl.'/chat' => 'inc/view/chat.php',
  $baseUrl.'/profile' => 'inc/view/profile.php',
  $baseUrl.'/teachers' => 'inc/view/teachers.php',
  $baseUrl.'/jobs' => 'inc/view/jobs.php',
  $baseUrl.'/blood' => 'inc/view/blood.php',
  $baseUrl.'/developer' => 'inc/view/developer.php',
  $baseUrl.'/author-admin' => 'inc/view/author-admin.php',
  $baseUrl.'/teacher-admin' => 'inc/view/teacher-admin.php',
  $baseUrl.'/cr-admin' => 'inc/view/cr-admin.php',
  $baseUrl.'/login' => 'inc/view/index.php',
  $baseUrl.'/logout' => 'inc/view/logout.php'
];

if (array_key_exists($path, $routes) ){
    //echo($_GET['id']." | ".$_GET['name']." | ".$_GET['email']);
    //echo $path." ".$routes[$path];
    require $routes[$path];
    
}else{
    echo "404 | ".$path;

}


?>