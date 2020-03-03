<?php 
  
  session_start();

  if($_SESSION['user_id']) { //ja lietotajs pierakstijis, vinjam nevers login formu
    header("Location: /tkedo.github.io/php/mvc");
  }

  if(isset($_POST["submit"])){
    require_once ".\helpers\db-wrapper.php";
    require_once "./entity/user.php";
    $name = $_POST["name"]; //piestaista mainigajam, lai varetu ielikt kverija
    $response = DB::run("SELECT * FROM users WHERE name='$name'");
    // $password; //sakuma parole ir tuksha, to pievieno velak

    if(!$response->num_rows) { //ja neeksiste user, tad tiek izdrukats pazinojums un ievades lauki
      echo "User doesn't exist";
    } else {
      while($row = mysqli_fetch_assoc($response)) { //pieprasa paroli no  DB
        $user = new User($row);
        // $password = $row["password"];
        // $user_id = $row["id"];
        }
        
        // $saltedPassword = $_POST["password"] . $user::SALT;
    
        $validPassword = password_verify($_POST["password"] . $user::SALT, $user->getPassword()); //pirmais, ko ieraksta user, otrais, ko atsuta pati db
    
        if($validPassword) {
          $_SESSION['user_id'] = $user->getId();
          $_SESSION['user_name'] = $_POST["name"];
          header("Location: /tkedo.github.io/php/mvc");
        } else {
          echo "Invalid password";
        }
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
    <form action="../mvc/login.php" method="POST">

      <div class="form-group">
        <label>
						Name
					<input class="form-control" name="name"> 
        </label>
      </div>
      <div class="form-group">
        <label>
						Password
					<input class="form-control" name="password">
        </label>
      </div>
      <button class="btn btn-primary" tyoe="submit" name="submit">Login (PHP)</button>
    </form>
  </div>
</body>

</html>