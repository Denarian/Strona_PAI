<?php
    if(!isset($_SESSION['email']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('You do not have permission to watch this page!');
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="icon" href="../Public/img/logo.svg">
    <title>Palm Tree Resort</title>
</head>
<body>
<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
<div class="master_container">
<div class="container">
    <table class="user_table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                    <tr>
                    <th scope="row"><?= $user->getId(); ?></th>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $user->getName(); ?></td>
                    <td><?= $user->getSurname(); ?></td>
                    </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>