<?php
$menu = $_GET['menu'];
switch ($menu) {
  case 'blog':
    include_once 'blog.php';
    break;

  default:
    include_once 'home.php';
    break;
}
