<?php include_once 'head.php'; ?>

<head>
<body>

  <div class="layout">

	<?php
	include_once '../inc/dbconfig.php';
	include_once '../inc/class.login.php';
	$login = new login($DB_con);
  include_once 'navbar_top.php';
	if (isset($_SESSION['username'])==true) {
		include_once 'navbar_l.php';
	}else {
		include_once 'navbar_login.php';
	}
  ?>
  <!-- ./ -->
	<div class="main-wrapper">
    <div class="container-fluid">
      <div class="row-fluid ">
        <div class="span12">
          <div class="primary-head">
            <h3 class="page-header">User Profile</h3>
            <ul class="top-right-toolbar">
              <li><a data-toggle="dropdown" class="dropdown-toggle blue-violate" href="#" data-original-title="Users"><i class="icon-user"></i></a> </li>
              <li><a href="#" class="green" data-original-title="Upload"><i class=" icon-upload-alt"></i></a></li>
              <li><a href="#" class="bondi-blue" data-original-title="Settings"><i class="icon-cogs"></i></a></li>
            </ul>
          </div>
          <ul class="breadcrumb">
            <li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
            <li><a href="#">Library</a><span class="divider"><i class="icon-angle-right"></i></span></li>
            <li class="active">Profile</li>
          </ul>
        </div>
      </div>
      <div class="row-fluid ">
        <div class="span3">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA" alt="img"/> </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"> </div>
            <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
              <input type="file"/>
              </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
          </div>
        </div>
        <div class="span9">
          <div class="profile-info">
            <div class="tab-widget">
              <ul class="nav nav-tabs" id="myTab1">
                <li class="active"><a href="#user"><i class="icon-user"></i> Profile Info</a></li>


              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="user">
                <div class=" information-container">
                  <h4>About You</h4>
                  <p>A client side Eng, UI Developer, A Webmaster, php, jquery...</p>
                  <p>Pellentesque sagittis tempor commodo. Pellentesque nec hendrerit ante. Donec ullamcorper congue iaculis. Etiam sollicitudin dictum sagittis. Phasellus eu tellus nec quam imperdiet scelerisque. Nulla egestas convallis purus at tristique. Etiam et magna in risus bibendum blandit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum ligula mi, iaculis eu tincidunt id, eleifend sed libero. Nam ullamcorper dui a justo scelerisque vel porttitor nisi dictum. Duis ac felis in ligula blandit dictum. Etiam tincidunt, quam sed porttitor tincidunt, libero nunc pretium felis, ut dignissim arcu lectus sed erat. Vivamus lobortis tempus lacus vitae vulputate. </p>
                  <h4>Basic Info</h4>
                  <ul class="profile-intro">
                    <li>
                      <label>First Name:</label>
                      jhon </li>
                      <li>
                      <label>Last Name:</label>
                      Lee </li>
                    <li>
                      <label>Nick:</label>
                      jhon </li>
                    <li>
                      <label>Email:</label>
                      jquest@gmail.com</li>
                    <li>
                      <label>Username:</label>
                      jquest</li>
                      <li>
                      <label>Country:</label>
                      Uinited States</li>
                    <li>
                      <label>Birthday</label>
                      September 10</li>
                        <li>
                      <label>Interest</label>
                      Web Design and Developments</li>
                        <li>
                      <label>URL</label>
                      www.yoururl.com</li>
                    <li>
                      <label>Phone:</label>
                      +632642969</li>
                  </ul>

                   <h4>Activities</h4>

                   <ul class="media-list">
              <li class="media">
                <a href="#" class="pull-left">
                  <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABWUlEQVR4nO2VMY7CMBBFuf9RfAMfwL17t67nCkM1aHBIASF5QvziSbtLGD0/T7Q3M/N/5kYL0CgALUCjALQAjQLQAjQKQAvQKAAtQKMAtACNAtACNApAC9AoAC1AowC0AI0C0AI0CkAL0HwlQCnlQe998/kYY/ezK2eeEqDW6q01NzNvrXkpxeecm2fekT1j5ikB5pxeSvExxu4zvfeNbHwvDtl7fxzy05lIgFjDkFnF82FW2bhZM3uKcWTm5QHi5kJiXddY5ZBeZfN7/q2ZyAbEDeXfX631KhuHy38/OvPSAOv7mmXzCmdi1eO78Vzc8JGZlwfIK5lvdC9Uvq1aq9daNz8fmYkEMHt+l9d/V69kY5XXW86HeXcmGuCXUQBagEYBaAEaBaAFaBSAFqBRAFqARgFoARoFoAVoFIAWoFEAWoBGAWgBGgWgBWgUgBagUQBagEYBaAGaO387LYipKEKVAAAAAElFTkSuQmCC">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Media heading</h4>
                  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                  <!-- Nested media object -->
                  <div class="media">
                    <a href="#" class="pull-left">
                      <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABWUlEQVR4nO2VMY7CMBBFuf9RfAMfwL17t67nCkM1aHBIASF5QvziSbtLGD0/T7Q3M/N/5kYL0CgALUCjALQAjQLQAjQKQAvQKAAtQKMAtACNAtACNApAC9AoAC1AowC0AI0C0AI0CkAL0HwlQCnlQe998/kYY/ezK2eeEqDW6q01NzNvrXkpxeecm2fekT1j5ikB5pxeSvExxu4zvfeNbHwvDtl7fxzy05lIgFjDkFnF82FW2bhZM3uKcWTm5QHi5kJiXddY5ZBeZfN7/q2ZyAbEDeXfX631KhuHy38/OvPSAOv7mmXzCmdi1eO78Vzc8JGZlwfIK5lvdC9Uvq1aq9daNz8fmYkEMHt+l9d/V69kY5XXW86HeXcmGuCXUQBagEYBaAEaBaAFaBSAFqBRAFqARgFoARoFoAVoFIAWoFEAWoBGAWgBGgWgBWgUgBagUQBagEYBaAGaO387LYipKEKVAAAAAElFTkSuQmCC">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Nested media heading</h4>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                      <!-- Nested media object -->
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABWUlEQVR4nO2VMY7CMBBFuf9RfAMfwL17t67nCkM1aHBIASF5QvziSbtLGD0/T7Q3M/N/5kYL0CgALUCjALQAjQLQAjQKQAvQKAAtQKMAtACNAtACNApAC9AoAC1AowC0AI0C0AI0CkAL0HwlQCnlQe998/kYY/ezK2eeEqDW6q01NzNvrXkpxeecm2fekT1j5ikB5pxeSvExxu4zvfeNbHwvDtl7fxzy05lIgFjDkFnF82FW2bhZM3uKcWTm5QHi5kJiXddY5ZBeZfN7/q2ZyAbEDeXfX631KhuHy38/OvPSAOv7mmXzCmdi1eO78Vzc8JGZlwfIK5lvdC9Uvq1aq9daNz8fmYkEMHt+l9d/V69kY5XXW86HeXcmGuCXUQBagEYBaAEaBaAFaBSAFqBRAFqARgFoARoFoAVoFIAWoFEAWoBGAWgBGgWgBWgUgBagUQBagEYBaAGaO387LYipKEKVAAAAAElFTkSuQmCC">
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading">Nested media heading</h4>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Nested media object -->
                  <div class="media">
                    <a href="#" class="pull-left">
                      <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABWUlEQVR4nO2VMY7CMBBFuf9RfAMfwL17t67nCkM1aHBIASF5QvziSbtLGD0/T7Q3M/N/5kYL0CgALUCjALQAjQLQAjQKQAvQKAAtQKMAtACNAtACNApAC9AoAC1AowC0AI0C0AI0CkAL0HwlQCnlQe998/kYY/ezK2eeEqDW6q01NzNvrXkpxeecm2fekT1j5ikB5pxeSvExxu4zvfeNbHwvDtl7fxzy05lIgFjDkFnF82FW2bhZM3uKcWTm5QHi5kJiXddY5ZBeZfN7/q2ZyAbEDeXfX631KhuHy38/OvPSAOv7mmXzCmdi1eO78Vzc8JGZlwfIK5lvdC9Uvq1aq9daNz8fmYkEMHt+l9d/V69kY5XXW86HeXcmGuCXUQBagEYBaAEaBaAFaBSAFqBRAFqARgFoARoFoAVoFIAWoFEAWoBGAWgBGgWgBWgUgBagUQBagEYBaAGaO387LYipKEKVAAAAAElFTkSuQmCC">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Nested media heading</h4>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <a href="#" class="pull-right">
                  <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABWUlEQVR4nO2VMY7CMBBFuf9RfAMfwL17t67nCkM1aHBIASF5QvziSbtLGD0/T7Q3M/N/5kYL0CgALUCjALQAjQLQAjQKQAvQKAAtQKMAtACNAtACNApAC9AoAC1AowC0AI0C0AI0CkAL0HwlQCnlQe998/kYY/ezK2eeEqDW6q01NzNvrXkpxeecm2fekT1j5ikB5pxeSvExxu4zvfeNbHwvDtl7fxzy05lIgFjDkFnF82FW2bhZM3uKcWTm5QHi5kJiXddY5ZBeZfN7/q2ZyAbEDeXfX631KhuHy38/OvPSAOv7mmXzCmdi1eO78Vzc8JGZlwfIK5lvdC9Uvq1aq9daNz8fmYkEMHt+l9d/V69kY5XXW86HeXcmGuCXUQBagEYBaAEaBaAFaBSAFqBRAFqARgFoARoFoAVoFIAWoFEAWoBGAWgBGgWgBWgUgBagUQBagEYBaAGaO387LYipKEKVAAAAAElFTkSuQmCC">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Media heading</h4>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
              </li>
            </ul>
              </div>
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
