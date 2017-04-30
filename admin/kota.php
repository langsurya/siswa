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
            <h2>Data Kota</h2>
            <hr>
          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myKota"><i class="glyphicon glyphicon-plus"></i>Tambah Data</button>
                
              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br/>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kota</th>
                      <th>Nama Kota</th>
                      <th>Provinsi</th>
                      <th>Status</th>
                      <th>Created User</th>
                      <th style="text-align: center;" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once '../inc/class.php';
                    $siswa = new ClassSiswa;
                    $records_per_page=15;
                    $query = "SELECT as_cities.*, as_user.user_id, as_user.full_name, as_provinces.province_id, as_provinces.province_name
                    FROM as_cities, as_user, as_provinces WHERE as_cities.province_id=as_provinces.province_id AND as_cities.created_userid=as_user.user_id ORDER BY province_name ASC";
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
                      <td><?=$value['city_code'];?></td>
                      <td><?=$value['city_name'];?></td>
                      <td><?=$value['province_name'];?></td>
                      <td><?=$value['status'];?></td>
                      <td><?=$value['full_name'];?></td>
                      <td>
                        <a href="?menu=kota_edit&city_id=<?=$value['city_id']?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>
                      <td>
                        <a href="?menu=delete&city_id=<?=$value['city_id']?>" onclick="return confirm('Anda yakin ingin menghapus data Kota <?php echo $value['city_name']; ?>')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
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
                   $province_id = $_POST['province_id'];
                   $city_code = $_POST['city_code'];
                   $city_name = $_POST['city_name'];
                   $status = $_POST['status'];
                   $created_userid = $_POST['created_userid'];
                   if ($siswa->create_kota($province_id,$city_code,$city_name,$status,$created_userid)) {
                     // jika berhasil
             				echo "<script> alert('Data Kota Berhasi Di Tambah') </script>";
             				echo "<meta http-equiv='refresh' content='0; url=?menu=kota'>";
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
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
  </html>
