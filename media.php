<?php
session_start();
include_once 'inc/dbconfig.php';
include_once 'inc/class.login.php';
include_once 'inc/class.php';
$login = new login($DB_con);
$siswa = new ClassSiswa;
if (isset($_SESSION['username'])==true) {
  header('Location: member/');
}else{

}
$menu = $_GET['menu'];
switch ($menu) {
  case 'blog':
    include_once 'blog.php';
    break;
  case 'daftar':
    include_once 'member_daftar.php';
    break;
  case 'gallery':
    include_once 'gallery.php';
    break;
  case 'read':
    include_once 'read.php';
    break;


  case 'profile':
    include_once 'profile.php';
    break;

  case 'admin':
    include_once 'adminlogin.php';
    break;

  default:
    include_once 'home.php';
    break;
}
