$(document).ready(function(){



    $('.reply-div').on('click','.reply',function(e){
        e.preventDefault();
        var commentID = $(this).closest('.media-box').attr('id').replace('com', '');
        var form = $('#form-comment');
        $('#comment-message').hide().html('');
        $(this).parent('div').after(form);
        form.fadeOut(0).slideDown(1000);
        $('input[name="comment_parent_ID"]').val(commentID);
        $('.reply-div a').removeClass('cansel-reply').addClass('reply').text('Ответить');
        $('.reply-div.h4 a').text('Оставьте комментарий');
        $(this).removeClass('reply').addClass('cansel-reply').text('Отмена');

    }).on('click','.cansel-reply',function(e) {//при клике на ссылку закрыть форму
        e.preventDefault();
        var form = $('#form-comment');
        $(this).removeClass('cansel-reply').addClass('reply').text('Ответить');
        $('.reply-div.h4 a').text('Оставьте комментарий');
        $('#com0').append(form);
        $('input[name="comment_parent_ID"]').val('0');
        form.hide();

    });
    $('#comment_form').submit(function(eventObject){

        eventObject.preventDefault();
        $("#ajax-loader").show();
        $.post("/comment/add/", $("#comment_form").serialize() + '&action=send',function(data) {

            if (data["success"]) {
                $('#comment-text').val('');
                $('#form-comment').hide();
                $('.reply-div a').removeClass('cansel-reply').addClass('reply').text('Ответить');
                $('.reply-div.h4 a').text('Оставьте комментарий');
                $('#com'+data["parent"]+' > .media-body').append(data["comment"]);
                var destination = $('#com'+data["id"]).offset().top-90;
                $('html,body').animate({ scrollTop: destination}, 1000 );
            } else {
                $('#comment-message').show().html(data["msg"]).slideUp(7000);
            }


        }, 'json').always(function(){
            $("#ajax-loader").hide();
        });

    });


        var delComment = {
            message: null,
            init: function () {
                $('.del-comment').click(function (e) {
                    e.preventDefault();
                    if(confirm('Удалить этот отзыв?')){
                        var href = $(this).attr('href');

                        $.ajax({
                            url: href,
                            type: 'get',
                            cache: false,
                            async: true,
                            dataType: 'json',
                            success: function (data) {
                                if (data["success"]) {

                                    $('#com'+data["id"]).fadeOut();


                                } else {
                                    alert(data["msg"]);
                                }
                            },
                            error: delComment.error
                        })
                    }

                })
            },
            error: function (xhr) {
                alert(xhr.statusText)
            }

        };
        delComment.init()

});