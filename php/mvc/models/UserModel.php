<?php 
//tikai caur sho failu notiek manipulaciajs ar datiem
require_once ".\helpers\db-wrapper.php";

class UserModel {

  public static function getAllUsers($limit = 25) 
  {
    return DB::run("SELECT name, password, id FROM users LIMIT " . $limit); 
  }

  public static function addUser(User $data)
    {
        $name= $data->getName();
        $password= $data->getPassword();
        return DB::run("INSERT INTO users (name, password) VALUES ('$name', '$password')");
    }

  public static function getUserById($id) 
  {
    return DB::run("SELECT * FROM users WHERE id=$id");
  }

  public static  function updateUser($data) 
  {
    $name = $data["name"];
    $password = $data["password"];
    $id = $data["id"];
    DB::run("UPDATE users SET name='$name', password='$password' WHERE id=$id");
  }

  public static function deleteUserById($id) 
  {
  DB::run("DELETE FROM users WHERE id=$id");
  }
}
?>