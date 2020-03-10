<?php 
require_once "./models/UserModel.php";
$result =  UserModel::getAllDescription();
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
      <form action="/tkedo.github.io/final_project/<?= $edit ? 'edit.php' : 'add.php' ?>" method="POST">
        <textarea class="description" name="description" required  maxlength="25" value="<?=$description?>"></textarea>
        <input hidden name="id" value="<?=$id?>">
        <button class="btn btn-primary my-2 my-sm-0 add" type="submit" name="submit">Add</a></button>
      </form>
    </div>
    <ul>
      <?php while ($row = mysqli_fetch_array($result)) { ?>
        <li><input class="checkbox" type="checkbox" id="<?=$row["id"]?>" name="checkbox" value="checked"><?= $row["description"]?>
          <a href="/tkedo.github.io/final_project/edit.php?id=<?=$row["id"]?>" class="btn btn-primary">Edit</a>
          <a href="/tkedo.github.io/final_project/delete.php?id=<?=$row["id"]?>" class="btn btn-warning">Delete</a>
        </li>
      <?php } ?>
    </ul>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="script/script.js" async defer></script>

</body>

</html>