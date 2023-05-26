$(document).ready(function () {
    (function () {
        var navmenu = $("#CMSNavbarDropdown #navigation-menu");

        // When clicking a dropdown, close all the others.
        $(navmenu).find("a[data-toggle='collapse']").on('click', function () {
            $(navmenu).find(".collapse.show").not($(this).parents('.collapse')).collapse("hide");
        });

        var linkpage = $(navmenu).find("a:not([data-toggle='collapse']).active");

        // When clicking a dropdown, replace 'active' classes.
        $(linkpage).parentsUntil(navmenu.find('#nm'))
            .on('shown.bs.collapse hidden.bs.collapse', function () {
                // remove existing 'active' class
                linkpage.parentsUntil(navmenu.find('#nm')).prev('a[data-toggle="collapse"].active-parent').removeClass('active');

                // add new 'active' class
                linkpage.closest('.collapse.show > .collapse:not(.show)').prev('a[data-toggle="collapse"].active-parent').addClass('active');
            })
    })();

    $('nav .dropdown-menu form[method="POST"]').on('submit', function () {
        // Consequently, the signed-out status is recorded through a cookie in your domain so that the dead-loop UX is avoided.
        google.accounts.id.disableAutoSelect();
    });

    // Prevent closing dropdown-menu after clicking inside it.
    $('.dropdown-menu').on("click.bs.dropdown", function (event) {
        event.stopPropagation();
    });

    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    /**
     * Temporary overlay.
     *
     * Floating message until page is ready.
     */
    (function () {
        var routes = ['example'];

        let length = routes.length;
        for (let i = 0; i < length; i++) {
            if (Web.key().startsWith('cms.' + routes[i])) {
                $("#app").parent('div').css('position', 'relative').append($("<div>").css({
                    'position': 'absolute',
                    'top':      0,
                    'bottom':   0,
                    'left':     0,
                    'right':    0,
                    'backgroundColor':  'rgba(255, 255, 255, 0.5)',
                    'textAlign':        'center'
                }).append($('<span>').css({
                    'display':          'inline-block',
                    'marginTop':        '90px',
                    'padding':          '20px',
                    'backgroundColor':  'rgba(0, 0, 0, 0.7)',
                    'color':            'white'
                }).addClass('shadow-lg rounded').html("<b>Info:</b> planned for the near future.")));
                break;
            }
        }
    })();

    $.ajaxSetup({
        error: function (response) {
            if (response.status == 401 || response.status == 403) {
                // Consequently, the signed-out status is recorded through a cookie in your domain so that the dead-loop UX is avoided.
                google.accounts.id.disableAutoSelect();

                alert("Expired session. Refresh page and login.");
            }
        }
    });
});
