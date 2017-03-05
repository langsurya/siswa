<?php
session_start();
$menu = $_GET['menu'];
switch ($menu) {
  case 'users':
    include_once'user.php';
    break;
  case 'member':
    include_once 'member.php';
    break;
  case 'provinsi':
    include_once 'provinsi.php';
    break;
  case 'kota':
    include_once 'kota.php';
    break;
  case 'keluar':
    include_once 'keluar.php';
    break;


  case 'profile':
    include_once 'profile.php';
    break;

  case 'adminlogin':
    include_once 'adminlogin.php';
    break;

  default:
    include_once 'home.php';
    break;
}
