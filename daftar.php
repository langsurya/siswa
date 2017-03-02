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

                  <?php
                  include_once 'inc/class.php';
                  $siswa = new ClassSiswa;
                  if (isset($_POST['simpan'])) {
                    $fb = $_POST['facebook_id'];
                    $twitter = $_POST['twitter_id'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $provinci_id = $_POST['provinci_id'];
                    $city_id = $_POST['city_id'];
                    $hp = $_POST['hp'];
                    $alamat = $_POST['alamat'];
                    $bio = $_POST['bio'];

                    // Ambil data gambar dari form
                    echo $nama_file = $_FILES['foto']['name'];
                    $ukuran_file = $_FILES['foto']['size'];
                    $tipe_file = $_FILES['foto']['type'];
                    $tmp_file = $_FILES['foto']['tmp_name'];

                    // set path folder tempat menyimpan gambar
                    $path = "images/anggota/".$nama_file;

                    if (!empty($nama_file)) {

                      // Cek apakah tipe file yang di upload adalah JPG/JPEG/PNG
                      if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
                        # jika tipe file JPEG/JPEG/PNG, maka lakukan:
                        // cek apakah ukuran file sama atau lebih kecil dari 1MB
                        if ($ukuran_file <= 100000) {
                          # jika ukuran file kurang dari sama dengan 1MB, lakukan:
                          if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di upload
                            # jika gambar berhasil di upload, lakukan:
                            // proses simpan ke database
                            $siswa->create_anggota($fb,$twitter,$email,$username,$password,$first_name,$last_name,$provinci_id,$city_id,$hp,$alamat,$bio,$nama_file);
                            echo "<script> alert('Data Berhasil di tambah') </script>";
                            echo "<meta http-equiv='refresh' content='0; url=?menu=daftar&msg=success'>";
                          }else{
                            // jika gambar gagal di upload
                            echo "<script> alert('Gambar Gagal di upload') </script>";
                            echo "<meta http-equiv='refresh' content='0; url=?module=siswa_input'>";
                          }
                        }else{
                          # jika ukuran file kurang dari sama dengan 1MB, lakukan:
                          echo "<script> alert('Ukuran File Gambar Melebihi 1MB') </script>";
                          echo "<meta http-equiv='refresh' content='0; url=?module=siswa_input'>";
                        }
                      }else{
                        // tipe file yang di upload bulan JPG/JPEG/PNG
                        // jika gambar gagal di upload
                        echo "<script> alert('Gambar Gagal di upload Harus JPG/JPEG/PNG') </script>";
                        echo "<meta http-equiv='refresh' content='0; url=?module=siswa_input'>";
                      }
                    }elseif(!empty($nama_file)) {
                      $siswa->create_anggota($fb,$twitter,$email,$username,$password,$first_name,$last_name,$provinci_id,$city_id,$hp,$alamat,$bio,$nama_file);
                      echo "<script> alert('Berhasil Daftar') </script>";
                    }
                  }
                  ?>

                  <div id="contact_form">
                    <form id="form2" method="post" enctype="multipart/form-data" action="">
                      <fieldset>
                        <label for="con_fb">Facebook ID:</label><br />
                        <input id="con_fb" type="text" name="facebook_id" alt=""/><br />
                        <label for="con_name">Twitter ID:</label><br />
                        <input id="con_name" type="text" name="twitter_id" alt=""/><br />
                        <label for="con_email">Your Email:</label><br />
                        <input id="con_email" type="text" name="email" value="" alt=""/><br />
                        <label for="con_name">Username:</label><br />
                        <input id="con_name" type="text" name="username" alt=""/><br />
                        <label for="con_name">Password:</label><br />
                        <input id="con_name" type="text" name="password" alt=""/><br />
                        <label for="con_name">First Name:</label><br />
                        <input id="con_name" type="text" name="first_name" alt=""/><br />
                        <label for="con_name">Last Name:</label><br />
                        <input id="con_name" type="text" name="last_name" alt=""/><br />
                        <label for="con_name">Provinci:</label><br />
                        <input id="con_name" type="text" name="provinci_id" alt=""/><br />
                        <label for="con_name">City :</label><br />
                        <input id="con_name" type="text" name="city_id" alt=""/><br />
                        <label for="con_name">Handphone:</label><br />
                        <input id="con_name" type="text" name="hp" alt=""/><br />
                        <label for="con_name">Alamat:</label><br />
                        <input id="con_name" type="text" name="alamat" alt=""/><br />

                        <label for="con_mess">Bio:</label><br />
                        <textarea id="con_mess" name="bio" cols="0" rows="0"></textarea><br />
                        <label for="con_name">Foto :</label><br/>
                        <input type="file" name="foto">

                        <input type="submit" id="contact-submit" name="simpan" value="Submit"/>
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
