<?php include_once 'head.php'; ?>
<link rel="stylesheet" href="crauser.css" media="screen" title="no title">

<head>
<body>

  <div class="layout">

	<?php
	include_once 'inc/dbconfig.php';
	include_once 'inc/class.login.php';
	$login = new login($DB_con);
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

            <div class="item">
							<div class="thumbnail">
								<img alt="300x200" data-src="holder.js/300x200" style="width: 500px; height: 200px;" src="images/gal8.jpg">
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
						<div class="item">
							<div class="thumbnail">
								<img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADICAYAAABS39xVAAAELElEQVR4nO3bMW7iQABA0b3/UXwDDkBP75aaK2QrR7NeO4HskvCtVzwJWQOaZr7Gg/3rdru9ART8+ukJANxLsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgTrQE6n09s0Te8ul8vu2PP5/JSxjxh/c/HK8+XnCdZBbC3+aZrezufzX2PXYftfY+81z/PufKdpertery81X16HYB3A5XJ5X5jzPO9eW19fwjAG5KtjHzFGZbl2vV7fr51Op5eaL69DsA5gCcC40McAjAt1GbvecWxdv3fsXmzGsWOc9nY9463cM+dLl2Ad1Lj4x1usvXOdZfwYnEfGbu3oHt3dbAXrWfOlSbAOZn0+NMZq3AntLeolFo+MXax3enu7rj3rndez50uPYB3MuNNZ3wY9OwDrW8O9Q/QtWztCwWJNsA5qawF/RwC+8kjB+J1xvGCxJlgH9i+L+qsBGL93z+5qL1bfNV9aBOvAfuIQe/0c1EfnVx/F6rvmS4tgxd2zsxgX6tYjEOP1rccE7hl7u/15frb+vJ73GKuP/kF85nzpEawD2DrgHv8tHIPxrAcxx3AuYdg7eB9/97OIeHCUkWAdwPrc6LNbsme86vLZ0+vj+L25jp49X5oE60DWi/S7Xn7e282tvzvP86fvEe4djnv5mdtNsIAQwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjJ+A8sf5ZmmLjF2AAAAAElFTkSuQmCC">
								<div class="caption">
									<h3>Thumbnail label</h3>
									<p>
										Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
									</p>
									<p>
										<a class="btn btn-primary" href="#">Action</a><a class="btn" href="#">Action</a>
									</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="thumbnail">
                <img src="" alt="" />
								<img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="images/wood_1.png">
								<div class="caption">
									<h3><a href="#">Thumbnail label</a></h3>
									<p>
										Cras justo odio, dapibus ac facilisis in, egestas eget quCras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.am. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
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
