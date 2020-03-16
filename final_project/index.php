<?php
require_once("processing.php");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Final Project (ToDo List)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Added stylesheets -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="./style/style.css">
	<!-- Added JS & jQ -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="./script/script.js"></script>
</head>

<body>
	<div>
		<form method="POST" action="processing.php" id="inputform" class="form"> 
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input id="countDown" class="description" name="description" type="text" value="<?php echo $description; ?>" placeholder="I need to..." maxlength="50" required>
			<span id="count2" class="charleft">50</span>
	<!-- Depending on incoming request, either add button or update button is presented -->
			<?php
			if ($update == true) :?> <button name="update" type="submit" value="submit" class="btn btn-primary">Update</button>
			<?php else : ?>
				<button name="submit" type="submit" value="submit" class="btn btn-primary" id="btn">Add</button>
			<?php endif; ?>
		</form>
	</div>
	<!-- Display tasks that are not completed -->
	<div class="incomplete">
		<table class="tablestyle">
			<thead>
				<tr>
					<th>Incomplete</th>
				</tr>
			</thead>
	<!-- Added sorting funcionality to data below -->
			<tbody id="sorting"> 
				<?php
				while ($row = $resultincomplete->fetch_assoc()) : ?>
					<tr>
						<td class="cellstyle grabstyle">
							<form method="POST" action="processing.php">
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<input type="hidden" name="checked" value="0">
		<!-- Check if checkbox is checked, if checked submit data and incoming task -->
								<span> 
									<input href="index.php?checked=<?php echo $row['id'] ?>" type="checkbox" value="1" name="checked" <?php $row['checked'] ? 'checked' : '' ?> onchange='this.form.submit()'>
									<?php echo $row["description"] ?>
								</span>
							</form>
		<!-- Added buttons for interaction -->
							<div>
								<a name="edit" href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-secondary">Edit</a>
								<a name="delete" href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
							</div>
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
		<!-- Display tasks that are completed -->
	<div class="completed">
			<table class="tablestyle">
				<thead>
					<tr>
						<th>Completed</th>
					</tr>
				</thead>
				<?php
				while ($row = $resultcomplete->fetch_assoc()) : ?>
					<tr>
						<td class="cellstyle">
							<form method="POST" action="processing.php">
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<input type="hidden" name="checked" value="0">
								<!-- Check if checkbox is checked, if checked submit data and incoming task -->
								<span>
									<input href="index.php?checked=<?php echo $row['id'] ?>" type="checkbox" value="1" name="checked" <?php echo $row['checked'] ? 'checked' : '' ?> onchange='this.form.submit()'>
									<s><?php echo $row["description"] ?></s>
								</span>
							</form>
							<!-- Added button for interaction -->
							<div>
								<a name="delete" href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
							</div>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		</div>
	</div>

</body>
</html>