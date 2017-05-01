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

  if (isset($_GET['schedule_id'])) {
    $id = $_GET['schedule_id'];
    $table = 'as_schedule';
    $key = 'schedule_id';
    extract($siswa->getData($id,$table,$key,''));
  }

  include_once 'navbar_top.php';
  include_once 'sidebar.php';
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <div class="primary-head">
				<h3 class="page-header">Show Schedule - <small>Sistem Informasi Salt Water Aquarium</small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="?menu=home" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
        <li><a href="?menu=post">Schedule</a><span class="divider"> <i class="icon-angle-right"></i></span></li>
				<li class="active">Show Schedule</li>
			</ul>

      <div class="row-fluid">
        <div class="span12">
          <div class="content-widgets gray">
            <div class="widget-head blue">
              <h3>Schedule</h3>
            </div>
            <div class="widget-container">
      				<form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
      					<div class="control-group">
      						<label class="control-label">Tanggal</label>
      						<div class="controls">
      							<input class="span12" type="text" disabled value="<?=$tanggal;?>">
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Kegiatan</label>
      						<div class="controls">
      							<textarea rows="15" class="tinymce span12" ><?=$kegiatan;?></textarea>
      						</div>
      					</div>

                <div class="control-group">
                  <label class="control-label">Lokasi</label>
                  <div class="controls">
                    <input class="span12" type="text" disabled value="<?=$lokasi;?>">
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
			 &copy; 2013 westilian
		</p>
	</div>
	<div class="scroll-top">
		<a href="#" class="tip-top" title="Go Top"><i class="icon-double-angle-up"></i></a>
	</div>
</div>

</body>
</html>
