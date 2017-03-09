<?php
session_start();
// if (isset($_SESSION['username'])==0) {
// 	header('Location: ../');
// }
$menu = $_GET['menu'];
switch ($menu) {
  case 'profile':
    include_once'profile.php';
    break;
  case 'post':
    include_once'post.php';
    break;
  case 'postCreate':
    include_once'post_buat.php';
    break;

  case 'keluar':
    include_once '../keluar.php';
    break;


  default:
    include_once 'home.php';
    break;
}
