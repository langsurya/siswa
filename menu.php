<?php
 switch ($_GET['menu']) {
   case 'home':
     $a = 'active';
     break;
  case 'blog':
    $b = 'active';
    break;
  case 'gallery':
    $c = 'active';
    break;
  case 'about':
    $d = 'active';
    break;

   default:
     # code...
     break;
 }
//  if ($_GET['menu']=='home'){
//   $a = 'active';
// }elseif($_GET['menu']=='blog'){
//   $b = 'active';
// }
?>
<div id="menu">
  <ul>
    <li><a href="media.php?menu=home" class="<?=$a;?>">Home</a></li>
    <li><a href="media.php?menu=blog" class="<?=$b;?>">Blog</a></li>
    <li><a href="media.php?menu=gallery" class="<?=$c;?>">Gallery</a></li>
    <li><a href="media.php?menu=about" class="<?=$d;?>">About Us</a></li>
    <li><a href="media.php?menu=contact" class="<?=$e;?>">Contact Us</a></li>
    <?php if (isset($_SESSION['username'])): ?>
    <li><a href="keluar.php">Logout</a></li>
    <?php endif; ?>
  </ul>
</div>
