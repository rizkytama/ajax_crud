<?php 
include_once('aksi/db.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Ajax CRUD Full V1</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<!-- sweetalert --> 
<link rel="stylesheet" type="text/css" href="assets/sweetalert-master/dist/sweetalert.css">
</head>
<body>
<!--navbar-->
  <div class="navbar-fixed">
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img class="responsive-img "  src="assets/img/ttl-clickcoodstudio.png" alt="clickcoodstudio" width="57"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="https://github.com/rizkytama/ajax_crud">Source</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
      	<li><a class="subheader"><h1><u><b>Menu</b></u></h1></a></li>
      	<li><a class="subheader"></a></li>
        <li><a href="https://github.com/rizkytama/ajax_crud" class="waves-effect">Source</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  </div>

 <div >
    <div class="section">
		<center>
		<a class="modal-trigger waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Tambah Data" href="#insertmodal"><i class="material-icons">add</i></a>
		</center>

			<table class="striped centered highlight" >
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
				$query=$conn->query("SELECT * FROM santri,pondok where santri.pondok_idpondok=pondok.idpondok order by id desc");
				$total=$query->rowCount();
				while($row=$query->fetch(PDO::FETCH_OBJ)) { ?>
						<tr class="trnya" id="tr_<?= $row->id; ?>" >
							<td><?= htmlentities($row->nama); ?></td>
							<td><?= htmlentities($row->alamat); ?></td>
							<td><?= htmlentities($row->nama_pondok); ?></td>
							<td>
							<button class ="btn waves-effect waves-light  light-blue darken-1 tooltipped editnya" data-position="bottom" data-delay="50" data-tooltip="Edit" edit-idnya="<?= $row->id; ?>" ><i class="material-icons">edit</i></button>
							<button class ="btn waves-effect waves-light amber darken-4  tooltipped deletenya" data-position="bottom" data-delay="50" data-tooltip="Hapus" del-idnya="<?= $row->id; ?>"><i class="material-icons">delete</i></button>
							</td>
						</tr>
				<?php } ?> 
				</tbody>
			</table>
	</div>
</div>



<div id="tedit"></div>
<div id="tsimpan"><?php  include_once('aksi/form.php'); ?></div>


<footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Cuap-Cuap</h5>
          <p class="grey-text text-lighten-4">tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng tama iseng </p>


        </div>
        <div class="col l3 s12">
          
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="https://www.facebook.com/tama.rizky"> <i class="material-icons">mail</i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="https://www.facebook.com/tama.rizky">Rizky Tama</a>
      </div>
    </div>
  </footer>


<script type ="text/javascript" src="assets/jquery-2.1.4.min.js"></script>
<!-- sweetalert -->
<script src="assets/sweetalert-master/dist/sweetalert.min.js"></script>
<script src="assets/js/materialize.min.js"></script>
<script src="assets/js/init.js"></script>
<script type="text/javascript" src="aksi/aksi.js"></script> 

</body>
</html>



