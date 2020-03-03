<?php 
require_once "./helpers/db-wrapper.php"; //savienot failus 

if(isset($_POST["submit"])){ //vai pieprasijums atnaca no submit pogas
	

	$db = new DB();

	$db->openConnection();

	$name = $_POST["name"]; //piesaista mainigajiem to kas ievadits laukos
  $password = $_POST["password"];
  $id = $_POST["id"];


	$db->run("UPDATE users SET name='$name', password='$password' WHERE id=$id");

	$db->closeConnection();

	header("Location: /tkedo.github.io/php/mvc");

}

$name = '';
$password = '';
$id = '';

if(isset($_GET["id"])){ //nolasam id no datubaze
  $id = $_GET["id"];
  $db = new DB();
	$db->openConnection();

	$result = $db->run("SELECT * FROM users WHERE id=$id"); //visus datus par konkreto lietotaja id

  $db->closeConnection();
  
  while($row = mysqli_fetch_assoc($result)) { //atsuta rezultatu, kuru ieliek mainigajos
    $name = $row["name"];
    $password = $row["password"];
    $id = $row["id"];
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Project</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body  class="p-3">
  <div class="d-flex justify-content-center">
    <form action="/tkedo.github.io/php/mvc/edit.php" method="POST">

      <div class="form-group">
        <label>
						Name
					<input class="form-control" name="name" value="<?=$name?>"> 
        </label>
      </div>
      <div class="form-group">
        <label>
						Password
					<input class="form-control" name="password" value="<?=$password?>">
        </label>
      </div>
      <input hidden name="id" value="<?=$id?>">
      <button class="btn btn-primary" tyoe="submit" name="submit">Save (PHP)</button>
      <button class="btn btn-primary js-save-data">Save (jQuery)</button>
    </form>
  </div>
</body>

</html>