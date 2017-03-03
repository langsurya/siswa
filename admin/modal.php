<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
          	<div class="form-group">
          		<label>Nama Provinsi</label>
          		<input type="text" name="province_name" class="form-control" placeholder="Nama Provinsi .." required>
          	</div>
          	<div class="form-group">
          		<label>Status</label><br/>
              <label class="radio-inline">
              <input type="radio" name="status" value="Y">Y
              </label>
              <label class="radio-inline">
                <input type="radio" name="status" value="N">N
              </label>
          	</div>
          	<div class="form-group">
          		<!-- <label>Created User</label> -->
          		<input type="hidden" name="created_userid" class="form-control" value="<?=$_SESSION['user_id']?>" >
          	</div>


          	<div class="modal-footer">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          		<input type="submit" name="btn-save" class="btn btn-primary" value="Simpan">
          	</div>
          </form>
        </div>
      </div>

    </div>
  </div>



  <!-- Modal myKota -->
    <div class="modal fade" id="myKota" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Data Kota</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="">
              <div class="form-group">
                <label>Provinsi</label>
                <select class="form-control col-sm-5" name="province_id">
                  <option value="">Pilih Provinsi</option>
                  <?php
                  include_once '../inc/class.php';
                  $siswa = new ClassSiswa;
                  $query = "SELECT * FROM as_provinces";
                  foreach ($siswa->showData($query) as $value) {
                    ?>
                    <option value="<?=$value['province_id']?>"><?=$value['province_name']?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
            		<label>Kode Kota</label>
            		<input type="text" name="city_code" class="form-control" placeholder="Kode Kota .." required>
            	</div>
            	<div class="form-group">
            		<label>Nama Kota</label>
            		<input type="text" name="city_name" class="form-control" placeholder="Nama Kota .." required>
            	</div>

              <div class="form-group">
            		<label>Status</label><br/>
                <label class="radio-inline">
                <input type="radio" name="status" value="Y">Y
                </label>
                <label class="radio-inline">
                  <input type="radio" name="status" value="N">N
                </label>
            	</div>
            	<div class="form-group">
            		<!-- <label>Created User</label> -->
            		<input type="hidden" name="created_userid" class="form-control" value="<?=$_SESSION['user_id']?>" >
            	</div>


            	<div class="modal-footer">
            		<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            		<input type="submit" name="btn-save" class="btn btn-primary" value="Simpan">
            	</div>
            </form>
          </div>
        </div>

      </div>
    </div>


  <script type="text/javascript">
    $(document).ready(function(){
      $("#tgl").datepicker({dateFormat : 'yy/mm/dd'});
    });
  </script>
