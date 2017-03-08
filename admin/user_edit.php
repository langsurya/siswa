<?php include_once 'header.php'; ?>

  <!-- Custom style for this template -->
  <link rel="stylesheet" href="../css/dashboard.css">
  <!-- Custom styles for this template -->
  <!-- <link href="../carousel.css" rel="stylesheet"> -->

  </head>
  <body>
    <?php include_once 'navbar.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once 'menu.php'; ?>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <div class="col-sm-12">
            <h2>Data User</h2>
            <hr>
          </div>

          <?php
          include_once '../inc/class.php';
          $siswa = new ClassSiswa;

          if (isset($_POST['edit_user'])) {
            $id = $_GET['user_id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $level = $_POST['level'];
            $blocked = $_POST['blocked'];
            // if (empty($password)) {
              if ($siswa->update_user($id,$username,$password,$full_name,$email,$phone,$level,$blocked)) {
                header('location:?menu=user_edit&user_id='.$id.'&msg=success');
              }
            // }else{
            //   if ($siswa->update_user($id,$username,$password,$full_name,$email,$phone,$level,$blocked)) {
            //     header('location:?menu=user_edit&user_id='.$id.'&msg=success');
            //   }
            // }
          }

          if (isset($_GET['user_id'])) {
            $id = $_GET['user_id'];
            $table = 'as_user';
            $key = 'user_id';
  					extract($siswa->getData($id,'as_user','user_id'));
  				}
          ?>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Edit Data</div>
              <div class="panel-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="usr">Username:</label>
                    <input type="text" name="username" class="form-control" id="usr" value="<?=$username;?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <?php
                    if ($_SESSION['user_id']==$_GET['user_id']) {
                      $disabled = "";
                      $type = "text";
                    }else{
                      $disabled = "disabled";
                      $type = "password";
                    }
                    ?>
                    <input type="<?=$type;?>" class="form-control" id="pwd" value="<?=$password;?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">New Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="New Password.." <?=$disabled;?>>
                  </div>
                  <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" name="full_name" class="form-control" id="full_name" value="<?=$full_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?=$email?>">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone/HP:</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="<?=$phone;?>">
                  </div>
                  <div class="form-group">
                    <label for="lvl">Level:</label>
                    <input type="text" name="level" class="form-control" id="lvl" value="<?=$level;?>">
                  </div>
                  <div class="form-group">
                		<label>Blocked:</label><br/>
                    <?php if ($blocked=="Y"): ?>
                      <label class="radio-inline">
                        <input type="radio" name="blocked" value="Y" checked>Y
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="blocked" value="N">N
                      </label>
                    <?php else: ?>
                      <label class="radio-inline">
                        <input type="radio" name="blocked" value="Y">Y
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="blocked" value="N" checked>N
                      </label>
                    <?php endif; ?>
                	</div>

                 <button type="submit" name="edit_user" class="btn btn-success">Submit</button>
                 <a class="btn btn-danger" href="?menu=users"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
                 <!-- <button type="submit" name="edit_user" class="btn btn-default">Submit</button> -->
                </form>
              </div>

              <!-- Table -->
              <!-- <table class="table">
                ...
              </table> -->
            </div>

          </div>

        </div>

      </div>

    </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
