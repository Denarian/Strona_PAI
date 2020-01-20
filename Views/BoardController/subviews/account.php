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
                            <input class="reg_form" name="email" type="text" placeholder="email@email.com" value="<?php echo $user['email']?>">
                        </div>
                    </div>    
                <div>
                    <div class="reg_form_left">Name</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="name" type="text" value="<?php echo $user['name']?>">
                    </div>
                </div>    
                <div>
                    <div class="reg_form_left">Surname</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="surname" type="text" value="<?php echo $user['surname']?>">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Address</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="address" type="text" value="<?php echo $user['address']?>">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">City</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="city" type="text" value="<?php echo $user['city']?>">
                    </div>
                </div>
                <div>
                    <div class="reg_form_left">Zipcode</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="zipcode" type="text" value="<?php echo $user['zipcode']?>">
                    </div>
                </div>
                <button type="submit">CHANGE ACCOUNT DETAILS</button>
            </form>
</div>