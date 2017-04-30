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
                
                <?php 
                if (isset($_GET['contact_id'])) {
                  $id = $_GET['contact_id'];
                  $query = "SELECT * FROM as_contact WHERE contact_id=".$id;
                  extract($siswa->getData($id,'as_contact','contact_id',$query));
                }
                ?>

                <div class="form-group">
                  <label for="pengirim">Pengirim</label>
                  <input type="text" disabled class="form-control" id="pengirim" value="<?=$nama;?>">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" value="<?=$email;?>">
                </div>
                <div class="form-group">
                  <label for="subjek">Subjek</label>
                  <input type="text" disabled class="form-control" id="subjek" value="<?=$subjek;?>">
                </div>
                <div class="form-group">
                  <label for="pesan">Pesan</label>
                  <textarea class="form-control" disabled name="" id="" cols="30" rows="10"><?php echo strip_tags($pesan)?></textarea>
                </div>
                
                <!-- /.table -->

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
