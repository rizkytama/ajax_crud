<?php 
include_once('aksi/db.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
<script type ="text/javascript" src="jquery-2.1.4.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="assets/sweetalert-master/dist/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="assets/sweetalert-master/dist/sweetalert.css">
<script type="text/javascript" src="aksi/aksi.js"></script> 
<script type="text/javascript" src="assets/navbar/style.js"></script> 
<link rel="stylesheet" type="text/css" href="assets/navbar/style.css">
</head>
<body>

    <nav id="header" class="navbar navbar-fixed-top fixed-theme">
            <div id="header-container" class="container navbar-container fixed-theme">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand fixed-theme" href="http://bootsnipp-env.elasticbeanstalk.com/iframe/PaVbr#"><img src="car-967387_640.png" alt=""  class="img-responsive"></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="http://bootsnipp-env.elasticbeanstalk.com/iframe/PaVbr#">Home</a></li>
                        <li><a href="http://bootsnipp-env.elasticbeanstalk.com/iframe/PaVbr#about">About</a></li>
                        <li><a href="http://bootsnipp-env.elasticbeanstalk.com/iframe/PaVbr#contact">Contact</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->



<div class="jumbotron">
<center><button type="button" class="btn btn-primary btn-lg " data-toggle="modal" data-target="#insertmodal">
  Tambah Data
</button></center>

     
<table id="example" class="display" cellspacing="0" width="100%">

	<thead >
		<tr>
			<th>nama</th>
			<th>alamat</th>
			<th>pondok</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody id='isitabel'>
	<?php 

 // $id="1400 ' OR 'x'='x";
$query=$conn->query("SELECT * FROM santri,pondok where santri.pondok_idpondok=pondok.idpondok order by id desc");
$total=$query->rowCount();

while($row=$query->fetch(PDO::FETCH_OBJ)) { ?>
		<tr class="trnya" id="tr_<?= $row->id; ?>" >
			<td><?= htmlentities($row->nama); ?></td>
			<td><?= htmlentities($row->alamat); ?></td>
			<td><?= htmlentities($row->nama_pondok); ?></td>
			<td>
				<button class ="btn btn-primary editnya"  edit-idnya="<?= $row->id; ?>">edit</button>
				<button class ="btn btn-danger deletenya"  del-idnya="<?= $row->id; ?>">delete</button>

			</td>
		</tr>
		<?php } ?> 
	</tbody>
</table>
</div>









<div id="tedit"></div>
<div id="tsimpan">
<?php 
 include_once('aksi/form.php');
 ?>
 </div>

</body>
</html>



