
<?php 
if(!isset($_SESSION['email']) and !isset($_SESSION['role'])) {
    $url = "http://$_SERVER[HTTP_HOST]/";
    header("Location: {$url}?page=login");
}
$table = '';

  foreach($rooms as $room)
  {
    $standard = $room['standard'];
    $id = $room['id'];
    $table .= <<<HTML
    <label class="labl">
        <input type="radio" name="roomId" value="$id" checked="checked">
        <div>$standard</div>
    </label>
HTML;
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/reservation.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="icon" href="../Public/img/logo.svg">
    <title>Palm Tree Resort</title>
</head>
<body>
<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
<div class="master_container">
    <div class="container">
    <form action="?page=roomChoice" method="POST">
        <div class="messages">
            <?php
                 if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                    ?>
        </div>
        <?php echo $table?>        
        
        <button type="submit">MAKE RESERVATION</button>
    </form>
    </div>
</div>
</body>
</html>