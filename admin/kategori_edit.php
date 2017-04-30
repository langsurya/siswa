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
            <h2>Edit Kategori</h2>
            <hr>
          </div>

          <?php
          include_once '../inc/class.php';
          $siswa = new ClassSiswa;

          if (isset($_POST['edit_kategori'])) {
            $id = $_GET['category_id'];
            $category_name = $_POST['category_name'];
            $category_ceo = $_POST['category_ceo'];
            $status = $_POST['status'];

            if ($siswa->updateCategories($id,$category_name,$category_ceo,$status)) {
              echo "<script> alert('Kategori Berhasi Di Edit') </script>";
              echo "<meta http-equiv='refresh' content='2; url=?menu=kategori&edit=success'>";
              // header('location:?menu=kategori_edit&category_id='.$id.'&msg=success');
            }
          }

          if (isset($_GET['category_id'])) {
            $id = $_GET['category_id'];
            $table = 'as_categories';
            $key = 'category_id';
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
                    <label for="usr">Nama Kategori:</label>
                    <input type="text" name="category_name" class="form-control" id="usr" value="<?=$category_name;?>">
                  </div>

                  <div class="form-group">
                    <label for="category_ceo">Kategori Ceo:</label>
                    <input type="text" name="category_ceo" class="form-control" id="category_ceo" value="<?=$category_ceo;?>">
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

                 <button type="submit" name="edit_kategori" class="btn btn-success">Submit</button>
                 <a class="btn btn-danger" href="?menu=kategori"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
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
