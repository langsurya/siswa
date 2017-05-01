<?php include_once 'head.php'; ?>
<script src="js/custom.js"></script>

<head>
<body>

  <div class="layout">

	<?php
  include_once 'navbar_top.php';
  include_once 'sidebar.php';
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">

      <div class="primary-head">
				<h3 class="page-header">Schedule - <small>Wellcome <?=$_SESSION['nama'];?></small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
				<li class="active">Schedule</li>
			</ul>


      <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets gray">
						<div class="widget-head green">
			        <h3>Schedule</h3>
			      </div>
						<div class="widget-container">

						<table class="stat-table table table-stats table-striped table-sortable table-bordered">
							<tbody>
							<tr>
								<th>#</th>
								<th>Tanggal</th>
								<th>Kegiatan</th>
								<th>Lokasi</th>
                <th style="text-align: center;">Aksi</th>
							</tr>
              <?php
              error_reporting(1);
              include_once '../inc/class.php';
              $siswa = new ClassSiswa;
              $id = $_SESSION['member_id'];
              $records_per_page=10;
              $query = "SELECT * FROM as_schedule";
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
								<td><?=$no;?></td>
								<td><?=$value['tanggal'];?></td>
								<td><?=strip_tags(substr($value['kegiatan'],0,250))."...";?></td>
								<td><?=$value['lokasi'];?></td>
                <td style="text-align: center;">
                  <a href="?menu=scheduleShow&schedule_id=<?=$value['schedule_id']?>" title="Show"><span class="icon-eye-open"></span></a>
                </td>
							</tr>
              <?php
              $no++;
               }
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
