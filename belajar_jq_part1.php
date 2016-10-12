<!DOCTYPE html>
<html>
<head>
	<title>
	belajarjquery
	</title>
	<script type ="text/javascript" src="jquery-2.1.4.min.js"></script>
</head>
<body>
<p id="p1">/////////////////////////////////even click//////////////////////////////</p>
<h1 id="h1">oke1</h1>
<h1 id="h2">oke2</h1>
<hr>




<p idp="2">/////////////////////////////////even click dan  toggle hide show//////////////////////////////</p>
<h1 id="h3">oke3</h1>
<img src="car-967387_640.png" alt="mobil" id="mobil">

<p>/////////////////////////////////even click dan  toggle hide show effek//////////////////////////////</p>
<hr>
<button id="tombol1">fadein</button>
<button id="tombol2">fadeout</button>
<button id="tombol3">toggle</button>
<button id="tombol4">fade to awal</button>
<button id="tombol5">fade to jadi</button>
<button id="tombol6">chaining</button>
<br>
<img src="car-967387_640.png" alt="mobil1" id="mobil1">



<p id="p3">/////////////////////////////////even mouseenter moouselieve///////////////////////////</p>
<h1 id="h4">oke1</h1>
<p id="p4">contoh even mouseenter moouselieve </p>
<hr>


<p id="p4">///////////////////////////////// this //////////////////////////////</p>
<h1 id="h5">oke1</h1>
<hr>




<script type="text/javascript">
	$(document).ready(function() {
/////////////////////////////////even click//////////////////////////////
		$('#h1').click(function(){
			$('#h1').css('color','red');
		});

		$('#h2').click(function(){
			sweetAlert("Hooreee...", "Menggunakan sweetalert!", "success");
		});

/////////////////////////////////even click dan toggle hide show//////////////////////////////
		
		$('#h3').click(function(){
		$("#mobil").toggle();
		});

/////////////////////////////////even click dan toggle //////////////////////////////


/////////////////////////////////even mouseenter dan mouseleave//////////////////////////////
		$('#p4').hide();
		$('#h4').mouseenter(function(){
			$('#p4').show();
		});
		$('#h4').mouseleave(function(){
			$('#p4').hide();
		});

////////////////////// this ////////////////////////////
	$('#h5').click(function(){
			$(this).css('color','blue');
		});
	

	//////////////////////// efek/////////////////////
	/*
$('#tombol1').click(function(){
	$('#mobil1').fadeOut();
});

$('#tombol2').click(function(){
	$('#mobil1').fadeIn();
});
$('#tombol3').click(function(){
	$('#mobil1').fadeToggle();
});
*/
//////atau///
$('#tombol1').click(function(){
	$('#mobil1').fadeOut(2000);
	//2000 sama dengan 2detik
});

$('#tombol2').click(function(){
	$('#mobil1').fadeIn(2000);
});
$('#tombol3').click(function(){
	$('#mobil1').fadeToggle();
});

$('#tombol4').click(function(){
	$('#mobil1').fadeTo(1000,1);
});
$('#tombol5').click(function(){
	$('#mobil1').fadeTo(1000,0.5);
});

$('#tombol6').click(function(){
	$('#mobil1').slideDown(2000).slideUp(2000).fadeTo(1000,0.5).fadeIn(2000).fadeOut(2000);
});



});
</script>
<script src="assets/sweetalert-master/dist/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="assets/sweetalert-master/dist/sweetalert.css">
</body>
</html>