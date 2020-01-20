$(document).ready(function(){
    $("#email").change(
        function(){
            $.post("?page=check_email",{email: $("#email").val()}, function(data){
                if(data === "false")
                {
                    $("#email").addClass("error");
                    $(".messages").append("<div id='em_tkn_msg'>'User with this email not exist!'</div>");
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