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
            <h2>Edit Schedule</h2>
            <hr>
          </div>

          <?php

          if (isset($_POST['edit_schedule'])) {
            $id = $_GET['schedule_id'];
            $tanggal = $_POST['tanggal'];
            $kegiatan = $_POST['kegiatan'];
            $lokasi = $_POST['lokasi'];

            if ($siswa->updateSchedule($id,$tanggal,$kegiatan,$lokasi)) {
              echo "<script> alert('Schedule Berhasi Di Edit') </script>";
              echo "<meta http-equiv='refresh' content='1; url=?menu=schedule&edit=success'>";
            }
          }

          if (isset($_GET['schedule_id'])) {
            $id = $_GET['schedule_id'];
  					extract($siswa->getData($id,'as_schedule','schedule_id',''));
  				}
          ?>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Edit Data</div>
              <div class="panel-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="tgl">Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control" id="tgl" value="<?=$tanggal;?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="pwd">kegiatan:</label>
                    <textarea class="form-control" name="kegiatan" id="" cols="30" rows="5"><?=$kegiatan;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="lokasi">Lokasi:</label>
                    <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?=$lokasi;?>">
                  </div>                  

                 <button type="submit" name="edit_schedule" class="btn btn-success">Update</button>
                 <a class="btn btn-danger" href="?menu=schedule"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
                 <!-- <button type="submit" name="edit_user" class="btn btn-default">Submit</button> -->
                </form>
              </div>

              <!-- Table -->
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
