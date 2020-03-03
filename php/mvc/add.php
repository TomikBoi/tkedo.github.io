<?php


if(isset($_POST["submit"])){ //vai pieprasijums atnaca no submit pogas
	require_once "./helpers/db-wrapper.php"; //savienot failus 

	// $db = new DB();

	// $db->openConnection();

	$name = $_POST["name"]; //piesaista mainigajiem to kas ievadits laukos
	$password = $_POST["password"];


	DB::run("INSERT INTO users (name, password) VALUES ('$name', '$password')");

	// $db->closeConnection();

	header("Location: /tkedo.github.io/php/mvc");

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
    <form action="/tkedo.github.io/php/mvc/add.php" method="POST">

      <div class="form-group">
        <label>
						Name
					<input class="form-control" name="name">
        </label>
      </div>
      <div class="form-group">
        <label>
						Password
					<input class="form-control" name="password" type="password">
        </label>
      </div>

      <button class="btn btn-primary" tyoe="submit" name="submit">Save (PHP)</button>
      <button class="btn btn-primary js-save-data">Save (jQuery)</button>
    </form>
  </div>
</body>

</html>