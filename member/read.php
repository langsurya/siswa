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
  include_once 'navbar_top.php';
	include_once 'sidebar.php';

  if (isset($_GET['topic_id'])) {
    $id = $_GET['topic_id'];
    $table = 'as_topics';
    $key = 'topic_id';
    $query = "SELECT as_topics.*,
    as_members.member_id,as_members.first_name,as_members.last_name
    FROM as_topics
    JOIN as_members ON as_topics.member_id = as_members.member_id
    WHERE as_topics.topic_id=$id";
    extract($siswa->getData($id,$table,$key,$query));
  }

  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <ul class="breadcrumb">
				<li><a href="#" class="icon-home active"></a>
          <span class="divider "><i class="icon-angle-right"></i></span></li>
        <li class="active">Artikel</li>
			</ul>

      <div class="primary-head">
				<h3 class="page-header"><?=$title;?> <small>
          <ul class="author-info" style="list-style:none; margin:0px;">
            <li>
              <strong> <i class="icon-user"></i> By:</strong> <?= $first_name.' '.$last_name;?>
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
          <?php
          $commentquery = "SELECT as_comments.*,
                    as_members.member_id, as_members.first_name as nama, as_members.photo,
                    as_topics.topic_id, as_topics.title
                    FROM as_comments
                    JOIN as_topics ON as_comments.topic_id = as_topics.topic_id
                    JOIN as_members ON as_comments.member_id = as_members.member_id
                    WHERE as_comments.topic_id=".$id;
          foreach ($siswa->showData($commentquery) as $value) {
            ?>
					<div class="media">
						<a href="#" class="pull-left media-thumb"><img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="../images/anggota/<?=$value['photo'];?>"></a>
						<div class="media-body ">
							<h4 class="media-heading"><?=$value['nama'];?></h4>
							<p>
								 <?=$value['description'];?>
							</p>
						</div>
					</div>
        <?php  }

        if (isset($_POST['kirim'])) {
          $topic_id = $_GET['topic_id'];
          $member_id = $_SESSION['member_id'];
          $description = $_POST['description'];
          if ($siswa->createComment($topic_id,$member_id,$description)) {
            echo "<script> alert('Koment Success') </script>";
            echo "<meta http-equiv='refresh' content='0; url=?menu=read&topic_id=$id'>";
          }
        }
        ?>

				</div>
			</div><br>
      <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head brown">
							<h3>TULIS KOMENTAR: </h3>
						</div>

						<div class="widget-container">
							<form class="form" method="POST" action="">
                <div class="control-group">
      						<div class="controls">
      							<textarea rows="5" name="description" class="tinymce-simple span12"> </textarea>
      						</div>
      					</div>
                <div class="control-group">
      						<div class="controls">
      							<input class="btn btn-success" type="submit" name="kirim" value="Kirim">
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
