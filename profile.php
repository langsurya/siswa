<?php
include_once 'inc/dbconfig.php';
include_once 'inc/dbconfig.php';
include_once 'inc/class.login.php';
include_once 'inc/class.php';
$login = new login($DB_con);
$siswa = new ClassSiswa;
session_start();
include_once 'header.php';

if (isset($_SESSION['user_id'])) {
  $id = $_GET['user_id'];
  extract($siswa->getData($id,'as_user','user_id'));
}
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
            <div class="contact">
              <div class="index_left">
                <img src="images/contact.png" alt="" title="" style="float: left; padding-right: 10px;" />
                <h4>Data Profile</h4>
                <div class="pad_left">
                  <a href="#"> malesuada sit amet </a>
                  <br /><br />
                  <p>Silahkan dilengkapi data dibawah ini... </p>
                  <div id="contact_form">
                    <form id="form2" method="post" action="#">
                      <fieldset>
                        <label for="con_name">Name:</label><br />
                        <input id="con_name" type="text" name="con_name" value="<?=$full_name?>" alt=""/><br />
                        <label for="con_user">Username:</label><br />
                        <input id="con_name" type="text" name="con_name" value="<?=$username?>" alt=""/><br />
                        <label for="con_name">Password:</label><br />
                        <input id="con_name" type="text" name="con_name" value="<?=$password?>" alt=""/><br />
                        <label for="con_email">Your Email:</label><br />
                        <input id="con_email" type="text" name="con_email" value="" alt=""/><br />
                        <label for="con_website">Your Phone:</label><br />
                        <input id="con_website" type="text" name="con_website" value="" alt=""/><br />
                        <label for="con_mess">Message:</label><br />
                        <textarea id="con_mess" name="con_mess" cols="0" rows="0"></textarea><br />
                        <input type="submit" id="contact-submit" value="Submit"/>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
              <div class="index_right">
                  <img src="images/green.png" alt="" title="" style="float: left; padding-right: 10px;" />
                  <h2>Our Location</h2>
                  <a href="#"><img src="images/location2.jpg" alt="" title="" style="margin-bottom: 10px;  padding-top: 5px"/></a>
                  <div class="dotted_hr"></div>

                  <h3>Our Head Office Address</h3>
                  <p>1234 SomeStreet</p>
                  <p>Brooklyn, NY 11201</p>
                  <p>Phone:  1(234) 567 8910</p>
                  <p>Fax: 1(234) 567 8910</p>
                  <a href="#">E-mail: companyname@yahoo.com</a>
                  <br /><br />
                  <div class="dotted_hr"></div>

                  <h3>Our Service Center Address</h3>
                  <p>1234 SomeStreet</p>
                  <p>Brooklyn, NY 11201</p>
                  <p>Phone:  1(234) 567 8910</p>
                  <p>Fax: 1(234) 567 8910</p>
                  <a href="#">E-mail: companyname@yahoo.com</a>

              </div>
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
