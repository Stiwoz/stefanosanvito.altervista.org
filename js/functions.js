$(document).ready(function() {

            // Activating bootstrap tooltips
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });

			// Real-time Validation 
				// Name can't be blank
				$('#username').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){
                        input.removeClass("invalid").addClass("valid");
                        $('#usernameerr').removeClass("error_show").addClass("error");
                    }
					else{
                        input.removeClass("valid").addClass("invalid");
                        $('#usernameerr').removeClass("error").addClass("error_show");
                    }
				});

                // Checking number of chars in Comment
                const MAX_CHARS = 500;
                $('#comment').on('input', function() {
                    var input=$(this);
                    var chars=input.val().length;
                    $('.charNumb').empty().text(MAX_CHARS - chars);
                    if(chars <= MAX_CHARS && chars !== 0){
                        input.removeClass("invalid").addClass("valid");
                        $('.charNumb').removeClass("errorChars");
                        $('#commenterr').removeClass("error_show").addClass("error");
                    }
                    else{
                        input.removeClass("valid").addClass("invalid");
                        $('.charNumb').addClass("errorChars");
                        $('#commenterr').removeClass("error").addClass("error_show");
                    }
                 });

                // Email must be an email
				$('#email').on('input', function() {
					var input=$(this);
					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]/;
					var is_email=re.test(input.val());
					if(is_email){
                        input.removeClass("invalid").addClass("valid");
                        $('#emailerr').removeClass("error_show").addClass("error");
                    }
					else{
                        input.removeClass("valid").addClass("invalid");
                        $('#emailerr').removeClass("error").addClass("error_show");
                    }
				});

                //checking "city"
                $('#city').on('input',function(){
                    var input=$(this);
                    var is_name=input.val();
                    if(is_name){
                        input.removeClass("valid").addClass("invalid");
                        $('#cityerr').removeClass("error").addClass("error_show");
                    }
                    else{
                        input.removeClass("invalid").addClass("valid");
                        $('#cityerr').removeClass("error_show").addClass("error");
                    }
                });
                // Acconsento must be checked
                $("input:radio[name='privacy']").change(function () {
                    if ($("input:radio[name='privacy'][value='yes']").is(":checked")) { 
                        $('#privacyerr').removeClass("error_show").addClass("error");
                        $("input:radio[name='privacy']").removeClass("invalid").addClass("valid");
                    }
                    else { 
                        $('#privacyerr').removeClass("error").addClass("error_show");
                        $("input[name='privacy']").removeClass("valid").addClass("invalid");
                    }
                });
		
		//	After Form Submitted Validation
			$("#submit").click(function(event){
                event.preventDefault();
				var form_data=$("#commForm").serializeArray();
				var error_free=true;
                var city = $('#city');
                if(city.val() == '')
                    city.removeClass("invalid").addClass("valid");
                else
                    city.removeClass("valid").addClass("invalid");
                jQuery.each(form_data, function(i, field){
                    var input_name= $("#"+field['name']);
                    var error_element = $('#'+field['name'] + 'err');
                    if (!input_name.hasClass("valid")) {
                        error_element.removeClass("error").addClass("error_show");
                        error_free = false;
                    }
                    else {
                        error_element.removeClass("error_show").addClass("error");
                    }
                    //alert(error_free + " " + field['name']);
                });

                if (error_free) {
                    swal({
                        title: "Confermare l'inserimento?",
                        text: "Premere Conferma per continuare",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: "Conferma",
                        cancelButtonText: "Annulla",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            if (isConfirm === true) {
                                swal("Commento Registrato","","success");
                                $('#commForm').submit();
                            } else if (isConfirm === false) {
                                swal("Registrazione Annullata", "Commento non registrato", "error");
                            }
                            else {
                                // Esc, close button or outside click
                                // isConfirm is undefined
                            }
                        }
                    });
                }
                else {
                    swal("Errore", "Form non correttamente compilato", "error");
                    $('#commForm').attr('action', '');
                }
			});
            $("#reset").click(function(event){
                event.preventDefault();
                $('.error_show').removeClass("error_show").addClass("error");
                $('.error_chars').removeClass("error_chars");
                $('.charNumb').empty().text(MAX_CHARS);
                $('.invalid').removeClass("invalid");
                $('.valid').removeClass("valid");
                $('#anon').addClass("valid");
                $('#username').val('');
                $('#email').val('');
                $('#city').val('');
                $('#comment').val('');
            });
});