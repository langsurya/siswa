<?php include_once 'head.php'; ?>
<script src="js/custom.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/ios-orientationchange-fix.js"></script>
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
				<h3 class="page-header">Calculator - <small>Hitung Volume Air</small></h3>
			</div>
      <ul class="breadcrumb">
				<li><a href="#" class="icon-home active"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
				<li>Calculator</li>
			</ul>

      <div class="row-fluid">
				<div class="span12">

	        <select name="" id="" onchange="changeValue(this.value)">
          	<option value="">Pilih Perhitungan</option>
          	<option value="silinder">Volume Tangki Air berbentuk Silinder / Tabung</option>
          	<option value="kubus">Volume Bak Penampung berbentuk Kubus / Segiempat</option>
          </select>
          <!-- /.select -->
          <div class="content-widgets gray">
            <div class="widget-head blue">
              <h3>Hitung Volume Air</h3>
            </div>
            <!-- /.widget-head -->
            <div class="widget-container">
            
							<?php if (isset($_GET['pilih'])): ?>
							<?php if ($_GET['pilih']=='silinder'): ?>
      				<form action="" method="POST" class="form-horizontal">
      					<div class="control-group">
      						<label class="control-label">Diameter:</label>
      						<div class="controls">
      							<input name="diameter" placeholder="Hitung Per CM" class="span12" type="text">
      						</div>
      					</div>
      					<!-- ./control-group -->
                <div class="control-group">
      						<label class="control-label">Tinggi:</label>
      						<div class="controls">
      							<input name="tinggi" placeholder="Hitung Tinggi per CM" class="span12" type="text">
      						</div>
      					</div>
                <!-- ./control-group -->
                <input type="hidden" name="member_id" value="">
      					<div class="form-actions">
      						<button name="hitung_silinder" type="submit" class="btn btn-success">Hitung</button>
      						<button type="button" class="btn">Batal</button>
      					</div>
      					<!-- ./form-actions -->
      				</form>			
      													
      				<?php elseif($_GET['pilih']=='kubus'): ?>
								<form action="" method="POST" class="form-horizontal">
      					<div class="control-group">
      						<label class="control-label">Panjang:</label>
      						<div class="controls">
      							<input name="panjang" placeholder="Hitung Per CM" class="span12" type="text">
      						</div>
      					</div>
      					<!-- ./control-group -->
      					<div class="control-group">
      						<label class="control-label">Lebar:</label>
      						<div class="controls">
      							<input name="lebar" placeholder="Hitung Per CM" class="span12" type="text">
      						</div>
      					</div>
      					<!-- ./control-group -->
                <div class="control-group">
      						<label class="control-label">Tinggi:</label>
      						<div class="controls">
      							<input name="tinggi" placeholder="Hitung Tinggi per CM" class="span12" type="text">
      						</div>
      					</div>
                <!-- ./control-group -->
                <input type="hidden" name="member_id" value="">
      					<div class="form-actions">
      						<button name="hitung_kubus" type="submit" class="btn btn-success">Hitung</button>
      						<button type="button" class="btn">Batal</button>
      					</div>
      					<!-- ./form-actions -->
      				</form>
							<?php endif ?>
							<?php endif ?>
      			</div>
						<!-- /.widget-container -->
          </div>
          <!-- /.content-widgets gray -->

					<script type="text/javascript">
              function changeValue(id) {
                window.location = "?menu=hitung-volume&pilih="+id;
              };
          </script>


					<div id="container">

            <div class="item">
							<div class="thumbnail">
							<?php 
							if (isset($_POST['hitung_silinder'])) {
								$diameter = $_POST['diameter'];
								$diameter = $diameter/2;
								$tinggi = $_POST['tinggi'];
								echo "Volume = jari-jari x jari-jari x tinggi x (22/7)<br>";
								echo "Volume = (".($diameter/100) .' x '.($diameter/100) .' x '.($tinggi/100).') x '.'(22/7)<br>';
								echo "Volume = ".($jari2=(($diameter/100)*($diameter/100))*($tinggi/100)).' x '.round((22/7),2)."<br>";
								echo "Volume = ".($v = round(($jari2)*round((22/7),2),2)).' m<sup>3</sup><br>';
								echo "Volume = ". ($v*1000).' Liter';
							}elseif (isset($_POST['hitung_kubus'])) {
								$panjang = $_POST['panjang'];
								$lebar = $_POST['lebar'];
								$tinggi = $_POST['tinggi'];
								$p = ($panjang/100);
								$l = ($lebar/100);
								$t = ($tinggi/100);
								$hasil = $p*$l*$t;
								$liter = $hasil*1000;
								echo "= (".$panjang.'/100) x ('.$lebar.'/100) x ('.$tinggi.'/100)<br>';
								echo "= ".$p.' x '.$l.' x '.$t.'<br>';
								echo "= ".$hasil.' m<sup>3</sup><br>';
								echo "Volume Air Untuk Wadah berukuran <b>".$hasil. " m<sup>3</sup></b> Adalah <b>".$liter.' Liter.</b>';
							}
							?>
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
