<?php


if(isset($_POST["submit"])){ //vai pieprasijums atnaca no submit pogas
	require_once "./models/UserModel.php"; //savienot failus 

	// $db = new DB();

	// $db->openConnection();

	// $name = $_POST["name"]; //piesaista mainigajiem to kas ievadits laukos
	// $password = $_POST["password"];

  $data = [
    "name" => $_POST["name"],
    "password" => $_POST["password"]  
  ];
	// DB::run("INSERT INTO users (name, password) VALUES ('$name', '$password')");

	// $db->closeConnection();
  UserModel::addUser($data);


	header("Location: /tkedo.github.io/php/mvc");

  
}

require_once "./views/users-add-form.php";
?>



