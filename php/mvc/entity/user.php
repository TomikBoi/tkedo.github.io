<?php 

class User {
    private $name;
    private $password;
    private $id;

    const SALT = "qwerty"; //zem mainiga slepsies rakst lielums, kuru pievienos parolem

  public function __construct($data){
    $this->name = $data["name"];
    $this->password = $this->hashPassword($data["password"]);
    $this->id = $data["id"];
}

public function setName($newName){
  $this->name = $newName;
}

public function getName(){
  return $this->name;
}

//hesho paroli te, panjem teikstu, uztaisa nesalasama teksta
public function setPassword($newPassword){
  $this->password = $this->hashPassword($newPassword);
}
//atsevishka funkcija, lai heshot
private function hashPassword($password){
  $saltedPassword = $password . self::SALT;
  return  password_hash($saltedPassword, PASSWORD_DEFAULT);
}

public function getPassword(){
  return $this->password;
}

public function getId(){
  return $this->id;
}

}

?>