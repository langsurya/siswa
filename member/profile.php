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
  include_once 'navbar_top.php';
	if (isset($_SESSION['username'])==true) {
		include_once 'navbar_l.php';
	}else {
		include_once 'navbar_login.php';
	}

  if (isset($_SESSION['member_id'])) {
    $id = $_SESSION['member_id'];
    $table = 'as_members';
    $key = 'member_id';
    extract($siswa->getData($id,$table,$key,''));
  }
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
    <div class="container-fluid">
      <div class="row-fluid ">
        <div class="span12">
          <div class="primary-head">
            <h3 class="page-header">User Profile</h3>
            <ul class="top-right-toolbar">
              <li><a data-toggle="dropdown" class="dropdown-toggle blue-violate" href="#" data-original-title="Users"><i class="icon-user"></i></a> </li>
              <li><a href="#" class="green" data-original-title="Upload"><i class=" icon-upload-alt"></i></a></li>
              <li><a href="#" class="bondi-blue" data-original-title="Settings"><i class="icon-cogs"></i></a></li>
            </ul>
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
                                  $s = "selected";
                                }else{
                                  $s ="";
                                }
                                ?>
                                <option value="<?=$value['city_id']?>" selected="<?=$s;?>"><?=$value['city_name']?></option>
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

                        <input type="hidden" name="member_id" value="">
              					<div class="form-actions">
              						<button name="daftar_member" type="submit" class="btn btn-success">Update</button>
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
