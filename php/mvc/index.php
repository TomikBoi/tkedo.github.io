<?php
  require_once "./models/UserModel.php"; //savienot failus 
  
  // $userModel = new UserModel();

	// $db = new DB();//atver db

	// $db->openConnection();//savienojas ar db

  // $result =	$db->run("SELECT * FROM users LIMIT 25"); ielikts IserModel

  // $db->closeConnection(); garaks pieraksts, katru funkciju vero atsevishki
  
  $result =	UserModel::getAllUsers();

  require_once "./views/users-list.php"; //viss html @ views
?>




