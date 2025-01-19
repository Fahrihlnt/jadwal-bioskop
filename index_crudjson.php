<?php
$getfile = file_get_contents('people.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="author" content="ilmu-detil.blogspot.com">
 <title>fahri halianto</title>
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/ilmudetil.css">
  <style>
    .btn-default {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  display: inline-block;
  transition: background-color 0.3s ease;
}

.btn-default:hover {
  background-color: #0056b3;
}

.icon-plus {
  font-size: 16px;
  margin-right: 5px;
}
  </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
 <div class="container">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="index.html">
   SMKN 17 JAKARTA</a>
  </div>
  <a class="btn btn btn-default" href="admin.php"><i class = "icon-plus"></i>admin</a>
  <div class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-left">
    <li class="clr1 active"><a href="index.html">Home</a></li>
    <li class="clr2"><a href="">Bootstrap</a></li>
    <li class="clr3"><a href="">AngularJS</a></li>
   </ul>
  </div>
 </div> 
</nav>
</br></br></br></br>
<div class="container">
 <div class="jumbotron">
  <h3>Fahri Halianto</h3>      
  <p>Tugas, Jadwal Bioskop<h5>X RPL 2</h5></p>      
 </div>
</div>
<div class="container">
 <div class="btn-toolbar">
  <div class="btn-group"> </div>
 </div>
</div>
<br>
<br>
<div class="container">
 <div class ="row">
  <div class="col-md-9">
   <table class="table table-striped table-bordered table-hover">
    <tr>
     <th>no</th>
     <th>hari</th>
     <th>jam</th>
     <th>film</th>
     <th>Genre</th>
     <th>harga</th>
    </tr>  
    <?php $no=0;foreach ($jsonfile->records as $index => $obj): $no++;  ?>
    <tr>
     <td><?php echo $no; ?></td>
     <td><?php echo $obj->hari; ?></td>
     <td><?php echo $obj->jam; ?></td>
     <td><?php echo $obj->film; ?></td>
     <td><?php echo $obj->genre; ?></td>
     <td><?php echo $obj->harga; ?></td>
     <td>
     <a class="btn btn-xs btn-primary" href="tiket.php?id=<?php echo $index; ?>&film=<?php echo $obj->film; ?>&jam=<?php echo $obj->jam; ?>&harga=<?php echo $obj->harga; ?>">pesan</a>
     </td>
    </tr>
    <?php endforeach; ?>
   </table>
  </div> 
 </div>
</div>
</body>
</html>