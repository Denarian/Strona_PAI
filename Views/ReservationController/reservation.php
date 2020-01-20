<?php
    if(!isset($_SESSION['email']) and !isset($_SESSION['role'])) {
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=login");
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
    <form action="?page=reservation" method="POST">
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <div>
                    <div class="reservation_form_left">Arrival date</div>
                    <div class="reservation_form_right">
                        <input class="reg_form" name="from" type="date" value="<?php echo $from ?>">
                    </div>
                </div>
                <div>
                    <div class="reservation_form_left">Departure date</div>
                    <div class="reservation_form_right">
                        <input class="reg_form" name="to" type="date" value="<?php echo $to ?>">
                    </div>
                </div>
                <button type="submit">CONTINUE -></button>
            </form>
        </div>
    </div>
</div>
</body>
</html>