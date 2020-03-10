<?php
//tikai caur sho failu notiek manipulaciajs ar datiem
require_once ".\helpers\db-wrapper.php";

class UserModel
{

  public static function getAllDescription($limit = 25)
  {
    return DB::run("SELECT description, id FROM todo LIMIT " . $limit);
  }

  public static function addDescription(User $data)
  {
    $description = $data->getDescription();
    return DB::run("INSERT INTO todo (description) VALUES ('$description')");
  }

  public static function getDescriptionById($id)
  {
    return DB::run("SELECT * FROM todo WHERE id=$id");
  }

  public static  function updateDescription($data)
  {
    $description = $data["description"];
    $id = $data["id"];
    DB::run("UPDATE todo SET description='$description' WHERE id=$id");
  }

  public static function deleteDescription($id)
  {
    DB::run("DELETE FROM todo WHERE id=$id");
  }
}
