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
        <!-- /.sidebar -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <div class="col-sm-12">
            <h2>Pesan Pengunjung</h2>
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
                <a class="btn btn-success" href="#"><span class="glyphicon glyphicon-envelope"></span> </a>
              </div>
              <!-- /.panel-heading -->
              <div style="padding-top: 10px" class="panel-body">
                <br/>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pengirim</th>
                      <th>Email</th>
                      <th>Subjek</th>
                      <th>Pesan</th>
                      <th>Date Chat</th>
                      <th style="text-align: center;" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once '../inc/class.php';
                    $siswa = new ClassSiswa;
                    $records_per_page=10;
                    $query = "SELECT * FROM as_contact";
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
                      <td><?=$value['nama'];?></td>
                      <td><?=$value['email'];?></td>
                      <td><?=$value['subjek'];?></td>
                      <td><?=$value['pesan'];?></td>
                      <td><?=$value['created_date'];?></td>
                      
                      <td>
                      <a href="?menu=contact_view&contact_id=<?=$value['contact_id']?>" title="Lihat Pesan Pengunjung"><span class="glyphicon glyphicon-eye-open"></span></a>

                        <a href="?menu=delete&contact_id=<?=$value['contact_id']?>" onclick="return confirm('Anda yakin ingin menghapus Pesan <?php echo $value['nama']; ?>')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
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
                <!-- /.table -->

                <?php
                 if (isset($_POST['btn-save'])) {
                   $category_name = $_POST['category_name'];
                   $category_ceo = $_POST['category_ceo'];
                   $status = $_POST['status'];
                   $created_userid = $_POST['created_userid'];

                   if ($siswa->createCategories($category_name,$category_ceo,$status,$created_userid)) {
                     echo "<script> alert('Kategori Berhasi Di Tambah') </script>";
                     echo "<meta http-equiv='refresh' content='0; url=?menu=kategori&msg=success'>";
                   }

                 }
                 ?>
              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel panel-info -->
          </div>
          <!-- /.mainbox -->
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
