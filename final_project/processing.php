<?php

// Connection to DB
$mysqli = new mysqli("mysql-server-80", "root", "root_password", "web-bootcamp-db") or die(mysqli_error($mysqli));
//Setting variables 
$update = false;
$description = "";
$checked = 0;
//Seting variables to use in HTML/retrieve info
$completed = $mysqli->query("SELECT COUNT(CASE checked when 1 then 1) FROM todo");
$incomplete= $mysqli->query("SELECT COUNT(CASE checked when 0 then 1) FROM todo");
$resultincomplete = $mysqli->query("SELECT * FROM todo WHERE checked = 0");
$resultcomplete = $mysqli->query("SELECT * FROM todo WHERE checked = 1");

// Add task to DB

if(isset($_POST["submit"])) 
{
    $description = $_POST["description"];
    $mysqli->query("INSERT INTO todo (description, date) VALUES ('$description', now())");
    header("location: index.php");
}

// Delete task from DB

if(isset($_GET["delete"])) 
{
    $id = $_GET["delete"];
    $mysqli->query("DELETE FROM todo WHERE id=$id");

    header("location: index.php");
}

// Retrieve task from DB for update

if(isset($_GET["edit"])) 
{
    $id = $_GET["edit"];
    $update = true;
    $result = $mysqli->query("SELECT description FROM todo WHERE id=$id");
 
    if ($result->num_rows) 
    {
        $row = $result->fetch_array();
        $description = $row["description"];
    }
}

// Send updated task back to DB
if(isset($_POST["update"])) 
{
    $id = $_POST["id"];
    $description = $_POST["description"];
    $mysqli->query("UPDATE todo SET description='$description' WHERE id=$id");

    header("location: index.php");
}

// When check is 'checked' send info to DB

if(isset($_POST["checked"]))
{
    $id = $_POST["id"];
    $checked = $_POST["checked"];
    $mysqli->query("UPDATE todo SET checked='$checked' WHERE id=$id");

    header("location: index.php");
}
?>