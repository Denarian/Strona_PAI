<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if($_SESSION['role'] == 0) {
        die('You do not have permission to watch this page!');
    }
    if(!isset($subview) or $subview == null)
    {
        $subview = 'reservations';
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"> 
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
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
                <a href="/?page=logout">Sign out</a>
        </div>
        <div class="board">
            <?php include(dirname(__DIR__).'/BoardController/subviews/'.$subview.'.php'); ?>
        </div>
    </div>
</div>
</body>
</html>