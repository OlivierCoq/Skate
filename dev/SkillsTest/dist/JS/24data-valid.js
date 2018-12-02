/*Hello 24 Data team. Here's my JavaScript file, formatted in jQuery, minified with Grunt's uglify. */      


//UX/UI functions, for validating WHILE user is filing out form:

    /*Letter limit, substracts the characters that go past 20, for first and last names.*/
function charLimit(name)
{
    var max = 20;

    if(name.value.length > max) {
        name.value = name.value.substr(0, max);
    };
    
};

    /*Zip Code Limit. Works similarly to the name limit.*/
function zipLimit(zip) {
    
    var max = 5;
    
    if(zip.value.length > max) {
        zip.value = zip.value.substr(0, max);
    }
};

    //Force phone numbers to format using reg expressions and .JS replace:
        
$('#phone').on('input', function (e) {
        
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});
    
$("#skillsForm").submit(function(ev){
    
//Prevent from automatically sending form
    ev.preventDefault();
        
//Form Inputs in Variable.
    var letters = /^[a-zA-Z\s]*$/; /*Regex for letters and spaces only all the way to end of string, to avoid those weird characters from spambots*/
    var emailRegex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;/*Regex (HTML5)*/
    var first = document.getElementById('first').value;
    var last = document.getElementById('last').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var zip = document.getElementById('zip').value;
    var checkbox = document.getElementById('checkbox');

    
			   /*Main Validation*/
    if ((letters.test(first) == false) || first.length < 2) { 
            $('#data-vdtn-first').fadeIn(500);
            $('#data-vdtn-first').addClass('invalid');
            $('#first').addClass('invalid-input');
        } else if ((letters.test(last) == false) || last.length < 2) {
            $('#data-vdtn-last').fadeIn(500);
            $('#data-vdtn-last').addClass('invalid');
            $('#last').addClass('invalid-input');
        } else if (emailRegex.test(email) == false) {
			$('#data-vdtn-email').fadeIn(500);
            $('#data-vdtn-email').addClass('invalid');
            $('#email').addClass('invalid-input');
		} else if (phone.length >= 15) {
			$('#data-vdtn-phone').fadeIn(500);
            $('#data-vdtn-phone').addClass('invalid');
            $('#phone').addClass('invalid-input');
        } else if (zip.length !== 5) {
            $('#data-vdtn-zip').fadeIn(500);
            $('#data-vdtn-zip').addClass('invalid');
            $('#zip').addClass('invalid-input');
        } else if (checkbox.checked == false){
            $('#data-vdtn-checkbox').fadeIn(500);
            $('#data-vdtn-checkbox').addClass('invalid');
            $('#checkbox').addClass('invalid-input');
        } else {
                
                /*Ajax Data, sent to wp-admin/admini-ajax.php controllers, which then execute my send_email() function in the functions.php file*/
                
                jQuery.ajax({
                    type: 'POST',
                    url: theAjaxData.ajaxurl, /*(Check out my footer.php file for more clarification about this object.) */                
                    data: {
                        first: first,
                        last: last,
                        zip: zip,
                        email: email,
                        phone: phone,
                        action: 'send_email'
                    },
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
        };
 
});