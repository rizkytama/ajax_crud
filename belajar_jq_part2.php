<!DOCTYPE html>
<html>
<head>
	<title>form jquery</title>
	<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
</head>
<body>
<form id="formnya">
	<label>
	angka ke 1
		<input type="text" id="input1">
	</label>
	<label>+</label>
	<label>
	angka ke 2
		<input type="text" id="input2">
	</label>
	<input type="submit" id="input3">
</form>

<h1>Hasilnya adalah <u id="hasil"></u></h1>
<script type="text/javascript" charset="utf-8" async defer>
	$(document).ready(function(){
$('form').submit(function(event){
var angka1= parseInt($('#input1').val());
var angka2= parseInt($('#input2').val());
var hasilnya= angka1 + angka2;

$('#hasil').text(hasilnya);

 event.preventDefault();
});
	});


</script>
</body>
</html>