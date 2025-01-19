<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('people.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('people.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["hari"] = isset($_POST["hari"]) ? $_POST["hari"] : "";
    $post["jam"] = isset($_POST["jam"]) ? $_POST["jam"] : "";
    $post["film"] = isset($_POST["film"]) ? $_POST["film"] : "";
    $post["genre"] = isset($_POST["genre"]) ? $_POST["genre"] : "";
    $post["harga"] = isset($_POST["harga"]) ? $_POST["harga"] : "";

    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("people.json", json_encode($all));
    }
    header("Location:index_crudjson.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="tutorial-boostrap-merubaha-warna">
 <meta name="author" content="ilmu-detil.blogspot.com">
 <title>Tutorial Boostrap </title>
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
      <h4>Detailed Technology Center</h4>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
    </div>
  </div>
</nav>
<!-- /.navbar -->

<div class="container">
    <div class="row">
        <div class="row">
            <h3>Update a User</h3>
        </div>
            
        <?php if (isset($_GET["id"])): ?>
  <form method="POST" action="update.php">
  <div class="col-md-6">
   <input type="hidden" value="<?php echo $id ?>" name="id"/>
   <div class="form-group">
    <label for="inputhari">Hari</label>
    <input type="text" class="form-control" required="required" id="inputhari" value="<?php echo $jsonfile["hari"] ?>" name="hari" placeholder="hari">
    <span class="help-block"></span>
   </div>
   
   <div class="form-group">
    <label for="inputjam">jam</label>
    <input type="number" class="form-control" required="required" id="inputjam" value="<?php echo $jsonfile["jam"] ?>" name="jam" placeholder="jam">
    <span class="help-block"></span>
   </div>
   
   <div class="form-group">
    <label for="inputfilm">film</label>
    <input type="text" required="required" class="form-control" id="inputfilm" value="<?php echo $jsonfile["film"] ?>" 
     name="film" placeholder="film">
    <span class="help-block"></span>
   </div>
   
   <div class="form-group">
    <label for="inputGenre">Genre</label>
    <input class="form-control" required="required" id="inputGenre" name="genre" >
    <span class="help-block"></span>
   </div>

   <div class="form-group">
    <label for="inputharga">harga</label>
    <input type="text" required="required" class="form-control" id="inputharga" value="<?php echo $jsonfile["harga"] ?>" 
     name="harga" placeholder="harga">
    <span class="help-block"></span>
   </div>
    
   <div class="form-actions">
    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn btn-default" href="index_crudjson.php">Back</a>
   </div>
  </div>
  </form>
  <?php endif; ?>     
    </div> 
</div> 
</body>
</html>