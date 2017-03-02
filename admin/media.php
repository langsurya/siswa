<?php
session_start();
$menu = $_GET['menu'];
switch ($menu) {
  case 'member':
    include_once 'member.php';
    break;
  case 'daftar':
    include_once 'daftar.php';
    break;
  case 'gallery':
    include_once 'gallery.php';
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
