<?php
require_once "./db-wrapper.php"; //savienot failus 

$db = new DB(); //izveidot jaunu instanci klassei

$db->openConnection(); //atveram

$response = $db->run("SELECT * FROM users"); //izpildam darbibas
?>

<table>
  <tr>
    <th>Name</th>
  </tr>
  <?php 
  	while($row = mysqli_fetch_assoc($response)) { 
			echo "<tr><td>" . $row["name"] . "</td><td><button>Delete</button></td></tr>" ;;
  	} 
  ?>



</table>

<?php $db->closeConnection(); //aizveram ?>