<?php include_once 'head.php'; ?>
<script src="member/js/accordion.nav.js"></script>
<script src="member/js/jquery.masonry.js"></script>
<script src="member/js/jquery.masonry.js"></script>
<script src="member/js/modernizr-transitions.js"></script>
<script src="member/js/prettify.js"></script>
<script src="member/js/bootbox.js"></script>

<script src="member/js/custom.js"></script>
<script src="member/js/respond.min.js"></script>
<script src="member/js/ios-orientationchange-fix.js"></script>
<script type="text/javascript">
$(function(){
  $('#container').masonry({
    // options
    itemSelector : '.item',
	columnWidth : 240
  });
});
</script>
<style>
.item{ width:220px; margin:10px; float:left;}
.item{ margin-left:0px !important; margin-top:0px !important; margin-bottom:20px !important;}
.masonry,
.masonry .masonry-brick {
  -webkit-transition-duration: 0.7s;
     -moz-transition-duration: 0.7s;
      -ms-transition-duration: 0.7s;
       -o-transition-duration: 0.7s;
          transition-duration: 0.7s;
}
.masonry {
  -webkit-transition-property: height, width;
     -moz-transition-property: height, width;
      -ms-transition-property: height, width;
       -o-transition-property: height, width;
          transition-property: height, width;
}
.masonry .masonry-brick {
  -webkit-transition-property: left, right, top;
     -moz-transition-property: left, right, top;
      -ms-transition-property: left, right, top;
       -o-transition-property: left, right, top;
          transition-property: left, right, top;
}
</style>


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
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Gallery</h3>

					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#">Library</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Gallery</li>
					</ul>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<div id="container">
            <?php
            $records_per_page=10;
            $query = "SELECT as_topics.*,as_members.member_id,as_members.first_name FROM as_topics,as_members WHERE as_topics.member_id=as_members.member_id ";
            $newquery = $siswa->paging ($query,$records_per_page);
            foreach ($siswa->showData($newquery) as $value) {
            ?>
						<div class="item">
							<div class="thumbnail">
								<img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="images/topics/<?=$value['image']?>">
								<div class="caption">
									<h5><?=$value['title'];?></h5>
									<p>
										<?=substr($value['description'],0,100)."...";?>
									</p>
									<p>
										<!-- <a class="btn btn-primary" href="#">Action</a>
                    <button class="alert-box btn">Alert</button> -->
									</p>
								</div>
							</div>
						</div>
            <?php } ?>
						<div class="item">
							<div class="thumbnail">
								<img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADICAYAAABS39xVAAAELElEQVR4nO3bMW7iQABA0b3/UXwDDkBP75aaK2QrR7NeO4HskvCtVzwJWQOaZr7Gg/3rdru9ART8+ukJANxLsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgTrQE6n09s0Te8ul8vu2PP5/JSxjxh/c/HK8+XnCdZBbC3+aZrezufzX2PXYftfY+81z/PufKdpertery81X16HYB3A5XJ5X5jzPO9eW19fwjAG5KtjHzFGZbl2vV7fr51Op5eaL69DsA5gCcC40McAjAt1GbvecWxdv3fsXmzGsWOc9nY9463cM+dLl2Ad1Lj4x1usvXOdZfwYnEfGbu3oHt3dbAXrWfOlSbAOZn0+NMZq3AntLeolFo+MXax3enu7rj3rndez50uPYB3MuNNZ3wY9OwDrW8O9Q/QtWztCwWJNsA5qawF/RwC+8kjB+J1xvGCxJlgH9i+L+qsBGL93z+5qL1bfNV9aBOvAfuIQe/0c1EfnVx/F6rvmS4tgxd2zsxgX6tYjEOP1rccE7hl7u/15frb+vJ73GKuP/kF85nzpEawD2DrgHv8tHIPxrAcxx3AuYdg7eB9/97OIeHCUkWAdwPrc6LNbsme86vLZ0+vj+L25jp49X5oE60DWi/S7Xn7e282tvzvP86fvEe4djnv5mdtNsIAQwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjJ+A8sf5ZmmLjF2AAAAAElFTkSuQmCC">
								<div class="caption">
									<h3>Thumbnail label</h3>
									<p>
										Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
									</p>
									<p>
										<a class="btn btn-primary" href="#">Action</a><a class="btn" href="#">Action</a>
									</p>
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
			 &copy; 2017 Sistem Informasi Salt Water Aquarium
		</p>
	</div>
	<div class="scroll-top">
		<a href="#" class="tip-top" title="Go Top"><i class="icon-double-angle-up"></i></a>
	</div>
</div>

</body>
</html>
