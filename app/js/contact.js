jQuery(function ($) {
    
    var contact = {
        message: null,
        
        init_contact: function () {
            $('#inputText, #inputEmail, #inputName').focus(function(){
                $(this).removeClass("is-invalid");
            });
        	$('#send').click(function (e) {
        		e.preventDefault();
                
                if (contact.validate()) {
                    //alert("ok!");
                    
						$.ajax({
							url: '/txt/sendmail/',
							data: $('#contactform').serialize() + '&action=send',
							type: 'post',
							cache: false,
							dataType: 'json',
                            beforeSend : function () {
                                $( e.target ).text("Идет отправка...");
                            },
                            complete : function () {
                                $( e.target ).text("Отправить");
                            },
							success: function (data) {
								
                                if(data["success"]){
                                    $('#contact-success').show().html(data["msg"]);
                                    $('#contactform input,#contactform textarea').val("");
                                    $('#contact-error').hide();
								}else{
                                	$('#contact-error').show().html(data["msg"]);
                                    $('#contact-success').hide();
                                }
							},	
                            error: contact.error    
						});
                        
                    
                }else{
                    
                    contact.showError()
                        
                }
                
                
            });
        },
        
        error: function (xhr) {
			alert(xhr.statusText);
		},
        
        validate: function () {
			contact.message = '';
            var textarea = $('#inputText');
            var mail = $('#inputEmail');
            var name = $('#inputName');

			var email = mail.val();
			if (!email) {
                mail.addClass("is-invalid");
				contact.message += 'Нет электропочты<br> ';
            }
			else {
				if (!contact.validateEmail(email)) {
                    mail.addClass("is-invalid");
					contact.message += 'Некорректный Email<br> ';
				}
			}
            if (!$.trim(name.val())){
                name.addClass("is-invalid");
                contact.message += 'Не введенно имя<br> ';
            }

			if (!$.trim(textarea.val())){
                textarea.addClass("is-invalid");
				contact.message += 'Не введенно сообщение<br> ';
			}
            

			if (contact.message.length > 0) {
				return false;
			}
			else {
				return true;
			}
		},
        
        validateEmail: function (email) {
			var at = email.lastIndexOf("@");

			// Make sure the at (@) sybmol exists and  
			// it is not the first or last character
			if (at < 1 || (at + 1) === email.length)
				return false;

			// Make sure there aren't multiple periods together
			if (/(\.{2,})/.test(email))
				return false;

			// Break up the local and domain portions
			var local = email.substring(0, at);
			var domain = email.substring(at + 1);

			// Check lengths
			if (local.length < 1 || local.length > 64 || domain.length < 4 || domain.length > 255)
				return false;

			// Make sure local and domain don't start with or end with a period
			if (/(^\.|\.$)/.test(local) || /(^\.|\.$)/.test(domain))
				return false;

			// Check for quoted-string addresses
			// Since almost anything is allowed in a quoted-string address,
			// we're just going to let them go through
			if (!/^"(.+)"$/.test(local)) {
				// It's a dot-string address...check for valid characters
				if (!/^[-a-zA-Z0-9!#$%*\/?|^{}`~&'+=_\.]*$/.test(local))
					return false;
			}

			// Make sure domain contains only valid characters and at least one period
			if (!/^[-a-zA-Z0-9\.]*$/.test(domain) || domain.indexOf(".") === -1)
				return false;	

			return true;
		},
        
        showError: function () {
            $('#contact-success').hide();
            $('#contact-error').show().html(contact.message);
		}
        
    };
    
    contact.init_contact();
});