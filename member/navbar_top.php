<!-- Navbar
  ================================================== -->
<div class="navbar navbar-inverse top-nav">
  <div class="navbar-inner">
    <div class="container">
      <span class="home-link"><a href="index.php" class="icon-home"></a></span>


      <div class="btn-toolbar pull-right notification-nav">
        <?php if (isset($_SESSION['username'])==true): ?>
          <div class="btn-group">
						<div class="dropdown">
							<a class="btn btn-notification dropdown-toggle" data-toggle="dropdown"><i class="icon-signout"></i></a>
							<div class="dropdown-menu pull-right ">
                <a class="btn btn-primary btn-large btn-block" href="?menu=keluar">Keluar</a>
							</div>
						</div>
					</div>
        <?php endif; ?>
      </div>


    </div>
  </div>
</div>
