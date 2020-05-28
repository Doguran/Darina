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
//= https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js

window.cookieconsent.initialise({
    "palette": {
        "popup": {
            "background": "#fd9700"
        },
        "button": {
            "background": "#ffffff"
        }
    },
    "theme": "classic",
    "content": {
        "message": "Мы используем куки-файлы, чтобы обеспечить Вам максимальное удобство.",
        "dismiss": "Понятно",
        "link": " ",
        "href": "#"
    }
});



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
