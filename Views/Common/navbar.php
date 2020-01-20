<?php
    if(!isset($_SESSION['email']) and !isset($_SESSION['role'])) {
        $user_button = '<div class="navbar_items"><a href="/?page=login">Sign IN</a></div>';
    }else
    {
        $user_button = '<div class="navbar_items"><a href="/?page=board">Your<br />Account</a></div>';
    }
?>

<div class="navbar_container">
    <div class="logo">
        <img src="../Public/img/logo.svg">
    </div>
        <div class="mainbar navbar">
        <div class="navbar_items">HOTEL</div>
        <div class="navbar_items">PACKAGES</div>
        <div class="navbar_items">RESTARURANT</div>
        <div class="navbar_items">EVENTS</div>
        <div class="navbar_items">SPA</div>
        <div class="navbar_items">GALLERY</div>
        <div class="navbar_items">CONTACT</div>
        </div>
        <div class="userbar navbar">
           <?php echo $user_button ?>
        </div>
        <div class="bookbar navbar">
            <div class="navbar_items "><a href="/?page=reservation">BOOK ONLINE</a></div>
    </div>
</div>