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
          <?php include_once 'sidebar.php'; ?>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <div class="col-sm-12">
            <h2>Data User</h2>
            <hr>
          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <!-- pesan alert -->
            <?php if (isset($_GET['msg'])): ?>
              <?php if ($_GET['msg']=='delete'): ?>
                
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Data berhasil di Hapus!</h4>
              </div>            
              <?php endif ?>
            <?php endif ?>
            <!-- /.alert -->
          
            <div class="panel panel-info">
              <div class="panel-heading">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myUser"><i class="glyphicon glyphicon-plus"></i>Tambah User</button>

              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br/>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Blocked</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th style="text-align: center;" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once '../inc/class.php';
                    $siswa = new ClassSiswa;
                    $records_per_page=15;
                    $query = "SELECT * FROM as_user";
                    $newquery = $siswa->paging($query,$records_per_page);
                    // penomoran halaman data pada halaman
                    if (isset($_GET['page_no'])) {
                      $page = $_GET['page_no'];
                    }

                    if (empty($page)) {
                      $posisi = 0;
                      $halaman = 1;
                    }else{
                      $posisi = ($page - 1) * $records_per_page;
                    }
                    $no=1+$posisi;
                    foreach ($siswa->showData($newquery) as $value) {
                    ?>
                    <tr style="text-align: center;">
                      <td><?=$no;?></td>
                      <td><?=$value['full_name'];?></td>
                      <td><?=$value['username'];?></td>
                      <td><?=md5($value['password']);?></td>
                      <td><?=$value['blocked'];?></td>
                      <td><?=$value['email'];?></td>
                      <td><?=$value['level'];?></td>
                      <td>
                        <a href="?menu=user_edit&user_id=<?=$value['user_id']?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>
                      <td>
                        <a href="?menu=delete&user_id=<?=$value['user_id']?>" onclick="return confirm('Anda yakin ingin menghapus data User yang bernama <?php echo $value['full_name']; ?>')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                      </td>
                    </tr>

                    <?php
                    $no++;
                    }
                    ?>
                  </tbody>
                  <tr>
                    <td colspan="8" align="center">
                      <div class="pagination-wrap">
                        <?php $siswa->paginglink($query,$records_per_page); ?>
                      </div>
                    </td>
                  </tr>
                </table>

                <?php
                if (isset($_POST['btn-save'])) {
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $full_name = $_POST['full_name'];
                  $email = $_POST['email'];
                  $phone = $_POST['phone'];
                  $level = $_POST['level'];
                  $blocked = $_POST['blocked'];
                  $created_userid = $_POST['created_userid'];
                  if ($siswa->create_user($username,$password,$full_name,$email,$phone,$level,$blocked,$created_userid)) {
                    // jika berhasil
                   echo "<script> alert('Data User Berhasi Di Tambah') </script>";
                   echo "<meta http-equiv='refresh' content='0; url=?menu=users'>";
                  }

                }
                include_once 'modal.php'; ?>

              </div>
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
    </body>
  </html>
