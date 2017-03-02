<?php

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login->ceklogin($username,$password);
}
  if (isset($_SESSION['username'])==0) {
    ?>

    <div id="index_col3">
      <img src="images/contact.png" alt="" title="" style="float: left; padding-right: 10px; padding-bottom: 4px;" />
      <h4>Login Member</h4>
      <div id="log">
        <form id="form1" method="post" action="">
          <fieldset>
            <input id="text1" type="text" name="username" placeholder="Username" alt=""/><br />
            <input id="text2" type="text" name="password" placeholder="Password" alt=""/><br />
            <input type="submit" name="login" id="login-submit" value="Masuk"/>
          </fieldset>
        </form>
      </div>
      <div style="text-align: right"><a href="?menu=daftar">Daftar Baru</a></div>
    </div>
    <?php
  }else{
    ?>
    <div id="index_col3">
      <img src="images/contact.png" alt="" title="" style="float: left; padding-right: 10px; padding-bottom: 4px;" />
      <h4>Selamat datang <?php echo $_SESSION['nama']; ?></h4>
    </div>
    <?php
  }
?>
