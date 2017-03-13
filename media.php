<?php
session_start();
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
