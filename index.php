<?php
if(!isset($_SESSION)){
    session_start();
}

include_once 'autoloader.php';
if (!isset($_SESSION['tables_created'])) {
    $obj = new Dbh();
    $obj->create_tables();
}


?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="index">
    <button class="btn" onclick="window.location.href='UserList.php'">Users</button>
    <button class="btn" onclick="window.location.href='AdsList.php'">Advertisements</button>

</body>

</html>