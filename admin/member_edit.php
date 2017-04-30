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
            <h2>Edit Member</h2>
            <hr>
          </div>

          <?php
          include_once '../inc/class.php';
          $siswa = new ClassSiswa;

          if (isset($_POST['edit_member'])) {
            $id = $_GET['member_id'];
            $facebook_id = $_POST['facebook_id'];
            $twitter_id = $_POST['twitter_id'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $province_id = $_POST['province_id'];
            $city_id = $_POST['city_id'];
            $hp = $_POST['hp'];
            $alamat = $_POST['alamat'];
            $biografi = $_POST['biografi'];
            $ufoto = $_FILES['photo']['name'];
            if (empty($_FILES['photo']['name'])) {
              if ($siswa->update_member($id,$facebook_id,$twitter_id,$email,$username,$password,$ufoto,$first_name,$last_name,$province_id,$city_id,$hp,$alamat,$biografi)) {
                header('location:?menu=member_edit&member_id='.$id.'&msg=success');
              }
            }else{
              // Ambil data gambar dari form
          		$nama_file = $_FILES['photo']['name'];
          		$ukuran_file = $_FILES['photo']['size'];
          		$tipe_file = $_FILES['photo']['type'];
          		$tmp_file = $_FILES['photo']['tmp_name'];

          		// set path folder tempat menyimpan gambar
              $imgExt = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
          		$userpic = rand(1000,1000000).".".$imgExt;
          		$path = "../images/anggota/".$userpic;
          		// Cek apakah tipe file yg di upload adalah JPG/JPEG/PNG
              if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
          			# jika tipe file JPG/JPEG/PNG, maka lakukan:
          			// Cek apakah ukuran file sama atau lebih kecil dari 1MB
          			if ($ukuran_file <= 1000000) {
          				# jika ukuran file kurang dari sama dengan 1MB, lakukan :
          				// proses upload
          				if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di upload
          					# jika gambar berhasil di upload, lakukan :
          					//  proses simpan ke database
          					if ($siswa->update_member($id,$facebook_id,$twitter_id,$email,$username,$password,$userpic,$first_name,$last_name,$province_id,$city_id,$hp,$alamat,$biografi)) {
          						header('location:?menu=member_edit&member_id='.$id.'&msg=success');
          					}
          				}else{
          					// jika gambar gagal di upload
          					echo "<script> alert('Data Gagal Di Upload') </script>";
          					echo "<meta http-equiv='refresh' content='0; url=?menu=member_edit&member_id='".$id.">";
          				}
          			}else{
          				// jika ukuran lebih dari 1MB
          				echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB') </script>";
          				echo "<meta http-equiv='refresh' content='0; url=?menu=member_edit&member_id='".$id.">";
          			}
          		}else{
          			//jika tipe file yg diupload bukan JPG/JPEG.PNG, lakukan :
          			echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.') </script>";
          			echo "<meta http-equiv='refresh' content='0; url=?menu=member_edit&member_id='".$id.">";
          		}
            }
          }

          if (isset($_GET['member_id'])) {
            $id = $_GET['member_id'];
            $query = "SELECT
            as_members.*, as_cities.city_id, as_cities.city_name as city_nm, as_provinces.province_id, as_provinces.province_name as province_nm
            FROM as_members, as_cities, as_provinces
            WHERE as_members.province_id=as_provinces.province_id AND as_members.city_id=as_cities.city_id AND as_members.member_id=".$id;
  					extract($siswa->getData($id,'as_members','member_id',$query));
  				}

          if (isset($photo)) {
            $image = "../images/anggota/".$photo;
          }elseif($photo==""){
            $image = "../images/pic-05.jpg";
          }
          ?>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Edit Member</div>
              <div class="panel-body">
                <form action="" enctype="multipart/form-data" method="POST">
                  <div class="form-group">
                    <!-- <label for="bio">Bio:</label> -->
                    <img class="img-rounded" width="150" height="150" src="<?=$image;?>" alt="" />
                    <input type="file" name="photo">
                  </div>
                  <div class="form-group">
                    <label for="facebook_id">Facebook ID:</label>
                    <input type="text" name="facebook_id" class="form-control" id="facebook_id" value="<?=$facebook_id;?>">
                  </div>
                  <div class="form-group">
                    <label for="twitter_id">Twitter ID:</label>
                    <input type="text" name="twitter_id" class="form-control" id="twitter_id" value="<?=$twitter_id;?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?=$email?>">
                  </div>
                  <div class="form-group">
                    <label for="usr">Username:</label>
                    <input type="text" name="username" class="form-control" id="usr" value="<?=$username;?>">
                  </div>
                  <div class="form-group">
                    <label >Password:</label>
                    <input type="text" class="form-control" value="<?=$password;?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="pwd">New Password:</label>
                    <input type="text" name="password" class="form-control" id="pwd" placeholder="New Password.." >
                  </div>
                  <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="<?=$first_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="<?=$last_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="province_id">Provinsi:</label>
                    <select class="form-control" name="province_id">
                      <?php
                      $query = "SELECT province_id as provinsi_id,province_name as provinsi_nama FROM as_provinces ORDER BY province_name ASC";
                      foreach ($siswa->showData($query) as $value) {
                        if ($value['provinsi_id']==$province_id) {
                          $selected = 'selected';
                        }else{
                          $selected ="";
                        }
                        ?>
                          <option value="<?=$value['provinsi_id']?>" <?=$selected?>><?=$value['provinsi_nama'];?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="city_id">Kota:</label>
                    <select class="form-control" name="city_id">
                      <?php
                      $query = "SELECT city_id as kota_id,city_name as kota_nama FROM as_cities ORDER BY city_name ASC";
                      foreach ($siswa->showData($query) as $value) {
                        if ($value['kota_id']==$city_id) {
                          $selected = 'selected';
                        }else{
                          $selected ="";
                        }
                        ?>
                          <option value="<?=$value['kota_id']?>" <?=$selected?>><?=$value['kota_nama'];?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="hp">Phone/HP:</label>
                    <input type="text" name="hp" class="form-control" id="hp" value="<?=$hp;?>">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?=strip_tags($alamat);?>">
                  </div>
                  <div class="form-group">
                    <label for="comment">Bio:</label>
                    <textarea class="form-control" name="biografi" rows="5" id="comment"><?=strip_tags($biografi);?></textarea>
                  </div>


                 <button type="submit" name="edit_member" class="btn btn-success">Submit</button>
                 <a class="btn btn-danger" href="?menu=member"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
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
