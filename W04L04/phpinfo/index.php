<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add.php" method="post">
        <input name="email" type="email">
        <input name="age" type="number">
        <button type="submit">Save data</button>
        <input hidden name="user_id" value="<?=13?>">
    </form>
</body>
</html>