<?php
include_once 'autoloader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <?php
    $userModel = new UserModell();
    $userService = new UserService($userModel);
    $userController = new UserController($userService);
    $users = $userController->showAllUsers();
    ?>
    <div>
        <h2>Usernames</h2>
    </div>
    <div class="table-body">
        <table class="content-table">
            <thead>
                
                <td>Name</td>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td><?php echo $user['name'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="box">
        <i class="fa-solid fa-circle-arrow-left"></i>
            <button id="back" onclick="window.location.href='index.php'">BACK</button>
        </div>
        
</body>

</html>