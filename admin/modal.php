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
          		<input type="text" name="province_name" class="form-control" placeholder="No KK .." required>
          	</div>
          	<div class="form-group">
          		<label>Status</label>
          		<input type="text" name="status" class="form-control" placeholder="Nama Lengkap .." required>
          	</div>
          	<div class="form-group">
          		<label>Created User</label>
          		<input type="text" name="created_userid" class="form-control" value="<?=$_SESSION['user_id']?>" >
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
