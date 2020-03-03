<?php 

//define klassi, nosaukums pret kuru veiks atsauci

class DB {
  //define mainigo, kas satures sasaisti ar datubazi
  private static $connection;
  //private, ja ir private vai protected, tad var izmantot tikai konkreta faila
  //protected
  //public, var izmantot citos failos
   public function openConnection($dbname = NULL)
  {
    //izveido mainigos, ar atsaucem pret datubazi
    $dbhost = "mysql-server-80";
    $dbuser = "root";
    $dbpass = "root_password";
    $dbname = "web-bootcamp-db";
    //this veido atsauci uz konkretu klassi
    static::$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    //parbauda vai ir connects ar serveri
    if (static::$connection->connect_error) {
      die("Connection failed: " . static::$connection->connect_error);
    }  else {
      // echo "Connection successful" . "<br/>";
    }
  }

  public function closeConnection()
  {
    static::$connection->close();
  }

  public static function run($sql) { 
    $response = static::$connection->query($sql);

    if($response) {
      return $response; //ja atgriez datus, tad strada ar tiem
    } else {
      die("SQL error: " . static::$connection->error . "</br>"); //sql atgriezh kljudu
    }
  }
  
}

?>