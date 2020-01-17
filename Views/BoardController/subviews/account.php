<?php 
$userRepo = new userRepository();
$user = $userRepo->getUser(($_SESSION['id']));
 ?>
<div class = "account">
<form action="/?page=accountDetails" method="POST">
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
                            <input class="reg_form" name="email" type="text" placeholder="email@email.com" value=<?php echo '"'.$user->getEmail().'"' ?>>
                        </div>
                    </div>    
                <div>
                    <div class="reg_form_left">Name</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="name" type="text" value=<?php echo '"'.$user->getName().'"' ?>>
                    </div>
                </div>    
                <div>
                    <div class="reg_form_left">Surname</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="surname" type="text" value=<?php echo '"'.$user->getSurname().'"' ?>>
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Address</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="address" type="text" value=<?php echo '"'.$user->getAddress().'"' ?>>
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">City</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="city" type="text" value=<?php echo '"'.$user->getCity().'"' ?>>
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Zipcode</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="zipcode" type="text" value=<?php echo '"'.$user->getZipcode().'"' ?>>
                    </div>
                </div>
                <button type="submit">CHANGE ACCOUNT DETAILS</button>
            </form>
</div>