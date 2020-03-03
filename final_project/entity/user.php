<?php 

class User {
  private $description;
  // private $password;
  private $id;
  // const SALT = "qwerty"; //zem mainiga slepsies rakst lielums, kuru pievienos parolem

  public function __construct($data){
    $this->description = $data["description"];
    // $this->password = $data["password"];
    $this->id = $data["id"];
}

public function setDescription($newDescription){
  $this->description = $newDescription;
}

public function getDescription(){
  return $this->description;
}

// //hesho paroli te, panjem teikstu, uztaisa nesalasama teksta
// public function setPassword($newPassword){
//   $this->password = $newPassword;
// }
// //atsevishka funkcija, lai heshot
// public static function hashPassword($password){
//   $saltedPassword = $password . self::SALT;
//   return  password_hash($saltedPassword, PASSWORD_DEFAULT);
// }

// public function getPassword(){
//   return $this->password;
// }

public function getId(){
  return $this->id;
}

}
