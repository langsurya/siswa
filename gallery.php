<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>SISWA</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
	<!-- Pirobox setup and styles -->
  <script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
  <script type="text/javascript" src="lib/pirobox.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 400, //animation speed
			bg_alpha: 0.1, //background opacity
			slideShow : false, // true == slideshow on, false == slideshow off
			slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
			close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox

	});
});
</script>

<link href="images/style.css" rel="stylesheet" type="text/css" />


<!-- Pirobox setup and styles end-->
  </head>
  <body>
    <div id="bg_img">
      <div id="site_div">
        <div id="header">
          <div id="logo">
            <h1><a href="#">metamorph_classified</a></h1>
            <a href="#"><small>Design by Metamorphosis Design</small></a>
          </div>
          <?php include_once 'menu.php'; ?>
          <div style="clear: both;"></div>
        </div>
        <div id="main">
          <div class="main_top"></div>
          <div class="main_bg">

            <div class="row">
              <div class="box_img2">
                <div class="g4 g_size"><a href="images/gallery_big4.jpg" class="pirobox_gal1" title="4th Project Image"></a></div>
                <h3>New Title</h3>
                Morbi rhoncus ornare mauris, et sollicitudin metus lacinia sed. Vestibulum tincidunt sapien quis lectus iaculis a dignissim sapien ultricies. Aliquam lacinia</div>
              <div class="box_razd"></div>
              <div class="box_img2">
                <div class="g5 g_size"><a href="images/gallery_big5.jpg" class="pirobox_gal1" title="5th Project Image"></a></div>
                <h3>New Title</h3>
                Vestibulum vel ultricies augue. Donec sodales nibh congue ligula sodales cursus. Ut vulputate, arcu ac pellentesque lobortis, tortor est molestie est, at </div>
              <div class="box_razd"></div>
              <div class="box_img2">
                <div class="g6 g_size"><a href="images/gallery_big6.jpg" class="pirobox_gal1" title="6th Project Image"></a></div>
                <h3>New Title</h3>
                Sed id sem urna, ac sodales velit. Donec lobortis sapien a dolor fringilla vel blandit libero sodales. Integer ullamcorper mi et massa adipiscing posu
              </div>
            </div>
            <div style="height:15px"></div>

            <div class="row">
              <div class="box_img2">
                <div class="g7 g_size"><a href="images/gallery_big7.jpg" class="pirobox_gal1" title="7th Project Image"></a></div>
                <h3>New Title</h3>
                Donec quis volutpat orci. Proin mollis quam ac turpis varius aliquam. Aliquam arcu metus, imperdiet id cursus vel, commodo vitae sapien.
              </div>
              <div class="box_razd"></div>
              <div class="box_img2">
                <div class="g8 g_size"><a href="images/gallery_big8.jpg" class="pirobox_gal1"  title="8th Project Image"></a></div>
                <h3>New Title</h3>
                Cras quis augue urna. Sed lacus sem, tempus facilisis congue id, vulputate a ipsum. Vestibulum luctus nulla eget lacus fermentum lobortis. In tincid
              </div>
              <div class="box_razd"></div>
              <div class="box_img2">
                <div class="g9 g_size"><a href="images/gallery_big9.jpg" class="pirobox_gal1"  title="9th Project Image"></a></div>
                <h3>New Title</h3>
                Sed lacus sem, tempus facilisis congue id, vulputate a ipsum. Vestibulum luctus nulla eget lacus fermentum lobortis. In tincidunt rutrum mi in accum
              </div>
            </div>

          </div>
          <div class="main_bot"></div>

        </div>
      </div>

      <?php include_once 'footer.php'; ?>

    </div>
  </body>
</html>
