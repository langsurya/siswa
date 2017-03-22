<?php include_once 'head.php'; ?>
<script src="js/custom.js"></script>

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
				<h3 class="page-header">My Topics - <small>Wellcome <?=$_SESSION['nama'];?></small></h3>
				<ul class="top-right-toolbar">
					<a class="btn btn-success" href="?menu=postCreate">
  					<i class="icon-pencil icon-large"></i> Buat Postingan</a>
				</ul>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
				<li class="active">Post</li>
			</ul>


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
								<th>Title</th>
								<th>Member</th>
								<th>Description</th>
								<th>Category</th>
                <th style="text-align: center;" colspan="2">Aksi</th>
							</tr>
              <?php
              error_reporting(1);
              include_once '../inc/class.php';
              $siswa = new ClassSiswa;
              $id = $_SESSION['member_id'];
              $records_per_page=10;
              $query = "SELECT as_topics.*,
                        as_members.member_id, as_members.first_name as nama,
                        as_categories.category_id, as_categories.category_name
                        FROM as_topics
                        JOIN as_members ON as_topics.member_id = as_members.member_id
                        JOIN as_categories ON as_topics.category_id = as_categories.category_id
                        WHERE as_topics.member_id=$id";
              $newquery = $siswa->paging($query,$records_per_page);
              // penomoran halaman data pada halaman
              if (isset($_GET['page_no'])) {
                $page = $_GET['page_no'];
              }

              if (empty($page)) {
                $posisi = 0;
                $halaman = 1;
              }else{
                $posisi = ($page - 1) * $records_per_page;
              }
              $no=1+$posisi;
              foreach ($siswa->showData($newquery) as $value) {
              ?>
              <tr>
								<td><?=substr($value['title'],0,30)."...";?></td>
								<td><?=$value['nama'];?></td>
								<td><?=substr($value['description'],0,150)."...";?></td>
								<td><?=$value['category_name'];?></td>
                <td>
                  <a href="?menu=postEdit&topic_id=<?=$value['topic_id']?>" title="edit"><span class="icon-edit"></span></a>
                </td>
                <td>
                  <a href="?menu=delete&topic_id=<?=$value['topic_id']?>" onclick="return confirm('Anda yakin ingin menghapus data Kota <?php echo $value['title']; ?>')" title="Hapus"><span class="icon-remove"></span></a>
                </td>
							</tr>
              <?php }
              ?>
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
