$(function(){
    
    $.validator.addMethod('nameLength', function(value,element) {
            return this.optional(element) || value.length >=2;
    },"<strong>You're name's got to be longer than two characters, please.</strong>");
       
      
    $('#signUp').validate({ 
        rules: {
            first: { 
                required: true,
                nameLength: true,
                lettersonly: true
            },
            last: {
                required: true,
                nameLength: true,
                lettersonly: true
            },
            phone: {
                required: true,
                phoneUS: true
            },
            email: {
                required: true, 
                email: true
            },
            birthday: {
                required: true
            }
        },
        messages: {
            first: {
                required: "<strong>Don't forget!</strong>",
            },
            last: {
                required: "<strong>Don't forget!</strong>"  
            },
            email: {
                required: '<strong>Woah! This is required!</strong>',
                email: '<strong>Wait up! Check if this email is valid</strong>'
            }
        },
        submitHandler: function(form) {
            
                /*Ajax Data, sent to wp-admin/admini-ajax.php controllers, which then execute my send_email() function in the functions.php file*/
                
                jQuery.ajax({
                    type: 'POST',
                    url: theAjaxData.ajaxurl, /*(Check out my footer.php file for more clarification about this object.) */                
                    data: $(form).serialize(),
                    error: function errMssg() {
                            //UX Feedback
                        $('#data-vdtn-error').fadeIn(500);
                        $('#data-vdtn-error').addClass('invalid');
                    },
                    success: function successMssg() {
                            //UX Feedback:
                        $('#data-vdtn-success').fadeIn(500);
                        $('#data-vdtn-success').addClass('valid');                    
                    //For slow internet connections, disabling the button avoids multiple submissions which could alter CRM lead counts.
                        $('#sub-btn').disabled = true;
                    }
                });
            
            
        }
    });
});

    /*Number Validation*/
/*$("#phone").mask("(999) 999-9999",{placeholder:" "});*/
$("#birthday").mask("99-99-9999",{placeholder:" "});