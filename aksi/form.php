<?php 
include_once('db.php'); 
?>
<form class="form-horizontal" id='form_insert'>

<div class="modal fade" tabindex="-1" role="dialog" id="insertmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Data Santri</h4>
      </div>
      <div class="modal-body">


  <div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="s_nama" placeholder="Nama Santri">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="alamat">Alamat:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="alamat" name="s_alamat" placeholder="Alamat Santri">
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="pondok">Pondok:</label>
    <div class="col-sm-10"> 

<select name="s_pondok" id="pondok" class="form-control">
  <option value="" >Pilih Pondok</option>
  <?php
$qsantri=$conn->query("SELECT * FROM pondok");
while($row_s=$qsantri->fetch(PDO::FETCH_ASSOC)) {
  echo "<option value='".$row_s['idpondok']."'>".$row_s['nama_pondok']."</option>";
}
  ?>
</select>
    </div>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="tombol_simpan" class="btn btn-primary">Save changes</button>
    
      <div id="wait" style="display:none;position:absolute;top:50%;left:50%;padding:2px;"><img src='assets/26.gif' width="64" height="64" /></div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  </form>

