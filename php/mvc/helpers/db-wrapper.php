<?php 

//define klassi, nosaukums pret kuru veiks atsauci

class DB {
  //define mainigo, kas satures sasaisti ar datubazi
  private $connection;
  //private, ja ir private vai protected, tad var izmantot tikai konkreta faila
  //protected
  //public, var izmantot citos failos
   public function openConnection()
  {
    //izveido mainigos, ar atsaucem pret datubazi
    $dbhost = "mysql-server-80";
    $dbuser = "root";
    $dbpass = "root_password";
    $dbname = "web-bootcamp-db";
    //this veido atsauci uz konkretu klassi
    $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    //parbauda vai ir connects ar serveri
    if ($this->connection->connect_error) {
      die("Connection failed: " . $this->connection->connect_error);
    }  else {
      // echo "Connection successful" . "<br/>";
    }
  }

  public function closeConnection()
  {
    $this->connection->close();
  }

  public function run($sql) {
    $response = $this->connection->query($sql);

    if($response) {
      return $response; //ja atgriez datus, tad strada ar tiem
    } else {
      die("SQL error: " . $this->connection->error . "</br>"); //sql atgriezh kljudu
    }
  }
  
}

?>