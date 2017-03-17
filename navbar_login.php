<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($login->ceklogin($username,$password)) {
    echo "<script>alert('Anda Berhasil Login');</script>";
    echo "<meta http-equiv='refresh' content='0; url=member/index.php'>";
  }
  else{
    echo "<script>alert('Anda Gagal Login');</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  }
}
?>
<div class="leftbar leftbar-close clearfix">
  <div class="responsive-leftbar"> <i class="icon-list"></i> </div>
    <div class="left-secondary-nav">
      <div>

        <h4 class="side-head">Forms</h4>
        <ul id="nav" class="accordion-nav">
          <li><a href="index.php"><i class=" icon-home"></i> Home </a></li>
          <li><a href="?menu=daftar"><i class=" icon-user"></i> Daftar Member </a></li>
        </ul>
        <h4 class="side-head">Login Member</h4>
        <div class="span2"><br>
          <form action="" method="POST">
            <div class="control-group">
              <div class="controls input-icon"> <i class="icon-user"></i>
                <input type="text" name="username" placeholder="username" class="span2">
              </div>
            </div>
            <div class="control-group">
              <div class="controls input-icon"> <i class="icon-key"></i>
                <input type="password" name="password" placeholder="Password" class="span2">
              </div>
            </div>
            <div class="control-group">
              <!-- <div class="controls"> -->
                <button type="submit" name="login" class="btn btn-primary">Sign in</button>
                <button type="button" class="btn btn-danger ">Cancle</button>
              <!-- </div> -->
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
