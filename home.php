<?php include_once 'head.php'; ?>
<script src="member/js/custom.js"></script>
<script src="member/js/respond.min.js"></script>
<script src="member/js/ios-orientationchange-fix.js"></script>
<head>
<body>

  <div class="layout">

	<?php	
  include_once 'member/navbar_top.php';
	include_once 'navbar_login.php';

  ?>
  <!-- ./ -->
	<div class="main-wrapper">
		<div class="container-fluid">


      <div class="primary-head">
				<h3 class="page-header">Home - <small>Metro Style Bootstrap Admin Dashboard</small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home active"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
			</ul>

      <div class="row-fluid">
				<div class="span12">
					<div id="container">

            <?php
            $records_per_page=10;
            $query = "SELECT as_topics.*,as_members.member_id,as_members.first_name FROM as_topics,as_members WHERE as_topics.member_id=as_members.member_id";
            $newquery = $siswa->paging ($query,$records_per_page);
            foreach ($siswa->showData($newquery) as $value) {
            ?>
            <div class="item">
							<div class="thumbnail">
								<img alt="300x200" data-src="holder.js/300x200" style="width: 500px; height: 200px;" src="images/topics/<?=$value['image'];?>">
								<div class="caption">
									<h3><a href="#"><?=$value['title'];?></a></h3>
                    <ul class="author-info" style="list-style:none; margin:0px;">
                      <li>
                        <strong> <i class="icon-user"></i> By:</strong> <?=$value['first_name'];?>
                        <strong> <i class="icon-calendar"></i></strong> <?=$value['created_date'];?>
                        <strong> <i class="icon-comment"></i></strong> Tidak ada komentar:
                      </li>
                    </ul>
									<p>
										<?=substr($value['description'],0,350)."...";?>
									</p>
									<p>
                    <a class="btn btn-success" href="?menu=read&topic_id=<?=$value['topic_id'];?>">
                      <i class="icon-book icon-large"></i> Read More <i class="icon-double-angle-right"></i>
                    </a>
									</p>
								</div>
							</div>
						</div>
            <?php
            }
            ?>


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
