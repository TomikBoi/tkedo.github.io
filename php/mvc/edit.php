<?php 
require_once "./models/UserModel.php"; //savienot failus 

$name = '';
$password = '';
$id = '';

if(isset($_POST["submit"])){ //vai pieprasijums atnaca no submit pogas
	

	// $db = new DB();

	// $db->openConnection();

	$name = $_POST["name"]; //piesaista mainigajiem to kas ievadits laukos
  $password = $_POST["password"];
  $id = $_POST["id"];

  $data = [
    "name"=> $_POST["name"],
    "password"=> $_POST["password"],
    "id" => $_POST["id"],
  ];

  UserModel::updateUser($data);
	// DB::run("UPDATE users SET name='$name', password='$password' WHERE id=$id");

	// $db->closeConnection();

	header("Location: /tkedo.github.io/php/mvc");

}

if(isset($_GET["id"])){ //nolasam id no datubaze
  // $id = $_GET["id"];
  // $db = new DB();
	// $db->openConnection();


  $result = UserModel::getUserById($_GET["id"]);
  // $result = DB::run("SELECT * FROM users WHERE id=$id"); //visus datus par konkreto lietotaja id

  // $db->closeConnection();
  
  while($row = mysqli_fetch_assoc($result)) { //atsuta rezultatu, kuru ieliek mainigajos
    $name = $row["name"];
    $password = $row["password"];
    $id = $row["id"];
  }
}

require_once "./views/users-form.php";
?>

