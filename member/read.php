<?php include_once 'head.php'; ?>
<!-- <link rel="stylesheet" href="crauser.css" media="screen" title="no title"> -->

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
	$login = new login($DB_con);
  $siswa = new ClassSiswa;
  include_once 'navbar_top.php';
	include_once 'navbar_l.php';

  if (isset($_GET['topics'])) {
    $id = $_GET['topics'];
    $table = 'as_topics';
    $key = 'topic_id';
    extract($siswa->getData($id,$table,$key,''));
  }

  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">


      <ul class="breadcrumb">
				<li><a href="#" class="icon-home active"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
        <li class="active">Artikel</li>
			</ul>

      <div class="primary-head">
				<h3 class="page-header"><?=$title;?> <small>
          <ul class="author-info" style="list-style:none; margin:0px;">
            <li>
              <strong> <i class="icon-user"></i> By:</strong> Kamrujaman Shohel
              <strong> <i class="icon-calendar"></i></strong> <?=$created_date;?>
              <strong> <i class="icon-comment"></i></strong> Tidak ada komentar:
            </li>
          </ul></small>
        </h3>
			</div>

      <div class="row-fluid">
				<div class="span12">
					<div id="container">

            <div class="item">
							<div class="thumbnail">
								<img alt="300x200" data-src="holder.js/300x200" style="width: 500px; height: 200px;" src="../images/topics/<?=$image;?>">
								<div class="caption">

									<p>
                    <?=$description;?>
									</p>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div><br>

      <div class="row-fluid">
				<div class="span12">
					<h3 class="page-header"> Komentar :</h3>
				</div>
			</div>

      <div class="row-fluid">
				<div class="span12">
					<div class="media">
						<a href="#" class="pull-left media-thumb"><img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABWUlEQVR4nO2VMY7CMBBFuf9RfAMfwL17t67nCkM1aHBIASF5QvziSbtLGD0/T7Q3M/N/5kYL0CgALUCjALQAjQLQAjQKQAvQKAAtQKMAtACNAtACNApAC9AoAC1AowC0AI0C0AI0CkAL0HwlQCnlQe998/kYY/ezK2eeEqDW6q01NzNvrXkpxeecm2fekT1j5ikB5pxeSvExxu4zvfeNbHwvDtl7fxzy05lIgFjDkFnF82FW2bhZM3uKcWTm5QHi5kJiXddY5ZBeZfN7/q2ZyAbEDeXfX631KhuHy38/OvPSAOv7mmXzCmdi1eO78Vzc8JGZlwfIK5lvdC9Uvq1aq9daNz8fmYkEMHt+l9d/V69kY5XXW86HeXcmGuCXUQBagEYBaAEaBaAFaBSAFqBRAFqARgFoARoFoAVoFIAWoFEAWoBGAWgBGgWgBWgUgBagUQBagEYBaAGaO387LYipKEKVAAAAAElFTkSuQmCC"></a>
						<div class="media-body ">
							<h4 class="media-heading">Media heading</h4>
							<p>
								 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
							</p>
						</div>
					</div>
				</div>

				</div>
			</div><br>

      <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head brown">
							<h3>TULIS KOMENTAR: </h3>
						</div>

						<div class="widget-container">
							<form class="form">
                <div class="control-group">
      						<div class="controls">
      							<textarea rows="5" name="komentar" class="tinymce-simple span12"></textarea>
      						</div>
      					</div>
                <div class="control-group">
      						<div class="controls">
      							<input class="btn btn-success" type="submit" name="Kirim" value="Kirim">
      						</div>
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
			 &copy; 2017 Sistem Informasi Salt Water Aquarium
		</p>
	</div>
	<div class="scroll-top">
		<a href="#" class="tip-top" title="Go Top"><i class="icon-double-angle-up"></i></a>
	</div>
</div>

</body>
</html>
