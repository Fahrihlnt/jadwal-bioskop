<?php 
    if ( !empty($_POST)) { 
    
        $fname  = $_POST['hari'];
        $lname  = $_POST['jam'];
        $age    = $_POST['film'];
        $gender = $_POST['genre'];
        $gender = $_POST['harga'];
      
  $file = file_get_contents('people.json');
  $data = json_decode($file, true);
  unset($_POST["add"]);
  $data["records"] = array_values($data["records"]);
  array_push($data["records"], $_POST);
  file_put_contents("people.json", json_encode($data));
  header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="tutorial-boostrap-merubaha-warna">
 <meta name="author" content="ilmu-detil.blogspot.com">
 <title>Tugas Rpl</title>
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <style type="text/css">
 .navbar-default {
  background-color: #3b5998;
  font-size:18px;
  color:#ffffff;
 }
 </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <h4>Tambahkan Film</h4>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    </div>
  </div>
</nav>
<!-- /.navbar -->
<div class="container">
        <div class="row">
  <div class="col-sm-5 col-sm-offset-3"><h3></h3>
        <form method="POST" action="">
   <div class="form-group">
    <label for="inputhari">hari</label>
    <select type="text" class="form-control" required="required" id="inputhari" name="hari" placeholder="hari">
  <option>Please Select</option>
  <option value="Senin">Senin</option>
  <option value="Selasa">Selasa</option>
  <option value="Rabu">Rabu</option>
  <option value="Kamis">Kamis</option>
  <option value="Jumat">Jumat</option>
  <option value="Sabtu">Sabtu</option>
  <option value="Minggu">Minggu</option>
</select>
    <span class="help-block"></span>
   </div>
   

   <div class="form-group ">
    <label for="inputjam">jam</label>
    <input type="time" class="form-control" required="required" id="jam" name="jam" placeholder="jam">
          <span class="help-block"></span>
   </div>

   <div class="form-group">
    <label for="inputfilm">film</label>
    <input type="text" required="required" class="form-control" id="inputfilm" name="film" placeholder="film">
    <span class="help-block"></span>
   </div>

    <div class="form-group">
     <label for="inputGenre">Genre</label>
     <input class="form-control" required="required" id="inputGenre" name="genre" >
     <span class="help-block"></span>
          </div>

          <div class="form-group">
    <label for="inputharga">harga</label>
    <input type="text" required="required" class="form-control" id="inputharga" name="harga" placeholder="harga">
    <span class="help-block"></span>
   </div>
    
   <div class="form-actions">
     <button type="submit" class="btn btn-success">Create</button>
     <a class="btn btn btn-default" href="index_crudjson.php">Back</a>
   </div>
  </form>
        </div></div>        
</div>
</body>
</html>