$(document).ready(function () {
    var navbar = $("nav.navbar");

    function showArrowsDown () {
        $('.arrows-down-animated').addClass('show');
    }

    var timeout = setTimeout(showArrowsDown, 5000);

    function windowScrolled () {
        // header
        if ($(window).scrollTop() > 0 || ['site.legal.terms', 'site.legal.privacy', 'site.legal.cookies'].includes(Web.key())) {
            $(navbar).addClass('fixed');
            $(navbar).find("img.header-top").addClass('d-none');
            $(navbar).find("img.header-fixed").removeClass('d-none');
        }
        else {
            $(navbar).removeClass('fixed');
            $(navbar).find("img.header-top").removeClass('d-none');
            $(navbar).find("img.header-fixed").addClass('d-none');
        }

        // ArrowsDown
        if ($(window).scrollTop() < 50) {
            if (timeout == null) {
                var timeout = setTimeout(showArrowsDown, 5000);
            }
        }
        else if ($(window).scrollTop() > 200) {
            clearTimeout(timeout);
            timeout = null;
            $('.arrows-down-animated').removeClass('show');
        }
    }

    windowScrolled(); // on ready

    $(document).on('scroll', windowScrolled);
});

$(function () {
    $("nav.navbar .navbar-toggler").on('click', function () {
        $('html').toggleClass('mobile-menu-visible');
    });

    $.ajaxSetup({
        error: function (response) {
            if (response.status == 401 || response.status == 403) {
                location.reload();
            }
        }
    });
});
