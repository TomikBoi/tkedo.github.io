<?php session_start();
require_once "./models/UserModel.php";
$result =	UserModel::getAllDescription();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Final Project (ToDo List)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="wrapper">
    <div class="addtodo">
    <form action="/tkedo.github.io/final_project/add.php" method="POST"> 
    <textarea class="description" name="description"></textarea>
    <button class="btn btn-primary my-2 my-sm-0 add" type="submit" name="submit">Add</a></button>
    </form>
    </div>
    <ul>
    <?php while($row = mysqli_fetch_array($result)) { ?>  atsuta datus no pieprasijuma
      <li><?=$row["description"]?></li>
      <a href="/tkedo.github.io/php/mvc/edit.php?id=<?=$row["id"]?>" class="btn btn-primary">Edit</a>

          <!-- TODO create delete.php logic -->
          <a href="/tkedo.github.io/php/mvc/delete.php?id=<?=$row["id"]?>" class="btn btn-danger">Delete (PHP)</a>
      <!-- <li id="1"><input type="checkbox"> WhatINeedToDo :: <a href="" class="btn btn-primary">Edit</a> :: <a href="" class="btn btn-danger">Delete</a></li>
      <li id="2"><input type="checkbox"> WhatINeedToDo :: <a href="" class="btn btn-primary">Edit</a> :: <a href="" class="btn btn-danger">Delete</a></li>
      <li id="3"><input type="checkbox"> WhatINeedToDo :: <a href="" class="btn btn-primary">Edit</a> :: <a href="" class="btn btn-danger">Delete</a></li>
      <li id="4"><input type="checkbox"> WhatINeedToDo :: <a href="" class="btn btn-primary">Edit</a> :: <a href="" class="btn btn-danger">Delete</a></li> -->
      <?php } ?> 
    </ul>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="script/script.js" async defer></script>
  
</body>

</html>