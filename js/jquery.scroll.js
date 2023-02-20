// anchor in page
$(window).bind('load', function () {
    "use strict";
    $(function () {
        $('a[href^="#"]').click(function () {
            if ($($(this).attr('href')).length) {
                var p = $($(this).attr('href')).offset();
                if ($(window).width() > 750) {
                    $('html,body').animate({ scrollTop: p.top - 120 }, 400);
                } else {
                    $('html,body').animate({ scrollTop: p.top - 80 }, 400);
                }
            }
            return false;
        });
    });
});
// anchor top page #
$(window).bind('load', function () {
    "use strict";
    var hash = location.hash;
    if (hash) {
        var p1 = $(hash).offset();
        if ($(window).width() > 750) {
            $('html,body').animate({ scrollTop: p1.top - 120 }, 400);
        } else {
            $('html,body').animate({ scrollTop: p1.top - 80 }, 400);
        }
    }
});

// =========== END - ANCHOR LINK ============

//BACK TO TOP
$(document).ready(function () {
    "use strict";
    $('.to-top-button').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });
});
$(window).bind('load scroll', function () {
    "use strict";
    if ($(this).scrollTop() >= 500) {
        $('.to-top').addClass('show');
        $('#box-contact-mobi').css('display', 'flex');
    } else {
        $('.to-top').removeClass('show');
        $('#box-contact-mobi').css('display', 'none');
    }
});