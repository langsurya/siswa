<?php include_once 'header.php'; ?>
  <body>
    <div id="bg_img">
      <div id="site_div">
        <div id="header">
          <div id="logo">
            <h1><a href="#">metamorph_classified</a></h1>
            <a href="#"><small>Design by Metamorphosis Design</small></a>
          </div>
        </div>
        <?php include_once 'menu.php'; ?>
        <div style="clear: both;"></div>
        <div id="main">
          <div class="main_top"></div>
          <div class="main_bg">
            <div class="contact">
              <div class="index_left">
                <img src="images/contact.png" alt="" title="" style="float: left; padding-right: 10px;" />
                <h4>Form Pendaftaran</h4>
                <div class="pad_left">
                  <a href="#">Silahkan Isi Form dibawah ini untuk member Baru </a>
                  <br /><br />
                  
                  <div id="contact_form">
                    <form id="form2" method="post" action="#">
                      <fieldset>
                        <label for="con_name">Name:</label><br />
                        <input id="con_name" type="text" name="con_name" value="" alt=""/><br />
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
