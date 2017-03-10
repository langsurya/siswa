<?php include_once 'head.php'; ?>
<link rel="stylesheet" href="crauser.css" media="screen" title="no title">

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
				<h3 class="page-header">Falgun - <small>Metro Style Bootstrap Admin Dashboard</small></h3>
				<ul class="top-right-toolbar">
					<a class="btn btn-success" href="?menu=postCreate">
  					<i class="icon-pencil icon-large"></i> Buat Postingan</a>
				</ul>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
				<li class="active">Post</li>
			</ul>

      <?php if (isset($_SESSION['username'])==false): ?>

        <?php //include_once 'texteditor.php'; ?>
      <?php endif; ?>

      <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head green">
			        <h3>POST</h3>
			      </div>
						<div class="widget-container">

						<table class="stat-table table table-stats table-striped table-sortable table-bordered">
							<tbody>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Birth Date</th>
							</tr>
							<tr>
								<td>William</td>
								<td>sed@ut.com</td>
								<td>1 88 317 3405-3579</td>
								<td>February 28th, 2013</td>
							</tr>
							<tr>
								<td>Armando</td>
								<td>aliquet.Proin.velit@nectellusNunc.ca</td>
								<td>1 48 785 9884-8986</td>
								<td>October 21st, 2012</td>
							</tr>
							</tbody>
						</table>
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
