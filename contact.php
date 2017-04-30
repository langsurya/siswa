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

  if (isset($_POST['kirim_pesan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];
    if ($siswa->kirimPesan($nama,$email,$subjek,$pesan)) {
      echo "<script>alert('Pesan berhasil Dikirim');</script>";
      echo "<meta http-equiv='refresh' content='0; url=?menu=contact&msg=success'>";
      // header('location:?menu=contact&msg=success');
    }
  }
  include_once 'member/navbar_top.php';
	include_once 'navbar_login.php';
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <div class="primary-head">
				<h3 class="page-header">Contact </h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
				<li class="active">Contact</li>
			</ul>

      <div class="row-fluid">
        <div class="span12">
          <div class="content-widgets gray">
            <div class="widget-head blue">
              <h3>Tinggalkan Pesan</h3>
            </div>
            <div class="widget-container">
      				<form action="" method="POST" class="form-horizontal">
              
      					<div class="control-group">
      						<label class="control-label">Nama:</label>
      						<div class="controls">
      							<input name="nama" placeholder="Nama" class="span12" type="text">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Email:</label>
      						<div class="controls">
      							<input name="email" placeholder="Email" class="span12" type="email">
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Subjek:</label>
      						<div class="controls">
      							<input name="subjek" placeholder="Subjek" class="span12" type="text">
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Pesan:</label>
      						<div class="controls">
      							<textarea rows="5" name="pesan" class="tinymce-simple span12"></textarea>
      						</div>
      					</div>

                <div class="form-actions">
                  <button name="kirim_pesan" type="submit" class="btn btn-success">Kirim Pesan</button>
                  <button type="reset" class="btn">Batal</button>
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
