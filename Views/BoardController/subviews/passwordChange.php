<div class = "account">
<form action="/?page=passwordChange" method="POST">
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
                    <div class="reg_form_left">Old Password</div>
                        <div class="reg_form_right">
                            <input class="reg_form" name="old_pass" type="password">
                        </div>
                    </div>    
                <div>
                    <div class="reg_form_left">New Password</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="new_pass" type="password">
                    </div>
                </div>    
                <div>
                    <div class="reg_form_left">New Password</div>
                    <div class="reg_form_right">
                        <input class="reg_form" name="new_pass_r" type="password">
                    </div>
                </div>
                <button type="submit">CHANGE PASSWORD</button>
            </form>
</div>