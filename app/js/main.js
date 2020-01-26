//= ../../node_modules/jquery/dist/jquery.js
//= ../../node_modules/popper.js/dist/umd/popper.js
//= ../../node_modules/bootstrap/dist/js/bootstrap.js
//= ../../node_modules/@fortawesome/fontawesome-free/js/solid.js
//= ../../node_modules/@fortawesome/fontawesome-free/js/fontawesome.js
//= control-modal-b4.js
//= auth-modal.js

$(document).on("scroll",function(){
    var screen = 992;
    var windowWidth;
    windowWidth = $(window).width();
    if($(document).scrollTop()>100){
        $("header").removeClass("large").addClass("small");
        if ((windowWidth < screen)) {
            $(".phone").slideUp("slow");
        }
    } else{
        $("header").removeClass("small").addClass("large");
        if ((windowWidth < screen)) {
            $(".phone").slideDown();
        }
    }
});
