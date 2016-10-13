	$(document).ready(function() {

  $(".button-collapse").sideNav();
   $('select').material_select();
 $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      starting_top: '4%', // Starting top style attribute
      ending_top: '10%', // Ending top style attribute
      //ready: function() { alert('Ready'); },  Callback for Modal open
      //complete: function() { alert('Closed'); }  Callback for Modal close
    }
  );

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
          $('#insertmodal').closeModal();
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
        $('#editmodal').openModal();
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

