<?php
session_start();
$menu = $_GET['menu'];
switch ($menu) {
  case 'users':
    include_once'user.php';
    break;
  case 'user_edit':
    include_once 'user_edit.php';
    break;
  case 'member':
    include_once 'member.php';
    break;
  case 'member_edit':
    include_once 'member_edit.php';
    break;
  case 'provinsi':
    include_once 'provinsi.php';
    break;
    case 'provinsi_edit':
      include_once 'provinsi_edit.php';
      break;
  case 'kota':
    include_once 'kota.php';
    break;
    case 'kota_edit':
      include_once 'kota_edit.php';
      break;
  case 'kategori':
    include_once 'kategori.php';
    break;
  case 'kategori_edit':
    include_once 'kategori_edit.php';
    break;
  case 'keluar':
    include_once 'keluar.php';
    break;

  case 'delete':
    include_once 'delete.php';
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
