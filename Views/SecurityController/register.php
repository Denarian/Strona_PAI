<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="icon" href="../Public/img/logo.svg">
    <title>Palm Tree Resort</title>
</head>
<body>
<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
<div class="master_container">
    <div class="container">
        <div class="login_box">
            <div class="logo">
            <img src="../Public/img/logo.svg">
            </div>
            <form action="?page=register" method="POST">
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
                    <div class="reg_form_left">Email</div>
                        <div class="reg_form_right">
                            <input class="reg_form" name="email" type="text" placeholder="email@email.com">
                        </div>
                    </div>    
                <div>
                    <div class="reg_form_left">Email</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="email_repeat" type="text" placeholder="email@email.com">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Password</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="password" type="password" placeholder="password">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Password</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="password_repeat" type="password" placeholder="password">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Name</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="name" type="text">
                    </div>
                </div>    
                <div>
                    <div class="reg_form_left">Surname</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="surname" type="text">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Address</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="address" type="text">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">City</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="city" type="text">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Zip-code</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="zipcode" type="text">
                    </div>
                </div>
                <button type="submit">CONTINUE</button>
            </form>
            
        </div>
    </div>
</div>
</body>
</html>