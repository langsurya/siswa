<?php
 switch ($_GET['menu']) {
   case 'home':
     $a = 'active';
     break;
  case 'blog':
    $b = 'active';
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
    <li><a href="media.php?menu=blog" class="<?=$b?>">Blog</a></li>
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <?php if (isset($_SESSION['username'])): ?>
    <li><a href="keluar.php">Logout</a></li>
    <?php endif; ?>
  </ul>
</div>
