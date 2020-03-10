<?php 
require_once "./models/UserModel.php"; //savienot failus 

$description = '';
$id = '';

if(isset($_POST["submit"])){ //vai pieprasijums atnaca no submit pogas
	
  $description = $_POST["description"];
  $id = $_POST["id"];

  $data = [
    "description"=> $_POST["description"],
    "id" => $_POST["id"]
  ];

  UserModel::updateDescription($data);

	header("Location: /tkedo.github.io/final_project/");

}

if(isset($_GET["id"])){ //nolasam id no datubaze

  $result = UserModel::getDescriptionById($_GET["id"]);
  
  while($row = mysqli_fetch_assoc($result)) { //atsuta rezultatu, kuru ieliek mainigajos

    $description = $row["description"];
    $id = $row["id"];
  }
}
$edit = true;
header("Location: /tkedo.github.io/final_project/");
?>

