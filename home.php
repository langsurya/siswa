<?php
include_once 'inc/dbconfig.php';
include_once 'inc/dbconfig.php';
include_once 'inc/class.login.php';
$login = new login($DB_con);
session_start();
include_once 'header.php';
?>
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
          <div class="index_main_top"></div>
          <div class="main_bg">
            <div class="index_prev_grad">

              <div class="coda-slider-wrapper">
                <div class="coda-slider preload" id="coda-slider-2">
                  <div class="panel">
                    <div class="panel-wrapper">

                      <div class="prev_but_center">
                        <div class="prev_but_center_left">
                          <div class="prec_img"><img src="images/pic-01.jpg" alt="" title="" /></div>
                        </div>
                        <div class="prev_but_center_right">
                          <p><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </a><br />
                              Nam justo odio, congue id fermentum sit amet, placerat sed nibh. Vestibulum pharetra nibh eu magna accumsan tristique. Sed ac velit urna, venenatis vulputate purus.</p>
                          <div class="read"><a href="#">read more</a></div>
                          <p><a href="#">Vivamus id lobortis nisi. Duis semper porta justo, vel sodales velit vehicula vel. </a><br />
                              Donec non vulputate odio. Quisque tellus augue, tristique vel lobortis ut, convallis vel est. Nam vel congue lectus. Suspendisse ullamcorper odio et leo congue eu semper </p>
                          <div class="read"><a href="#">read more</a></div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="panel">
              			<div class="panel-wrapper">

              				<div class="prev_but_center">
                        <div class="prev_but_center_left">
                          <div class="prev_img"><img src="images/header_scroll.jpg" alt="" title=""/></div>
                        </div>
                        <div class="prev_but_center_right">
                          <p><a href="#">Vivamus id lobortis nisi. Duis semper porta justo, vel sodales velit vehicula vel. </a><br />
                              Donec non vulputate odio. Quisque tellus augue, tristique vel lobortis ut, convallis vel est. Nam vel congue lectus. Suspendisse ullamcorper odio et leo congue eu semper  Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /><br />
                              Nam justo odio, congue id fermentum sit amet, placerat sed nibh. Vestibulum pharetra nibh eu magna accumsan tristique. Sed ac velit urna, venenatis vulputate purus.</p>
                          <div class="read"><a href="#">read more</a></div>
                        </div>
                      </div>

              			</div>
              		</div>
                  <!-- ./panel -->

              		<div class="panel">
              			<div class="panel-wrapper">

              				<div class="prev_but_center">
                        <div class="prev_but_center_left">
                          <div class="prev_img"><img src="images/header_scroll2.jpg" alt="" title=""/></div>
                        </div>
                        <div class="prev_but_center_right">
                          <p><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </a><br />
                              Nam justo odio, congue id fermentum sit amet, placerat sed nibh. Vestibulum pharetra nibh eu magna accumsan tristique. Sed ac velit urna, venenatis vulputate purus.</p>
                          <div class="read"><a href="#">read more</a></div>
                          <p><a href="#">Vivamus id lobortis nisi. Duis semper porta justo, vel sodales velit vehicula vel. </a><br />
                              Donec non vulputate odio. Quisque tellus augue, tristique vel lobortis ut, convallis vel est. Nam vel congue lectus. Suspendisse ullamcorper odio et leo congue eu semper </p>
                          <div class="read"><a href="#">read more</a></div>
                        </div>
                      </div>

              			</div>
              		</div>
                  <!-- ./panel -->

                  <div class="panel">
              			<div class="panel-wrapper">

              				<div class="prev_but_center">
                        <div class="prev_but_center_left">
                          <div class="prev_img"><img src="images/header_scroll3.jpg" alt="" title=""/></div>
                        </div>
                        <div class="prev_but_center_right">
                          <p><a href="#">Vivamus id lobortis nisi. Duis semper porta justo, vel sodales velit vehicula vel. </a><br />
                                Donec non vulputate odio. Quisque tellus augue, tristique vel lobortis ut, convallis vel est. Nam vel congue lectus. Suspendisse ullamcorper odio et leo congue eu semper  Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /><br />
                                Nam justo odio, congue id fermentum sit amet, placerat sed nibh. Vestibulum pharetra nibh eu magna accumsan tristique. Sed ac velit urna, venenatis vulputate purus.</p>
                          <div class="read"><a href="#">read more</a></div>
                        </div>
                      </div>

              			</div>
              		</div>
                  <!-- ./panel -->

                </div> <!-- .coda-slidebar -->
              </div>

            </div>
            <div class="index_prev_bot"></div>
            <div id="index_box">
                <div id="index_box_top"></div>
                <div id="index_box_bg">
                    <h3>Etiam et mi arcu, at aliquet sapien. Proin mauris mauris, aliquet ut pellentesque eu, fringilla quis neque.</h3>
                    <p>Curabitur euismod venenatis odio, eu mollis augue faucibus sit amet. Curabitur aliquet varius dui ut lacinia. In hac habitasse platea dictumst. Donec dictum velit nec leo dignissim eget pellentesque elit hendrerit. In hac habitasse platea dictumst. Etiam et mi arcu, at aliquet sapien. Proin mauris mauris, aliquet ut pellentesque eu, fringilla </p>
                    <div class="readred"><a href="#">read more</a></div>
                </div>
                <div id="index_box_bot"></div>
            </div>

            <div id="index_col">
              <div id="index_col1">
                <img src="images/notebook.png" alt="" title="" style="float: left; padding-right: 10px; padding-bottom: 4px;" />
                <h4>Company News</h4>
                <div class="pad" style="padding-bottom: 7px; border-bottom: 1px dotted #666666; margin-bottom: 10px;">
                  <a href="#">Apr. 10, 2010</a><br />
                  <p><a href="#">Suspendisse rutrum interdum lacinia. </a><br />
                      Suspendisse tempus aliquet elit sit amet pellentesque. Donec iaculis pulvinar mauris, </p>
                  <div style="text-align: right"><a href="#">read more...</a></div>
                </div>
                <div class="pad" style="padding-bottom: 3px;">
                  <a href="#">Apr. 10, 2010</a><br />
                  <p><a href="#">Suspendisse rutrum interdum lacinia. </a><br />
                      Suspendisse tempus aliquet elit sit amet pellentesque. Donec iaculis pulvinar mauris, </p>
                  <div style="text-align: right"><a href="#">read more...</a></div>
                </div>
              </div>

              <div id="index_col2">
                <img src="images/green.png" alt="" title="" style="float: left; padding-right: 10px; padding-bottom: 4px;" />
                <h4>Recent Projects</h4><br />
                <a href="images/project1.jpg" class="pirobox_footer" title="First Project Screenshot"><img src="images/pic-02.jpg" alt="" title=""/></a><br /><br />
                <a href="images/project2.jpg" class="pirobox_footer" title="Second Project Screenshot"><img src="images/pic-03.jpg" alt="" title=""/></a>
              </div>

              <?php
              include_once 'login.php';
              ?>
              <div style="clear: both"></div>
            </div>

          </div>
          <div class="main_bot"></div>
        </div>

      </div>

      

      <?php include_once 'footer.php'; ?>


    </div>

  </body>
</html>
