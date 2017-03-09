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
  include_once 'navbar_top.php';
  include_once 'navbar_l.php';
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <div class="primary-head">
				<h3 class="page-header">Buat Postingan - <small>Metro Style Bootstrap Admin Dashboard</small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
        <li><a href="?menu=post">Post</a><span class="divider"> <i class="icon-angle-right"></i></span></li>
				<li class="active">Buat Posting</li>
			</ul>

      <?php if (isset($_SESSION['username'])==false): ?>

        <?php //include_once 'texteditor.php'; ?>
      <?php endif; ?>

      <div class="row-fluid">
        <div class="span12">
          <div class="content-widgets gray">
            <div class="widget-head blue">
              <h3>POST</h3>
            </div>
            <div class="widget-container">
      				<form class="form-horizontal">
      					<div class="control-group">
      						<label class="control-label">Title</label>
      						<div class="controls">
      							<input placeholder="Text Input" class="span12" type="text">
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Kategori</label>
                  <div class="controls">
      							<select class="span6">
      								<option>1</option>
      								<option>2</option>
      								<option>3</option>
      								<option>4</option>
      								<option>5</option>
      							</select>
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Textarea</label>
      						<div class="controls">
      							<textarea rows="15" name="description" class="tinymce span12"></textarea>
      						</div>
      					</div>

      					<div class="control-group">
      						<label class="control-label">Text Input</label>
      						<div class="controls">
      							<input class="span12" type="text">
      							<span class="help-inline">Inline help text</span>
      						</div>
      					</div>
      					<div class="control-group">
      						<label class="control-label">Default File Input</label>
      						<div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA" alt="img"/> </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"> </div>
                      <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                        <input name="" type="file"/>
                      </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                    </div>
      							<!-- <input name="" class="file-uniform" type="file"> -->
      						</div>
      					</div>
                <div class="control-group">
      						<label class="control-label">Tanggal</label>
      						<div class="controls">
      							<div id="datetimepicker1" class="input-append date ">
      								<input data-format="dd/MM/yyyy hh:mm:ss" type="text"><span class="add-on "><i data-time-icon="icon-time" data-date-icon="icon-calendar" class="icon-calendar"></i></span>
      							</div>
      						</div>
      					</div>
                <input type="hidden" name="member_id" value="">
      					<div class="form-actions">
      						<button type="submit" class="btn btn-success">Save changes</button>
      						<button type="button" class="btn">Cancel</button>
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
