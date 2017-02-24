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
          <div class="main_top"></div>
          <div class="main_bg">
            <div class="blog">

              <div class="blog_left">
                <div class="blog_news">
                  <div class="news_top">
                    <div class="news_top_left">
                    <p class="date_day">20</p>
                    <p class="date_month">september</p>
                    </div>
                    <div class="news_top_right">
                    <div class="news_title">
                      <h3>Mauris volutpat ullamcorper mauris, sed dignissim tortor fermentum vitae. Quisque congue pulvinar interdum. </h3>
                    </div>
                    </div>
                  </div>
                  <div class="news_text">

                    <a href="#">Aenean tristique fermentum ipsum eu vestibulum.</a><br />
                    <p>Morbi id magna ac tortor pulvinar facilisis.Phasellus molestie urna vel enim pharetra varius. Nam iaculis mattis eros, sit amet auctor tellus blandit at. Maecenas a urna dui. </p>
                    <br />
                    <p>Nunc sed elit id enim placerat pulvinar. Donec tincidunt scelerisque sem at tincidunt. Integer ipsum sem, malesuada in ultrices eget, </p>
                    <br />

                    <p> Donec tincidunt scelerisque sem at tincidunt. Integer ipsum sem, malesuada in ultrices eget, sollicitudin in elit. Phasellus molestie urna vel enim pharetra varius. Nam iaculis mattis eros, sit amet auctor tellus blandit at. Maecenas a urna dui. Aliquam erat volutpat.</p>
                    <br />
                    <p>Donec luctus scelerisque enim. Nam vel felis metus. Curabitur est ante, condimentum ac faucibus nec, commodo sit amet risus. Praesent viverra est at quam hendrerit et pulvinar magna condimentum. Praesent ut leo odio, at ullamcorper neque. Suspendisse iaculis tempor vulputate. </p>

                    <div class="tegs_hr"></div>
                    <div class="tegs_box">
                      <div class="publ">
                        by <a href="#">John Johnson</a> on <a href="#">Sept.20, 2010</a>
                      </div>
                      <div class="com"><a href="#">Comments: 14</a></div>
                    </div><div style="clear: both"></div>

                  </div>
                </div>


                  <div class="news_left">
                      <div class="news_top">
                          <div class="news_top_left">
                              <p class="date_day">14</p>
                              <p class="date_month">september</p>
                          </div>
                          <div class="news_top_right">
                              <div class="news_title">
                                  <h3>Ut eros eros, scelerisque eu consequat vel, viverra id purus. Nunc molestie bibendum pretium.</h3>
                              </div>
                          </div>
                      </div>
                      <div class="news_text">

                          <a href="#">Aenean tristique fermentum ipsum eu vestibulum.</a><br />
                          <p>Morbi id magna ac tortor pulvinar facilisis.Phasellus molestie urna vel enim pharetra varius. Nam iaculis mattis eros, sit amet auctor tellus blandit at. Maecenas a urna dui. </p>
                          <br />
                          <p>Nunc sed elit id enim placerat pulvinar. Donec tincidunt scelerisque sem at tincidunt. Integer ipsum sem, malesuada in ultrices eget, sollicitudin in elit. Phasellus molestie urna vel enim pharetra varius. Nam iaculis mattis eros, sit amet auctor tellus blandit at. Maecenas a urna dui. Aliquam erat volutpat. </p>

                          <div class="tegs_hr"></div>
                          <div class="tegs_box">
                              <div class="publ">
                                  by <a href="#">John Johnson</a> on <a href="#">Sept.14, 2010</a>
                              </div>
                              <div class="com"><a href="#">Comments: 10</a></div>
                          </div><div style="clear: both"></div>

                      </div>
                  </div>

              </div>

              <div class="blog_right">
                  <div class="news">
                      <h5>Archives</h5>
                      <div class="red_hr"></div>
                      <ul>
                          <li><a href="#">January  2010</a></li>
                          <li><a href="#">February 2010</a></li>
                          <li><a href="#">March  2010</a></li>
                      </ul>
                  </div>
                  <div class="news">
                      <h5>Categories</h5>
                      <div class="red_hr"></div>
                      <ul>
                          <li><a href="#">Lorem ipsum</a></li>
                          <li><a href="#">Integer at enim</a></li>
                          <li><a href="#">Fusce in quam id</a></li>
                          <li><a href="#">Nulla venenatis iaculis</a></li>
                          <li><a href="#">Ut interdum quam a purus</a></li>
                      </ul>
                  </div>
                  <div class="news">
                      <h5>Meta</h5>
                      <div class="red_hr"></div>
                      <ul>
                          <li><a href="#">Log in</a></li>
                          <li><a href="#">Valid XHTML</a></li>
                          <li><a href="#">XFN</a></li>
                          <li><a href="#">WordPress</a></li>
                      </ul>
                  </div>
              </div>


              <div style="clear: both"></div>
            </div>
          </div>
          <div class="main_bot"></div>
        </div>

      </div>
      <!-- .site-div -->

      <?php include_once 'footer.php'; ?>

    </div>
  </body>
</html>
