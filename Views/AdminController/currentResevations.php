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
    <form action="?page=currentResevations" method="POST">
    <button type="submit">DELETE SELECTED RESERVATIONS</button>
    <table class="user_table">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Room Id</th>
            <th scope="col">Standard</th>
            <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reservations as $res):?>
                    <tr>
                    <th><input type="checkbox" name="id[]" value="<?= $res['id'];?>"></th>
                    <th scope="row"><?= $res['id']; ?></th>
                    <td><?= $res['from']; ?></td>
                    <td><?= $res['user']; ?></td>
                    <td><?= $res['room id']; ?></td>
                    <td><?= $res['standard']; ?></td>
                    <td><?= $res['location']; ?></td>
                    </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </form>
</div>
</div>

</body>
</html>