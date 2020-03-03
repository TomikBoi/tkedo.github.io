<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Project</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="script.js"></script>

</head>

<body class="p-3">
  <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
    <a class="navbar-brand" href="#">Users</a>
      <h4 <?= isset($_SESSION["user_id"]) ? '' : 'hidden' ?>>
     You have signed in as <?= $_SESSION["user_name"]?></h4>

    <!-- TODO create add.php logic -->
    
    <button class="btn btn-primary my-2 my-sm-0" type="submit"><a class="text-white"
        href="/tkedo.github.io/php/mvc/add.php">Add User</a></button>
    <button <?= isset($_SESSION["user_id"]) ? 'hidden' : '' ?> class="btn btn-primary my-2 my-sm-0" type="submit"><a class="text-white"
        href="/tkedo.github.io/php/mvc/login.php">Login</a></button>
    <button <?= isset($_SESSION["user_id"]) ? '' : 'hidden' ?> class="btn btn-primary my-2 my-sm-0" type="submit"><a class="text-white"
        href="/tkedo.github.io/php/mvc/logout.php">Logout</a></button>
    
    </div>
  </nav>

  <div class="container">
    <table class="table table-hover mt-3">
      <tr>
        <th>Name</th>
        <th>Password</th>
        <th></th>
      </tr>
      <!-- TODO add PHP  dynamic list -->

       <?php while($row = mysqli_fetch_array($result)) { ?> <!--atsuta datus no pieprasijuma -->
        
      <tr>
        <td><?=$row["name"]?></td>
        <td><?=$row["password"]?></td>
        <td>

          <!-- TODO create edit.php logic -->
          <a href="/tkedo.github.io/php/mvc/edit.php?id=<?=$row["id"]?>" class="btn btn-primary">Edit</a>

          <!-- TODO create delete.php logic -->
          <a href="/tkedo.github.io/php/mvc/delete.php?id=<?=$row["id"]?>" class="btn btn-danger">Delete (PHP)</a>

          <!-- TODO create delete jQuery logic -->
          <button class="btn-danger btn js-delete-row" data-id=<?=$row["id"]?>>Delete (jQuery)</button>
        </td>
      </tr>
    <?php } ?> 
    
    </table>
  </div>


</body>

</html>