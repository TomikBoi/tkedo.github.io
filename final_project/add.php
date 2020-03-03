<?php


if(isset($_POST["submit"])){ //vai pieprasijums atnaca no submit pogas
	require_once "./models/UserModel.php"; //savienot failus 
	require_once "./entity/user.php"; //savienot failus 

	// $user = new User();
	// $user->setName($_POST["name"]);
	// $user->setPassword($_POST["password"]); //tas pats kas zemak

	$description = new User($_POST);
	UserModel::addDescription($description);
	header("Location: /tkedo.github.io/final_project/");

	
	// $db = new DB();

	// $db->openConnection();

	// $name = $_POST["name"]; //piesaista mainigajiem to kas ievadits laukos
	// $password = $_POST["password"];

  // $data = [
  //   "name" => $_POST["name"],
  //   "password" => $_POST["password"]  
  // ];
	// DB::run("INSERT INTO users (name, password) VALUES ('$name', '$password')");

	// $db->closeConnection();
  




  
}
$edit = false;
// require_once "./views/users-form.php";
?>



