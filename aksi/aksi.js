
	
	$(document).ready(function() {

    $('#example').DataTable();

//////untuk auto refresh//
// setInterval(function(){
//     show();
// },1000);

    $('#form_insert').submit(function(event) {
      	event.preventDefault(); 
      	$.ajax({
    		method:"POST",
    		url:"aksi/aksi.php?tipe_aksi=simpan",
    		data:$(this).serialize(),
    		beforeSend:function(){
			 $("#wait").css("display", "block");
			},
    		success:function(data){
    			if(data == '0'){
    			$("#wait").css("display", "none");
    			sweetAlert("Gagal...", "Data Gagal Disimpan", "error");
    		}else{
    			$("#wait").css("display", "none");
				$('#nama').val('');
		    	$('#alamat').val('');
    			$('#pondok').val('');
          $('#insertmodal').modal('hide');
    			$('#isitabel').prepend(data);
    			sweetAlert("Berhasil...", "Data Berhasil Disimpan", "success");
    		}
    		}
    	});
    	 	
    });

$(document).on('click','.deletenya',function(event){
var iddel=$(this).attr('del-idnya');
$.ajax({
	method:"POST",
	url:"aksi/aksi.php",
	data:{iddel:iddel,tipe_aksi:"hapus"},
  beforeSend:function(){                                                                 
  	$("#tr_"+iddel).fadeTo(1000,0.5);                                 
  },                                                                        
  success:function(data){
    if(data == '1'){
        $("#tr_"+iddel).fadeOut();  
    }else{   
      sweetAlert("Gagal...","Data Gagal Dihapus","error");
    }
  }
});
});

$(document).on('click','.editnya',function(event){
  event.preventDefault(); 
  var idedit=$(this).attr('edit-idnya');
  $.ajax({
    method:"POST",
    url:"aksi/aksi.php",
    data:{idedit:idedit,tipe_aksi:"tampil_edit"},
    beforeSend:function(){

    },
    success:function(data){
      if(data==''){
        sweetAlert("Gagal...","Data Gagal Dihapus","error");
      }else{
        console.log(data);
        $('#tedit').prepend(data);
        $('#editmodal').modal('show');
      }
    }
  });
});



//$('#form_edit').submit(function(event) {
// var idedit=('#ided');
//    event.preventDefault(); 
//      $.ajax({
//      method:"POST",
//      url:"aksi/aksi.php?tipe_aksi=edit",
//      data:$(this).serialize(),
//      beforeSend:function(){
//     $("#wait").css("display", "block");
//    },
//      success:function(data){
//        if(data == '0'){
//        $("#wait").css("display", "none");
//        sweetAlert("Gagal...", "Data Gagal Disimpan", "error");
//      }else{
//        $("#wait").css("display", "none");
//        $('#nama').val('');
//        $('#alamat').val('');
//        $('#pondok').val('');
//        $('#insertmodal').modal('hide');
//         $("#tr_"+idedit).fadeOut(); 
//        $('#isitabel').prepend(data);
//        sweetAlert("Berhasil...", "Data Berhasil Disimpan", "success");
//      }
//      }
//    });
//      
//  });


});

