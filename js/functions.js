$(document).ready(function() {

                $('#engFlag').on('click', function() {
                    var href = document.location.href;
                    var page = href.substr(href.lastIndexOf('/') + 1);
                    if(page == "index.html")
                        $(location).attr('href','../eng/'+page);
                    else
                        $(location).attr('href','../eng/pages/'+page);
                });
			// Real-time Validation
				// Name can't be blank
				$('#name').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){
                        input.removeClass("invalid").addClass("valid");
                        $('#errname').removeClass("error_show").addClass("error");
                    }
					else{
                        input.removeClass("valid").addClass("invalid");
                        $('#errname').removeClass("error").addClass("error_show");
                    }
				});
                $('#surname').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){
                        input.removeClass("invalid").addClass("valid");
                        $('#errsurname').removeClass("error_show").addClass("error");
                    }
					else{
                        input.removeClass("valid").addClass("invalid");
                        $('#errsurname').removeClass("error").addClass("error_show");
                    }
				});

				// Email must be an email
				$('#email').on('input', function() {
					var input=$(this);
					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					var is_email=re.test(input.val());
					if(is_email){
                        input.removeClass("invalid").addClass("valid");
                        $('#erremail').removeClass("error_show").addClass("error");
                    }
					else{
                        input.removeClass("valid").addClass("invalid");
                        $('#erremail').removeClass("error").addClass("error_show");
                    }
				});

			//	Date can't be blank
				$('#date').on('input', function() {
					var input=$(this);
					var date=$(this).val();
					if(date && trueDate(date)){
                        input.removeClass("invalid").addClass("valid");
                        $('#errdate').removeClass("error_show").addClass("error");
                    }
					else{
                        input.removeClass("valid").addClass("invalid");
                        $('#errdate').removeClass("error").addClass("error_show");
                    }
				});

                // Acconsento must be checked
                $("input:radio[name='privacy']").change(function () {
                    if ($("input:radio[name='privacy'][value='yes']").is(":checked")) {
                        $('#errprivacy').removeClass("error_show").addClass("error");
                        $("input:radio[name=privacy]").removeClass("invalid").addClass("valid");
                    }
                    else {
                        $('#errprivacy').removeClass("error").addClass("error_show");
                        $("input[name='privacy']").removeClass("valid").addClass("invalid");
                    }
                });

            // Clean Form
                $("#delete").on('click',function(event){
				    $("#name").val("");
                    $("#surname").val("");
                    $("#date").val("");
                    $("#email").val("");
			    });

		//	After Form Submitted Validation
			$("#contact_submit button").click(function(event){
                event.preventDefault();
				var form_data=$("#regForm").serializeArray();
				var error_free=true;
				for (var input in form_data){
					var element=$("#"+form_data[input]['name']);
					var valid=element.hasClass("valid");
					var error_element=$("#err"+form_data[input]['name']);
					if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
					else{error_element.removeClass("error_show").addClass("error");}
				}
				if (error_free) {
					swal({title: "Confermare la registrazione?",
                            text: "Premere Conferma per continuare",
                            type: "info",
                            showCancelButton: true,
                            confirmButtonColor: "rgba(5,112,232,.7)",
                            cancelButtonColor: "rgb(188,211,236)",
                            confirmButtonText: "Conferma",
                            cancelButtonText: "Annulla",
                            closeOnConfirm: false,
                            closeOnCancel: false,
                            showLoaderOnConfirm: true
                        },
                      function(isConfirm){
                                if (isConfirm) {
                                    setTimeout(function(){swal("Utente Registrato");}, 2000);
                                    document.regForm.submit();
                                } else {
                                    swal("Registrazione Annullata", "Utente non registrato", "error");
                                }
                        });
				    }
			});
});
function deleteRow(n) {
    $.ajax({
        type: 'GET',
        url: 'deleteRow.php?n='+n,
        success: function()
                  {
                    swal({title: "Utente Eliminato",
                            text: "Premere OK per continuare",
                            type: "success",
                            confirmButtonColor: "rgb(5,112,232)",
                            confirmButtonText: "OK",
                            closeOnConfirm: false,
                        }, function(){$(location).attr('href','../pages/login.php');});
                  }
       });
}
function editRow(n) {
    swal({title: "Modifica Dati",
          html: "<table class='table-form-popup'><tr><td><label for='name'>Nome:</label></td><td><input type='text' id='name' name='name' placeholder='Nome'/></td><td></td></tr><tr><td></td><td><span id='errname' class='error'>Campo Obbligatorio<br/></span></td></tr><tr><td><label for='surname'>Cognome:</label></td><td><input type='text' id='surname' name='surname' placeholder='Cognome'/></td><td></td></tr><tr><td></td><td><span id='errsurname' class='error'>Campo Obbligatorio<br/></span></td></tr><tr><td><label for='email'>E-Mail:</label></td><td><input type='text' id='email' name='email' placeholder='indirizzo@email.com'/></td><td></td></tr><tr><td></td><td><span id='erremail' class='error'>Inserire un indirizzo valido<br/></span></td></tr><tr><td><label for='date'>Data di Nascita:</label></td><td><input type='date' id='date' name='date' max='2018-01-01' min='1899-12-31'/></td><td></td></tr><tr><td></td><td><span id='errdate' class='error'>Inserire una data valida<br/></span></td></tr></table>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "rgb(5,112,232)",
          cancelButtonColor: "rgb(188,211,236)",
          confirmButtonText: "Conferma",
          cancelButtonText: "Annula",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
                        },
                      function(isConfirm){
                                if (isConfirm) {
                                    var name = $("#editname").val();
                                    var surname = $("#editsurname").val();
                                    var email = $("#editemail").val();
                                    var date = $("#editdate").val();
                                    setTimeout(function(){swal("Utente Registrato");}, 2000);
                                    $.ajax({
                                            type: 'GET',
                                            url: 'editRow.php?ID='+n+'&name='+name+'&surname='+surname+'&email='+email+'&date='+date,
                                            success: function() {
                                                $(location).attr('href','../pages/login.php');
                                            }
                                    });

                                } else {
                                    swal("Modifica Annullata", "Utente non modificato", "error");
                                }
                        });

}
function trueDate(data) {
    var today=new Date();//data attuale
    if((parseInt(data.substring(0,4))>parseInt(today.getFullYear()))||(parseInt(data.substring(0,4))==parseInt(today.getFullYear())&&parseInt(data.substring(5,7))>(parseInt(today.getMonth())+1))||(parseInt(data.substring(0,4))==parseInt(today.getFullYear())&&parseInt(data.substring(5,7))==(parseInt(today.getMonth())+1)&&parseInt(data.substring(8,10))>=parseInt(today.getDate()))) {
        return false;
    }
    else
        return true;
}
/* --- Funzione Mostra Data e Ora
function displayRefresh() {
    var refresh=1000; // Refresh rate in milli seconds
    time = setTimeout('displayDate()',refresh);
}
function displayDate() {
    document.getElementById("date").innerHTML = new Date();
    tt = displayRefresh();
}
--- */
