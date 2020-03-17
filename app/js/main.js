//= ../../node_modules/jquery/dist/jquery.js
//= ../../node_modules/popper.js/dist/umd/popper.js
//= ../../node_modules/bootstrap/dist/js/bootstrap.js
//= ../../node_modules/@fortawesome/fontawesome-free/js/solid.js
//= ../../node_modules/@fortawesome/fontawesome-free/js/brands.js
//= ../../node_modules/@fortawesome/fontawesome-free/js/fontawesome.js
//= ../../node_modules/slick-carousel/slick/slick.js
//= control-modal-b4.js
//= auth-modal.js
//= phone-modal.js
//= jquery.slicknav.min.js


// $(document).on("scroll",function(){
//     var screen = 992;
//     var windowWidth;
//     windowWidth = $(window).width();
//     if($(document).scrollTop()>100){
//         $("header").removeClass("large").addClass("small");
//         if ((windowWidth < screen)) {
//             $(".phone").slideUp("slow");
//         }
//     } else{
//         $("header").removeClass("small").addClass("large");
//         if ((windowWidth < screen)) {
//             $(".phone").slideDown();
//         }
//     }
// });

$(document).ready(function(){

    $('.slick').slick({
        dots: true,
        arrows: true,
        nextArrow: '<div class="prev-slick"><i class="fas fa-angle-left"></i></div>',
        prevArrow: '<div class="next-slick"><i class="fas fa-angle-right"></i></div>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false

                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false

                }
            }
        ]
    });
// mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
        menu.slicknav({
            prependTo: ".mobile_menu",
            closedSymbol: '+',
            openedSymbol:'-'
        });
    };

    $( "table" ).addClass( "table table-hover table-bordered" );



    $('.reply-div').on('click','.reply',function(e){
        e.preventDefault();
        var commentID = $(this).closest('.media-box').attr('id').replace('com', '');
        var form = $('#form-comment');
        $(this).parent('div').after(form)
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
        $("#form_loader").addClass("form_loading");
        $.post("add_comment.php", $("#comment_form").serialize() + '&action=send',function(data) {
            if ($(data).find('div').css('background-color')=='rgb(53, 53, 53)'){
                $('#respond').parents('div[id*="comment"]:first').append(data);
            }else{
                $('#respond').before(data);
            }
        }).complete(function(){
            $("#form_loader").removeClass("form_loading");
        });

    });


});

//TOP Menu Sticky
$(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
        $("#sticky-header").removeClass("sticky");
        $('#back-top').fadeIn(500);
    } else {
        $("#sticky-header").addClass("sticky");
        $('#back-top').fadeIn(500);
    }
});
