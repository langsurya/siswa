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
            <h2>Edit Kota</h2>
            <hr>
          </div>

          <?php
          include_once '../inc/class.php';
          $siswa = new ClassSiswa;

          if (isset($_POST['edit_kota'])) {
            $id = $_GET['city_id'];
            $province_id = $_POST['province_id'];
            $city_name = $_POST['city_name'];
            $city_code = $_POST['city_code'];
            $status = $_POST['status'];

            if ($siswa->updateKota($id,$province_id,$city_name,$city_code,$status)) {
              echo "<script> alert('Kota Berhasi Di Edit') </script>";
              echo "<meta http-equiv='refresh' content='1; url=?menu=kota&edit=success'>";
              // header('location:?menu=provinsi_edit&province_id='.$id.'&msg=success');
            }
          }

          if (isset($_GET['city_id'])) {
            $id = $_GET['city_id'];
            $table = 'as_cities';
            $key = 'city_id';
  					extract($siswa->getData($id,$table,$key,''));
  				}
          ?>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Edit Data</div>
              <div class="panel-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control col-sm-5" name="province_id">
                      <option value="">Pilih Provinsi</option>
                      <?php
                      include_once '../inc/class.php';
                      $siswa = new ClassSiswa;
                      $query = "SELECT province_id, province_name as nama_province FROM as_provinces";
                      foreach ($siswa->showData($query) as $value) {
                        if ($province_id==$value['province_id']) {
                          $s = 'selected';
                        }else {
                          $s = '';
                        }
                        ?>
                        <option value="<?=$value['province_id']?>" <?=$s;?>><?=$value['nama_province']?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="city_code">Kode Kota:</label>
                    <input type="text" name="city_code" class="form-control" id="city_code" value="<?=$city_code;?>">
                  </div>
                  <div class="form-group">
                    <label for="city_name">Nama Kota:</label>
                    <input type="text" name="city_name" class="form-control" id="city_name" value="<?=$city_name;?>">
                  </div>
                  <div class="form-group">
                		<label>Status:</label><br/>
                    <?php if ($status=="Y"): ?>
                      <label class="radio-inline">
                        <input type="radio" name="status" value="Y" checked>Y
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="status" value="N">N
                      </label>
                    <?php else: ?>
                      <label class="radio-inline">
                        <input type="radio" name="status" value="Y">Y
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="status" value="N" checked>N
                      </label>
                    <?php endif; ?>
                	</div>

                 <button type="submit" name="edit_kota" class="btn btn-success">Submit</button>
                 <a class="btn btn-danger" href="?menu=kota"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
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
