<?php include_once 'head.php'; ?>

<!-- Date Picker  -->
<script src="member/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
/*====DATE Time Picker====*/
 $(function () {
		 $('#datetimepicker1').datetimepicker({
				 language: 'pt-BR'
		 });
 });
</script>
<!-- Load TinyMCE -->
<script src="member/js/jquery.cleditor.js"></script>
<script src="member/js/tiny_mce/jquery.tinymce.js"></script>
<script src="member/js/custom.js"></script>
<script src="member/js/respond.min.js"></script>
<script src="member/js/ios-orientationchange-fix.js"></script>
<script type="text/javascript">
// $(function() {
// editor = $("#input").cleditor();
//   });
$(function() {
$('textarea.tinymce-simple').tinymce({
  script_url : 'member/js/tiny_mce/tiny_mce.js',
  theme : "simple"
  });
});

</script>
<!-- /TinyMCE -->
<head>
<body>

  <div class="layout">

	<?php

  if (isset($_POST['daftar_member'])) {
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
    $created_at = $_POST['created_at'];
    if (empty($_FILES['photo']['name'])) {
      if ($siswa->createMembers($facebook_id,$twitter_id,$email,$username,$password,$ufoto,$first_name,$last_name,$province_id,$city_id,$hp,$alamat,$biografi,$created_at)) {
        header('location:?menu=home&msg=success');
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
      $path = "images/anggota/".$userpic;
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
            if ($siswa->createMembers($facebook_id,$twitter_id,$email,$username,$password,$userpic,$first_name,$last_name,$province_id,$city_id,$hp,$alamat,$biografi,$created_at)) {
              echo "<script> alert('Berhasil Registrasi') </script>";
              echo "<meta http-equiv='refresh' content='0; url=?menu=home&msg=success'>";
              // header('location:?menu=home&msg=success');
            }else{
              header('location:?menu=home&msg=gagal');
            }
          }else{
            // jika gambar gagal di upload
            echo "<script> alert('Data Gagal Di Upload') </script>";
            echo "<meta http-equiv='refresh' content='0; url=?menu=home'>";
          }
        }else{
          // jika ukuran lebih dari 1MB
          echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB') </script>";
          echo "<meta http-equiv='refresh' content='0; url=?menu=home'>";
        }
      }else{
        //jika tipe file yg diupload bukan JPG/JPEG.PNG, lakukan :
        echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.') </script>";
        echo "<meta http-equiv='refresh' content='0; url=?menu=home'>";
      }
    }
  }
  include_once 'member/navbar_top.php';
	include_once 'navbar_login.php';
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <div class="primary-head">
				<h3 class="page-header">Daftar Member - <small>Silahkan Isi Form Di Bawah Ini Untuk Member Baru</small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
				<li class="active">Daftar Member</li>
			</ul>

      <div class="row-fluid">
        <div class="span12">
          <div class="content-widgets gray">
            <div class="widget-head blue">
              <h3>Registrasi</h3>
            </div>
            <div class="widget-container">
      				<form action="" enctype="multipart/form-data" method="POST" class="form-horizontal">
      					<div class="control-group">
      						<label class="control-label">Facebook ID:</label>
      						<div class="controls">
      							<input name="facebook_id" placeholder="Facebook ID" class="span12" type="text">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Twitter ID:</label>
      						<div class="controls">
      							<input name="twitter_id" placeholder="Twitter ID" class="span12" type="text">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Email ID:</label>
      						<div class="controls">
      							<input name="email" placeholder="E-mail" class="span12" type="email">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Username:</label>
      						<div class="controls">
      							<input name="username" placeholder="Username" class="span12" type="text">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Password:</label>
      						<div class="controls">
      							<input name="password" placeholder="Password" class="span12" type="password">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">First Name:</label>
      						<div class="controls">
      							<input name="first_name" placeholder="First Name" class="span12" type="text">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Last Name:</label>
      						<div class="controls">
      							<input name="last_name" placeholder="Last Name" class="span12" type="text">
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
                        ?>
                        <option value="<?=$value['province_id']?>"><?=$value['province_name']?></option>
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
                        ?>
                        <option value="<?=$value['city_id']?>"><?=$value['city_name']?></option>
                        <?php
                      }
                      ?>
      							</select>
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">No Telp/HP:</label>
      						<div class="controls">
      							<input name="hp" placeholder="No Telp/HP" class="span12" type="text">
      						</div>
      					</div>


      					<div class="control-group">
      						<label class="control-label">Alamat:</label>
      						<div class="controls">
      							<textarea rows="5" name="alamat" class="tinymce-simple span12"></textarea>
      						</div>
      					</div>

                <div class="control-group">
      						<label class="control-label">Biografi:</label>
      						<div class="controls">
      							<textarea rows="5" name="biografi" class="tinymce-simple span12"></textarea>
      						</div>
      					</div>
      					<div class="control-group">
      						<label class="control-label">Default File Input</label>
      						<div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="member/images/user-thumb.png" style="width: 200px; height: 150px;" alt="img"/> </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"> </div>
                      <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                        <input name="photo" type="file"/>
                      </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                    </div>
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Tanggal</label>
      						<div class="controls">
      							<div id="datetimepicker1" class="input-append date ">
      								<input name="created_at" data-format="yyyy/MM/dd hh:mm:ss" type="text"><span class="add-on "><i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i></span>
      							</div>
      						</div>
      					</div>
                <input type="hidden" name="member_id" value="">
      					<div class="form-actions">
      						<button name="daftar_member" type="submit" class="btn btn-success">Daftar</button>
      						<button type="button" class="btn">Batal</button>
      					</div>
      				</form>
      			</div>


          </div>
        </div>
      </div>


		</div>
	</div>

	<div class="copyright">
		<p>
			 &copy; 2013 westilian
		</p>
	</div>
	<div class="scroll-top">
		<a href="#" class="tip-top" title="Go Top"><i class="icon-double-angle-up"></i></a>
	</div>
</div>

</body>
</html>
