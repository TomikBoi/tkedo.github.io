<?php 
//tikai caur sho failu notiek manipulaciajs ar datiem
require_once ".\helpers\db-wrapper.php";

class UserModel {

  public static function getAllDescription($limit = 25) 
  {
    return DB::run("SELECT description FROM todo LIMIT " . $limit); 
  }

  public static function addDescription(User $data)
    {
        $description= $data->getDescription();
        // $password= User::hashPassword($data->getPassword());
        return DB::run("INSERT INTO todo (description) VALUES ('$description')");
    }

  // public static function getUserById($id) 
  // {
  //   return DB::run("SELECT * FROM users WHERE id=$id");
  // }

  // public static  function updateUser($data) 
  // {
  //   $name = $data["name"];
  //   $password = $data["password"];
  //   $id = $data["id"];
  //   DB::run("UPDATE users SET name='$name', password='$password' WHERE id=$id");
  // }

  // public static function deleteUserById($id) 
  // {
  // DB::run("DELETE FROM users WHERE id=$id");
  // }
}
?>