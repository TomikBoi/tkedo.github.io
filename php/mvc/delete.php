<?php 


if(isset($_GET["id"])) { //ja ir sanemts id, lai pa tuksho neteret resursus
  require_once "./helpers/db-wrapper.php"; //savienot failus 

  $id = $_GET["id"]; //piesaista id pie mainiga

	// $db = new DB();

	// $db->openConnection();

  $result = DB::run("DELETE FROM users WHERE id=$id");

	// $db->closeConnection();

}

header("Location: /tkedo.github.io/php/mvc");

?>