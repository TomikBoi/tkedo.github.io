<?php 


if(isset($_GET["id"])) { //ja ir sanemts id, lai pa tuksho neteret resursus
  require_once "./models/UserModel.php"; //savienot failus 

  $id = $_GET["id"]; //piesaista id pie mainiga

	// $db = new DB();

	// $db->openConnection();
  UserModel::deleteDescription($_GET["id"]);
  // $result = DB::run("DELETE FROM users WHERE id=$id");

	// $db->closeConnection();

}

header("Location: /tkedo.github.io/final_project/");

?>