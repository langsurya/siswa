<?php
error_reporting(1);
session_start();
include_once '../inc/dbconfig.php';
include_once '../inc/class.login.php';
include_once '../inc/class.php';
$login = new login($DB_con);
$siswa = new ClassSiswa;
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
  case 'hitung-volume':
    include_once 'calculator.php';
    break;
	case 'chat':
		include_once 'chatting_forum.php';
		break;
  case 'schedule':
    include_once 'schedule.php';
    break;
  case 'scheduleShow':
    include_once 'scheduleShow.php';
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
