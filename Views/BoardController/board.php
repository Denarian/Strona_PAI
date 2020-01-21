<?php
    if(!isset($_SESSION['email']) and !isset($_SESSION['role'])) {
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=login");
    }

    if(!isset($subview) or $subview == null)
    {
        $subview = 'reservations';
    }
    if($_SESSION['role'] != 0)
    {
        $adminBtns = '<a href="/?page=users">Users</a><a href="/?page=currentResevations">Current</br>Reservations</a>';
    }
    else
    {
        $adminBtns = '';
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
        <div class="left_bar">
                <a href="/?page=board">Your reservations</a>
                <a href="/?page=accountDetails">Account details</a>
                <a href="/?page=passwordChange">Password change</a>
                <?php echo $adminBtns; ?>
                <a href="/?page=logout">Sign out</a>
        </div>
        <div class="board">
            <?php include(dirname(__DIR__).'/BoardController/subviews/'.$subview.'.php'); ?>
        </div>
    </div>
</div>
</body>
</html>