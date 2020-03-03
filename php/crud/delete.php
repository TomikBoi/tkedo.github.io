<?php
require_once "./db-wrapper.php"; //savienot failus 

$id = isset($_GET["id"]) ? $_GET["id"] : '';

if($id) {
  $db = new DB();
  $db->openConnection();
  
  $db->run("DELETE FROM users WHERE id=$id");

  $db->closeConnection();
}

  header("Location: /tkedo.github.io/php/crud/")

?>