<?php 
$h='localhost';
$u='root';
$p='';
$db='belajar_mysqli_oop';
//$conn=mysqli_connect($h,$u,$p,$db) or die(mysqli_error());
try{
	$conn=new PDO("mysql:host=$h;dbname=$db",$u,$p);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
}
 ?>
