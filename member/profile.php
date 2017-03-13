<?php include_once 'head.php'; ?>
<!-- Load TinyMCE -->
<script src="js/jquery.cleditor.js"></script>
<script src="js/tiny_mce/jquery.tinymce.js"></script>
<script src="js/custom.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/ios-orientationchange-fix.js"></script>
<script type="text/javascript">
// $(function() {
// editor = $("#input").cleditor();
//   });
$(function() {
$('textarea.tinymce-simple').tinymce({
  script_url : 'js/tiny_mce/tiny_mce.js',
  theme : "simple"
  });
});

</script>
<!-- /TinyMCE -->
<head>
<body>

<div class="layout">

	<?php
	include_once '../inc/dbconfig.php';
	include_once '../inc/class.login.php';
  include_once '../inc/class.php';
  $siswa = new ClassSiswa;
	$login = new login($DB_con);

  if (isset($_POST['edit_member'])) {
    $id = $_POST['member_id'];
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
        header('location:?menu=profile&member_id='.$id.'&msg=success');
      }else{
        header('location:?menu=profile&member_id='.$id.'&msg=error');
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
            $poto_lama = $_POST['poto_lama'];
            # hapus poto lama
            unlink('../images/anggota/'.$poto_lama);
            //  proses simpan ke database
            if ($siswa->update_member($id,$facebook_id,$twitter_id,$email,$username,$password,$userpic,$first_name,$last_name,$province_id,$city_id,$hp,$alamat,$biografi)) {
              header('location:?menu=profile&member_id='.$id.'&msg=success');
            }else{
              header('location:?menu=profile&member_id='.$id.'&msg=error');
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

  if (isset($_SESSION['member_id'])) {
    $id = $_SESSION['member_id'];
    $table = 'as_members';
    $key = 'member_id';
    extract($siswa->getData($id,$table,$key,''));
  }
  include_once 'navbar_top.php';
	include_once 'navbar_l.php';
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
    <div class="container-fluid">
      <div class="row-fluid ">
        <div class="span12">
          <div class="primary-head">
            <h3 class="page-header">User Profile</h3>
            <?php if (isset($_GET['msg'])): ?>
              <?php if ($_GET['msg']=="success"): ?>
                <div class="alert alert-success">
      						<button type="button" class="close" data-dismiss="alert">×</button>
      						<i class="icon-ok-sign"></i><strong>Success!</strong> Member Berhasil di perbarui
      					</div>
              <?php else: ?>
                <div class="alert">
      						<button type="button" class="close" data-dismiss="alert">×</button>
      						<i class="icon-remove-sign"></i><strong>Warning!</strong> Member Gagal di perbarui
      					</div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <ul class="breadcrumb">
            <li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
            <li><a href="#">Library</a><span class="divider"><i class="icon-angle-right"></i></span></li>
            <li class="active">Profile</li>
          </ul>
        </div>
      </div>

      <div class="row-fluid ">
        <form action="" enctype="multipart/form-data" method="POST" class="form-horizontal">
        <div class="span3">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> <img src="../images/anggota/<?=$photo;?>" alt="img"/> </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"> </div>
            <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
              <input type="hidden" name="poto_lama" value="<?=$photo;?>">
              <input name="photo" type="file"/>
              </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
          </div>
        </div>

        <div class="span9">
          <div class="profile-info">
            <div class="tab-widget">
              <ul class="nav nav-tabs" id="myTab1">
                <li class="active"><a href="#user"><i class="icon-user"></i> Profile Info</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="user">
                  <div class="information-container">

                    <div class="widget-container">

              					<div class="control-group">
              						<label class="control-label">Facebook ID:</label>
              						<div class="controls">
              							<input name="facebook_id" placeholder="Facebook ID" class="span12" type="text" value="<?=$facebook_id;?>">
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">Twitter ID:</label>
              						<div class="controls">
              							<input name="twitter_id" placeholder="Twitter ID" class="span12" type="text"value="<?=$twitter_id;?>">
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">Email ID:</label>
              						<div class="controls">
              							<input name="email" placeholder="E-mail" class="span12" type="email" value="<?=$email;?>">
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">Username:</label>
              						<div class="controls">
              							<input name="username" placeholder="Username" class="span12" type="text" value="<?=$username;?>">
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">Password:</label>
              						<div class="controls">
              							<input placeholder="Password" class="span12" type="password" value="<?=$password;?>">
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">New Password:</label>
              						<div class="controls">
              							<input placeholder="Password" class="span12" type="password" name="password">
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">First Name:</label>
              						<div class="controls">
              							<input name="first_name" placeholder="First Name" class="span12" type="text" value="<?=$first_name;?>">
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">Last Name:</label>
              						<div class="controls">
              							<input name="last_name" placeholder="Last Name" class="span12" type="text" value="<?=$last_name;?>">
              						</div>
              					</div>

              					<div class="control-group">
              						<label class="control-label">Provinsi: </label>
                          <div class="controls">
              							<select name="province_id" class="span6">
              								<option value="">Pilih Provinsi</option>
                              <?php

                              $query = "SELECT * FROM as_provinces";
                              foreach ($siswa->showData($query) as $value) {
                                if ($province_id==$value['province_id']) {
                                  $s = "selected";
                                }else{
                                  $s ="";
                                }
                                ?>
                                <option value="<?=$value['province_id']?>" <?=$s;?>><?=$value['province_name']?></option>
                                <?php
                              }
                              ?>
              							</select>
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">Kota: </label>
                          <div class="controls">
              							<select name="city_id" class="span6">
              								<option value="">Pilih Kota</option>
                              <?php
                              $query = "SELECT * FROM as_cities";
                              foreach ($siswa->showData($query) as $value) {
                                if ($city_id==$value['city_id']) {
                                  $ss = "selected";
                                }else{
                                  $ss ="";
                                }
                                ?>
                                <option value="<?=$value['city_id']?>" <?=$ss;?>><?=$value['city_name']?></option>
                                <?php
                              }
                              ?>
              							</select>
              						</div>
              					</div>
                        <div class="control-group">
              						<label class="control-label">No Telp/HP:</label>
              						<div class="controls">
              							<input name="hp" placeholder="No Telp/HP" class="span12" type="text" value="<?=$hp;?>">
              						</div>
              					</div>


              					<div class="control-group">
              						<label class="control-label">Alamat:</label>
              						<div class="controls">
              							<textarea rows="5" name="alamat" class="tinymce-simple span12"><?=$alamat;?></textarea>
              						</div>
              					</div>

                        <div class="control-group">
              						<label class="control-label">Biografi:</label>
              						<div class="controls">
              							<textarea rows="5" name="biografi" class="tinymce-simple span12"><?=$biografi;?></textarea>
              						</div>
              					</div>

                        <input type="hidden" name="member_id" value="<?=$_SESSION['member_id'];?>">
              					<div class="form-actions">
              						<button name="edit_member" type="submit" class="btn btn-success">Update</button>
              						<button type="button" class="btn">Batal</button>
              					</div>

                    </div>

                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
        </form>

      </div>
      <!-- row-fluid -->
    </div>
	</div>

	<div class="copyright">
		<p>
			&copy; 2017 Sistem Informasi Salt Water Aquarium
		</p>
	</div>

	<div class="scroll-top">
		<a href="#" class="tip-top" title="Go Top"><i class="icon-double-angle-up"></i></a>
	</div>
</div>

</body>
</html>
