/**
 * Created by stiwo on 03-Jun-16.
 */
function checkCaptcha() {
    var passedPhrase = "Hello, Human.";
    $.ajax({
        type:"post",
        url:"../queries/reCaptcha.php",
        data: "g-recaptcha-response="+grecaptcha.getResponse(),
        dataType: "json",
        success: function(result){
            console.log( result );
            $("#recaptchaerr").text(result);
            if(result.equals(passedPhrase))
                return 1;
            else
                return 0;
        }
    });
}