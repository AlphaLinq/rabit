<?php
include_once 'autoloader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisements</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

</head>

<body>
    <?php
    $userModel = new UserModell();
    $userService = new UserService($userModel);


    $adModel = new AdModel();
    $adService = new AdService($adModel);
    $adController = new AdController($adService, $userService);
    $ads = $adController->showAllAds();

    ?>

    <div>
        <h2>Advertisements</h2>
    </div>
    <div class="table-body">
        <table class="content-table">
            <thead>
                <td>Related User</td>
                <td>Title</td>
                <thead>
                <tbody>
                    <?php
                    foreach ($ads as $ad) {
                    ?>
                        <tr>
                            <td><?php
                                $user = $adController->showMentioned($ad);
                                echo $user[0]['name'];
                                ?></td>
                            <td><?php echo $ad['title'] ?></td>
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