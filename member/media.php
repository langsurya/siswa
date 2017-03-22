<?php
session_start();
if (isset($_SESSION['username'])==0) {
	header('Location: ../index.php');
}
$menu = $_GET['menu'];
switch ($menu) {
  case 'daftar':
    include_once 'member_daftar.php';
    break;
  case 'profile':
    include_once'profile.php';
    break;
  case 'post':
    include_once'post.php';
    break;
  case 'postCreate':
    include_once'post_buat.php';
    break;
	case 'postEdit':
		include_once 'post_edit.php';
		break;
	case 'read':
		include_once 'read.php';
		break;

	case 'gallery':
		include_once 'gallery.php';
		break;

  case 'keluar':
    include_once '../keluar.php';
    break;
	case 'delete':
		include_once 'delete.php';
		break;


  default:
    include_once 'home.php';
    break;
}
