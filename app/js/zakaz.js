jQuery(function ($) {
    
    var zakaz = {
        message: null,
        
        init_zakaz: function () {
            $('#zakazPhone, #zakazName').focus(function(){
                $(this).removeClass("is-invalid");
            });
        	$('#send-zakaz').click(function (e) {
        		e.preventDefault();
                
                if (zakaz.validate()) {
                    //alert("ok!");
                    
						$.ajax({
							url: '/txt/sendmail/',
							data: $('#zakazform').serialize() + '&action=send',
							type: 'post',
							cache: false,
							dataType: 'json',
                            beforeSend : function () {
                                $( e.target ).text("Идет отправка...");
                            },
                            complete : function () {
                                $( e.target ).text("Отправить заявку");
                            },
							success: function (data) {
								
                                if(data["success"]){
                                    $('#zakaz-success').show().html(data["msg"]);
                                    $('#zakazform input').val("");
                                    $('#zakaz-error').hide();
								}else{
                                	$('#zakaz-error').show().html(data["msg"]);
                                    $('#zakaz-success').hide();
                                }
							},	
                            error: zakaz.error    
						});
                        
                    
                }else{
                    
                    zakaz.showError()
                        
                }
                
                
            });
        },
        
        error: function (xhr) {
			alert(xhr.statusText);
		},
        
        validate: function () {
			zakaz.message = '';
            var phone = $('#zakazPhone');
            var name = $('#zakazName');

            if (!$.trim(phone.val())){
                phone.addClass("is-invalid");
				zakaz.message += 'Нет телефона<br> ';
            }
            if (!$.trim(name.val())){
                name.addClass("is-invalid");
                zakaz.message += 'Не введенно имя<br> ';
            }
            

			if (zakaz.message.length > 0) {
				return false;
			}
			else {
				return true;
			}
		},
        
        showError: function () {
            $('#zakaz-success').hide();
            $('#zakaz-error').show().html(zakaz.message);
		}
        
    };
    
    zakaz.init_zakaz();
});