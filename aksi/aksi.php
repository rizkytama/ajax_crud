<?php 
include_once('db.php');

if(!empty($_GET)){

	if($_GET['tipe_aksi']=='simpan'){
	$n=$_POST['s_nama'];
	$a=$_POST['s_alamat'];
	$p=$_POST['s_pondok'];
	$qnya=$conn->prepare("INSERT INTO santri value('',?,?,?)");

		if($qnya->execute(array($n,$a,$p))){
			$last_id=$conn->lastInsertId();
		$query=$conn->query("SELECT * FROM santri,pondok where santri.pondok_idpondok=pondok.idpondok and id='$last_id'");
		$row=$query->fetch(PDO::FETCH_ASSOC);
			?>

		<tr class="trnya" id="tr_<?= $row['id'];?>" >
			<td><?= htmlentities($row['nama']); ?></td>
			<td><?= htmlentities($row['alamat']); ?></td>
			<td><?= htmlentities($row['nama_pondok']); ?></td>
			<td>
				<button class ="btn btn-primary editnya"  edit-idnya="<?= $row['id']; ?>">edit</button>
				<button class ="btn btn-danger deletenya"  del-idnya="<?= $row['id']; ?>">delete</button>
			</td>
		</tr>


		<?php 
		}else{
			echo'0';
		}
	}else if($_GET['tipe_aksi']=='edit'){
	$n=$_POST['e_nama'];
	$a=$_POST['e_alamat'];
	$p=$_POST['e_pondok'];
	$i=$_POST['e_id'];
	$qedit=$conn->prepare("UPDATE santri SET nama=?,alamat=?,pondok_idpondok=? where id=?");
		if($qedit->execute(array($n,$a,$p,$i))){
			$qhedit=$conn->query("SELECT * FROM santri,pondok where santri.pondok_idpondok=pondok.idpondok and id='$i'");
			$row=$qhedit->fetch(PDO::FETCH_ASSOC);
			?>
		<tr class="trnya" id="tr_<?= $row['id'];?>" >
			<td><?= htmlentities($row['nama']); ?></td>
			<td><?= htmlentities($row['alamat']); ?></td>
			<td><?= htmlentities($row['nama_pondok']); ?></td>
			<td>
				<button class ="btn btn-primary editnya"  edit-idnya="<?= $row['id']; ?>">edit</button>
				<button class ="btn btn-danger deletenya"  del-idnya="<?= $row['id']; ?>">delete</button>

			</td>
		</tr>
			<?php
		}else{
		echo '0';	
		}
	}else{
		echo '0';
	}
}else if(!empty($_POST)){
	if($_POST['tipe_aksi']=='hapus'){
	 $iddel=$_POST['iddel'];
	 $qdel=$conn->prepare("DELETE FROM santri where id= ?");
	 	if($qdel->execute(array($iddel))){
	 		echo'1';
	 	}else{
	 		echo'0';
	 	}
	}else if($_POST['tipe_aksi']=='tampil_edit'){
		$tidedit=$_POST['idedit'];
		$tqedit=$conn->query("SELECT * FROM santri,pondok WHERE pondok_idpondok=idpondok and id='$tidedit'");
		$rowedit=$tqedit->fetch(PDO::FETCH_OBJ);

?>

<form class="form-horizontal" id='form_edit'>

<div class="modal fade" tabindex="-1" role="dialog" id="editmodal">
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
      <input type="text" class="form-control" id="nama" name="e_nama" placeholder="Nama Santri" value="<?=$rowedit->nama?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="alamat">Alamat:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="alamat" name="e_alamat" placeholder="Alamat Santri" value="<?=$rowedit->alamat?>">
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="pondok">Pondok:</label>
    <div class="col-sm-10"> 

<select name="e_pondok" id="pondok" class="form-control">
  <option value="" >Pilih Pondok</option>
	<option value="<?=$rowedit->pondok_idpondok?>" selected ><?=$rowedit->nama_pondok ?></option>
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
      <input type="hidden" name="e_id" id="ided" value="<?=$rowedit->id;?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="tombol_edit" class="btn btn-primary">Save changes</button>
    
      <div id="wait" style="display:none;position:absolute;top:50%;left:50%;padding:2px;"><img src='assets/26.gif' width="64" height="64" /></div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  </form>

<script type="text/javascript" charset="utf-8" async defer>
	$('#form_edit').submit(function(event) {
 var idedit=$('#ided').val();
    event.preventDefault(); 
      $.ajax({
      method:"POST",
      url:"aksi/aksi.php?tipe_aksi=edit",
      data:$(this).serialize(),
      beforeSend:function(){
     $("#wait").css("display", "block");
    },
      success:function(data){
        if(data == '0'){
        $("#wait").css("display", "none");
        sweetAlert("Gagal...", "Data Gagal Diupdate", "error");
      }else{
        $("#wait").css("display", "none");
        $("#tr_"+idedit).fadeOut(100); 
        $('#nama').val('');
        $('#alamat').val('');
        $('#pondok').val('');
        $('#editmodal').modal('hide');
        $('#isitabel').prepend(data);
        sweetAlert("Berhasil...", "Data Berhasil Diupdate"+idedit, "success");
      }
      }
    });    
  });

</script>
<?php
	}else{
		echo'0';
	}
}else{
	echo '0';
}
 ?>
