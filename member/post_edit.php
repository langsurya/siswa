<?php include_once 'head.php'; ?>
<link rel="stylesheet" href="crauser.css" media="screen" title="no title">
<!-- Date Picker  -->
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
/*====DATE Time Picker====*/
 $(function () {
		 $('#datetimepicker1').datetimepicker({
				 language: 'pt-BR'
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
// $(function() {
// editor = $("#input").cleditor();
//   });

$(function() {
		$('textarea.tinymce-simple').tinymce({
			script_url : 'js/tiny_mce/tiny_mce.js',
			theme : "simple"
			});
		});
	$(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : 'js/tiny_mce/tiny_mce.js',
			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",
			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",
			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});

</script>
<!-- /TinyMCE -->
<head>
<body>

  <div class="layout">

	<?php

  if (isset($_POST['ubah-topics'])) {
    $topic_id = $_GET['topic_id'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $modified_date = $_POST['modified_date'];

    $ufoto = $_FILES['image']['name'];

    if (empty($_FILES['image']['name'])) {
      if ($siswa->editTopics($topic_id,$title,$category_id,$description,$ufoto,$modified_date)) {
        echo "<script> alert('Postingan Telah Diedit') </script>";
        echo "<meta http-equiv='refresh' content='0; url=?menu=post'>";
        // header('location:?menu=post&msg=success');
      }
    }else{
      // Ambil data gambar dari form
      $nama_file = $_FILES['image']['name'];
      $ukuran_file = $_FILES['image']['size'];
      $tipe_file = $_FILES['image']['type'];
      $tmp_file = $_FILES['image']['tmp_name'];

      // set path folder tempat menyimpan gambar
      $imgExt = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
      $userpic = rand(1000,1000000).".".$imgExt;
      $path = "../images/topics/".$userpic;
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
            unlink('../images/topics/'.$poto_lama);
            //  proses simpan ke database
            if ($siswa->editTopics($topic_id,$title,$category_id,$description,$userpic,$modified_date)) {
              // header('location:?menu=post&msg=success');
              // jika gambar gagal di upload
              echo "<script> alert('Postingan Telah Diedit') </script>";
              echo "<meta http-equiv='refresh' content='0; url=?menu=post'>";
            }else{
              header('location:?menu=post&msg=gagal');
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

  if (isset($_GET['topic_id'])) {
    $id = $_GET['topic_id'];
    $table = 'as_topics';
    $key = 'topic_id';
    extract($siswa->getData($id,$table,$key,''));
  }

  include_once 'navbar_top.php';
  include_once 'sidebar.php';
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <div class="primary-head">
				<h3 class="page-header">Edit Postingan - <small>Sistem Informasi Salt Water Aquarium</small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="?menu=home" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
        <li><a href="?menu=post">Post</a><span class="divider"> <i class="icon-angle-right"></i></span></li>
				<li class="active">Edit Posting</li>
			</ul>


      <div class="row-fluid">
        <div class="span12">
          <div class="content-widgets gray">
            <div class="widget-head blue">
              <h3>POST</h3>
            </div>
            <div class="widget-container">
      				<form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
      					<div class="control-group">
      						<label class="control-label">Title</label>
      						<div class="controls">
      							<input placeholder="Title " name="title" class="span12" type="text" value="<?=$title;?>">
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Kategori</label>
                  <div class="controls">
      							<select class="span6" name="category_id">
      								<option>Pilih Kategori</option>
                      <?php
                      include_once '../inc/class.php';
                      $siswa = new ClassSiswa;
                      $query = "SELECT * FROM as_categories";
                      foreach ($siswa->showData($query) as $value) {
                        if ($value['status']=='N') {?>
                          # jika status N maka kategori tidak ada
                          <option value="<?=$value['category_id']?>" <?=($value['category_id']==$category_id) ? 'selected' : '' ?>><?=$value['category_name']?> (Kategori Sudah Tidak Ada)</option>
                        <?php }else{
                        ?>
                        <option value="<?=$value['category_id']?>" <?=($value['category_id']==$category_id) ? 'selected' : '' ?>><?=$value['category_name']?></option>
                        <?php
                      }
                      }
                      ?>
      							</select>
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Description</label>
      						<div class="controls">
      							<textarea rows="15" name="description" class="tinymce span12"><?=$description;?></textarea>
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Images</label>
      						<div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> <img src="../images/topics/<?=$image;?>" alt="img"/> </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"> </div>
                      <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                        <input type="hidden" name="poto_lama" value="<?=$image;?>">
                        <input name="image" type="file"/>
                      </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                    </div>
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Tanggal Ubah</label>
      						<div class="controls">
      							<div id="datetimepicker1" class="input-append date ">
      								<input name="modified_date" data-format="yyyy/MM/dd hh:mm:ss" type="text" required><span class="add-on "><i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i></span>
      							</div>
      						</div>
      					</div>
      					<div class="form-actions">
      						<button type="submit" name="ubah-topics" class="btn btn-success">Ubah</button>
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
