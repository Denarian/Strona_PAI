$(document).ready(function(){
    $("#r_email").change(
        function(){
            if($("#email").val() != $("#r_email").val())
            {
                if(!$("#em_msg").length)
                {
                    $("#r_email").addClass("error");
                    $(".messages").append("<div id='em_msg'>Emails don't match</div>");
                }
            }
            else
            {
                $("#r_email").removeClass("error");
                $("#em_msg").remove();
            }
        }
    );
    $("#r_pass").change(
        function(){
            if($("#pass").val() != $("#r_pass").val())
            {
                if(!$("#psw_msg").length)
                {
                    $("#r_pass").addClass("error");
                    $(".messages").append("<div id='psw_msg'>Passwords don't match</div>");
                }
            }
            else
            {
                $("#r_pass").removeClass("error");
                $("#psw_msg").remove();
            }
        }
    );
    $("#email").change(
        function(){
            $.post("?page=check_email",{email: $("#email").val()}, function(data){
                if(data === "true")
                {
                    if(!$("#em_tkn_msg").length)
                    {
                        $("#email").addClass("error");
                        $(".messages").append("<div id='em_tkn_msg'>This email is taken!</div>");
                    }
                }
                else
                {
                    $("#email").removeClass("error");
                    $("#em_tkn_msg").remove();
                }
              });
        }
    );

});