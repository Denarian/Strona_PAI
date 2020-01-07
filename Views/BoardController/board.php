<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
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
    <title>Palm Tree Resort</title>
</head>
<body>
<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
<div class="master_container">
    <div class="container">
        <div class="left_bar">
                <a href="/?page=board">Your reservations</a>
                <a href="/?page=board">Account details</a>
                <a href="/?page=board"> Password change</a>
                <a href="/?page=logout"> Sign out</a>
        </div>
        <div class="board">
            <div class="reservation"> You dont have any reservations </div>
            
            <div class="reservation">
                <table>
                <tr>
                  <th>Since:</th>
                  <th>To:</th>
                  <th>Standard:</th>
                  <th>Status:</th>
                </tr>
                <tr>
                  <th>dummy date</th>
                  <th>dummy date</th>
                  <th>dummy standard</th>
                  <th>dummy status</th>
                </tr>    
                </table>
            </div>
            <div class="reservation">
                <table>
                <tr>
                  <th>Since:</th>
                  <th>To:</th>
                  <th>Standard:</th>
                  <th>Status:</th>
                </tr>
                <tr>
                  <th>dummy date</th>
                  <th>dummy date</th>
                  <th>dummy standard</th>
                  <th>dummy status</th>
                </tr>    
                </table>
            </div>
            <button class="reservation">New reservation</button>
            
        </div>
    </div>
</div>
</body>
</html>