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
            <h2>Schedule</h2>
            <hr>
          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <!-- pesan alert -->
            <?php if (isset($_GET['msg'])): ?>
              <?php if ($_GET['msg']=='delete'): ?>
                
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Data Kategori berhasil di Hapus!</h4>
              </div>            
              <?php endif ?>
            <?php endif ?>
            <!-- /.alert -->

            <div class="panel panel-info">
              <div class="panel-heading">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mySchedule"><i class="glyphicon glyphicon-plus"></i>Tambah Data</button>
                
              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br/>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Kegiatan</th>
                      <th>Lokasi</th>
                      <th style="text-align: center;" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once '../inc/class.php';
                    $siswa = new ClassSiswa;
                    $records_per_page=10;
                    $query = "SELECT * FROM as_schedule";
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
                      <td><?=$value['tanggal'];?></td>
                      <td><?=strip_tags(substr($value['kegiatan'],0,150))."...";?></td>
                      <td><?=$value['lokasi'];?></td>
                      <td>
                        <a href="?menu=schedule_edit&schedule_id=<?=$value['schedule_id']?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>
                      <td>
                        <a href="?menu=delete&schedule_id=<?=$value['schedule_id']?>" onclick="return confirm('Anda yakin ingin menghapus data Schedule <?php echo $value['tanggal']; ?>')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
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
                   $tanggal = $_POST['tanggal'];
                   $kegiatan = $_POST['kegiatan'];
                   $lokasi = $_POST['lokasi'];

                   if ($siswa->createSchedule($tanggal,$kegiatan,$lokasi)) {
                     echo "<script> alert('Schedule Berhasi Di Tambah') </script>";
                     echo "<meta http-equiv='refresh' content='0; url=?menu=schedule&msg=success'>";
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
