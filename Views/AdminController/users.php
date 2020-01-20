<?php
    if(!isset($_SESSION['email']) and !isset($_SESSION['role'])) {
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=login");
    }

    if($_SESSION['role'] == 0) {
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=forbidden");
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
    <form action="?page=users" method="POST">
    <button type="submit">DELETE SELECTED USERS</button>
    <table class="user_table">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): if($user->getId() == $_SESSION['id'])continue; ?>
                    <tr>
                    <th><input type="checkbox" name="id[]" value="<?php echo $user->getId();?>"></th>
                    <th scope="row"><?= $user->getId(); ?></th>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $user->getName(); ?></td>
                    <td><?= $user->getSurname(); ?></td>
                    </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </form>
</div>
</div>

</body>
</html>