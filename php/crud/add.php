<?php
	require_once "./db-wrapper.php"; //savienot failus 

	if (isset($_POST["name"])) { //vai name ir pieejams zem post
		$name = $_POST["name"]; //uztaisa mainigos, attiecigi pret POST_(name-kurs ir 'name' @ input)
	}

	if (isset($_POST["email"])) { //vai email ir pieejams zem post
		$email = $_POST["email"];
	}

	$form_name = ''; //izveido tukshus mainigos, ko ievietot forma
	$form_email = '';
	$id = '';

	if(isset($_POST["name"]) && isset($_POST["email"])) {


		$db = new DB(); //izveidot jaunu instanci klassei
		
		$db->openConnection(); //atveram

		if (empty($_POST["id"])) { //ja ir ID, tad taisa update, ja nav, tad taisa CREATE 
			$db->run("INSERT INTO users (name, email) VALUES ('$name', '$email')"); //mainigos ieliek "values" vieta, ar @ jaliek ar punktu un jataisa string conc
		} else {
			$db->run("UPDATE users SET name='$name', email='$email' WHERE id=".$_POST["id"]);
		}
		
		$db->closeConnection();
	}
		if (isset($_GET["id"])) //ja no get ienak id {
			{
			$db = new DB();
			$db->openConnection();

			$response = $db->run("SELECT * FROM users WHERE id=".$_GET["id"]);

			while($row = mysqli_fetch_assoc($response)) {
					$form_email = $row["email"]; //tukshiem mainigajiem uzliek atbildi
					$form_name = $row["name"];
			}
			$db->closeConnection();

			$id = $_GET["id"]; //uzstada id kurs atnak no lietotaja
		} 

	
?>


<form action="./add.php" method="POST">
  <input name="name" value="<?php echo $form_name ?>">
  <input name="email" type="email" value="<?= $form_email ?>">
	<input hidden name="id" value="<?=$id?>"> 
	<!-- ieliek neredzemaja lauka, lai zinat, vai pievienot jaunu ierakstu vai atjaunot esošo -->

	<button type="submit">Save</button>
</form>