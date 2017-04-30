<?php include_once 'head.php'; ?>
<script src="js/jquery.tagsinput.min.js"></script>
<script type="text/javascript">
/*====TAGS INPUT====*/
$(function () {
  $('#tags_1').tagsInput({
      width: '20%',
      height: '40px'
  });
});
</script>
<!-- Load TinyMCE -->
<script src="js/jquery.cleditor.js"></script>
<script src="js/tiny_mce/jquery.tinymce.js"></script>
<script src="js/custom.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/ios-orientationchange-fix.js"></script>

<script type="text/javascript">
        $(function() {
		$('textarea.tinymce-simple').tinymce({
			script_url : 'js/tiny_mce/tiny_mce.js',
			theme : "simple"
			});
		});
</script>

<head>
<body>

  <div class="layout">

	<?php

  include_once 'navbar_top.php';
  include_once 'sidebar.php';

  // $newquery = $siswa->paging($q_terkirim,$records_per_page);
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <div class="primary-head">
				<h3 class="page-header">My Chatting - <small>Wellcome <?=$_SESSION['nama'];?></small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
				<li class="active">Post</li>
			</ul>

      <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets white">
						<div class="widget-head light-blue">
							<h3><i class="icon-comments-alt"></i> Chat</h3>
						</div>
						<div class="widget-container">
							<div class="tab-widget tabbable tabs-left chat-widget">
								<ul class="nav nav-tabs" id="chat-tab">
                  <li class="active"><a href="#user"><span class="user-online"></span><i class="icon-user"></i> Online User </a></li>
                  <?php
                  $records_per_page=11;
                  $q_member = "SELECT member_id, username, status
                  FROM as_members ORDER BY status ASC";
                  $newquery = $siswa->paging ($q_member,$records_per_page);
                  foreach ($siswa->showData($newquery) as $member) {
                    if ($member['member_id']==$_SESSION['member_id']) { ?>

                    <?php }else {
                      if ($member['status']=="on") {
                        $status = 'user-online';
                      }else{
                        $status = 'user-offline';
                      }
                      ?>
                      <li class=""><a href="#user"><span class="<?=$status;?>"></span><i class="icon-user"></i> <?=$member['username']?> </a></li>
                      <?php
                    }
                  }
                  ?>
									<!-- <li><a href="#user1"><span class="user-offline"></span><i class="icon-user"></i> Offline User </a></li>
									<li><a href="#user2"><span class="user-online"></span><i class="icon-user"></i> Offline User </a></li> -->
								</ul>
								<div class="tab-content">
                  <div class="tab-pane active" id="user">
                    <?php
                    $q_message = "SELECT sendto, message_id, msgfrom, message, created_date, member_id, username, photo
                    FROM as_members RIGHT JOIN as_message
                    ON as_members.member_id=as_message.msgfrom
                    WHERE as_message.msgfrom ORDER BY created_date DESC";
                    foreach ($siswa->showData($q_message) as $pesan) {
                      if (empty($pesan['photo'])) {
                        $img = 'images/item-pic.png';
                      }else{
                        $img = '../images/anggota/'.$pesan['photo'];
                      }
                      if ($pesan['msgfrom']==$_SESSION['member_id']) {
                        $class_div = 'right-align';
                        $a_class = 'pull-right';
                      }else {
                        $class_div = '';
                        $a_class = 'pull-left';
                      }
                    ?>
                    <div class="conversation <?=$class_div;?>">
                      <a href="#" class="<?=$a_class;?> media-thumb"><img src="<?=$img;?>" alt="user" width="34" height="34"></a>
                      <div class="conversation-body">
                        <h4 class="conversation-heading"><?=($pesan['username']=='') ? '</b>Member Tidak Aktif :</b>' : $pesan['username'] . " : "?> </h4>
                        <p>
                           <?=$pesan['message']. "".$pesan['created_date'];?>
                        </p>
                      </div>
                    </div>
                    <?php } ?>

                  </div>

									<div class="tab-pane" id="user1">
										 User Offline
									</div>
								</div>
								<div class="chat-input">
                  <?php
                  if (isset($_POST['message-save'])) {
                    $msgfrom = $_SESSION['member_id'];
                    $message = $_POST['message'];
                    if ($siswa->createMessage($msgfrom,$message)) {
                      // jika pesan berhasil di kirim
                      echo "<script> alert('Pesan berhasil di kirim') </script>";
                      echo "<meta http-equiv='refresh' content='0; url=?menu=chat&msg=success'>";
                    }else {
                      echo "<script> alert('Pesan gagal di kirim') </script>";
                      echo "<meta http-equiv='refresh' content='0; url=?menu=chat&msg=failed'>";
                    }
                  }
                  ?>
                  <form class="form-horizontal" action="" method="POST">
                    <div class="control-group">
                      <label class="control-label">Pesan:</label>
                      <div class="controls">
                        <textarea rows="5" name="message" class="tinymce-simple span12"></textarea>
                        <button name="message-save" class="btn btn-primary btn-large" type="submit"><i class="icon-ok"></i> Send</button>
                      </div>
                    </div>
                  </form>
								</div>
							</div>
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
