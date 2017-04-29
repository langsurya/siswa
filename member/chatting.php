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
  include_once 'navbar_l.php';

  // error_reporting(1);
  include_once '../inc/class.php';
  $siswa = new ClassSiswa;

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
                  <?php
                  $q_member = "SELECT sendto, msgfrom, message, member_id, username
                  FROM as_members RIGHT JOIN as_message
                  ON as_members.member_id=as_message.msgfrom GROUP BY username";
                  foreach ($siswa->showData($q_member) as $member) {
                      ?>
                      <li class=""><a href="#user<?=$member['member_id'];?>"><span class="user-online"></span><i class="icon-user"></i> <?=$member['username']?> </a></li>
                      <?php
                    $msgfrom = $member['msgfrom'];
                  }
                  ?>
									<!-- <li class="active"><a href="#user"><span class="user-online"></span><i class="icon-user"></i> Online User </a></li>
									<li><a href="#user1"><span class="user-offline"></span><i class="icon-user"></i> Offline User </a></li>
									<li><a href="#user2"><span class="user-online"></span><i class="icon-user"></i> Offline User </a></li> -->
								</ul>
								<div class="tab-content">
                  <?php
                  $q_message = "SELECT sendto, msgfrom, message, member_id, username
                  FROM as_members RIGHT JOIN as_message
                  ON as_members.member_id=as_message.msgfrom GROUP BY username";
                  foreach ($siswa->showData($q_message) as $pesanid) {
                  ?>
                  <div class="tab-pane" id="user<?=$pesanid['member_id'];?>">
                    <?php
                    $id = $pesanid['msgfrom'];
                    $q_message = "SELECT sendto, message_id, msgfrom, message, member_id, username
                    FROM as_members RIGHT JOIN as_message
                    ON as_members.member_id=as_message.sendto
                    WHERE as_message.sendto=$id";
                    foreach ($siswa->showData($q_message) as $pesan) {
                    ?>
                    <div class="conversation">
                      <a href="#" class="pull-left media-thumb"><img src="images/item-pic.png" alt="user" width="34" height="34"></a>
                      <div class="conversation-body ">
                        <h4 class="conversation-heading"><?=$pesan['username'];?>:</h4>
                        <p>
                           <?=$pesan['message'];?>
                        </p>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="conversation right-align">
                      <a href="#" class="pull-right media-thumb"><img src="images/item-pic.png" alt="user" width="34" height="34"></a>
                      <div class="conversation-body ">
                        <h4 class="conversation-heading">Marfy Says:</h4>
                        <p>
                           Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php }?>

									<div class="tab-pane" id="user1">
										 User Offline
									</div>
								</div>
								<div class="chat-input">
                  <?php
                  if (isset($_POST['message-save'])) {
                    // jika username member terdaftar
                    if (isset($_POST['sendto'])) {
                      $username = $_POST['sendto'];
                      $msgfrom = $_SESSION['member_id'];
                      $message = $_POST['message'];
                      $created_date	= date ("Y-m-d, H:i a");
                      $query = "SELECT * FROM as_members
                      WHERE  username='$username'";
                      extract($siswa->getData('','as_members','member_id',$query));

                      if (isset($member_id)) {
                        echo "member ada dengan id ".$member_id;
                        if ($siswa->createMessage($msgfrom,$member_id,$message)) {
                          // jika pesan berhasil di kirim
                					echo "<script> alert('Pesan berhasil di kirim') </script>";
                					echo "<meta http-equiv='refresh' content='0; url=?menu=chat&msg=success'>";
                        }
                      }else {
                        echo "<script> alert('Pesan gagal di kirim') </script>";
                        echo "<meta http-equiv='refresh' content='0; url=?menu=chat&msg=failed'>";
                      }
                    }
                  }
                  ?>
                  <form class="form-horizontal" action="" method="POST">
                    <div class="control-group">
                      <label class="control-label">Kirim Ke:</label>
                      <div class="controls">
                        <input id="tags_1" type="text" class="tags span12" value="" name="sendto" style="display: none;">
                      </div>
                    </div>
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
