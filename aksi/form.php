<?php 
include_once('db.php'); 
?>


<form class="form-horizontal" id='form_insert'>

<div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="insertmodal">
    <div class="modal-content">
<center><h1>Tambah Data</h1></center>

 <div class="input-field col s6">
    <label for="nama">Nama:</label>
      <input type="text" class="validate" id="nama" name="s_nama" required>
    </div>

<div class="input-field col s6">
    <label for="alamat">Alamat:</label>
      <input type="text" class="validate" id="alamat" name="s_alamat" required>
    </div>


<select name="s_pondok" id="pondok" required>
  <option value="" disabled selected>Pilih Pondok</option>
    <?php
  $qsantri=$conn->query("SELECT * FROM pondok");
  while($row_s=$qsantri->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row_s['idpondok']."'>".$row_s['nama_pondok']."</option>";
  }
    ?>
</select>

      </div>
  
      <div class="modal-footer">
        <button type="submit" id="tombol_simpan" class="btn btn-primary">Save changes</button>
      <div id="wait" style="display:none;position:absolute;top:50%;left:50%;padding:2px;"><img src='assets/26.gif' width="64" height="64" /></div>
      </div>
</div><!-- /.modal -->
  </form>

