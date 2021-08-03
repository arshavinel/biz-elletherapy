$(document).ready(function () {
    var arshpiece = $('.arshpiece.site.services');

    $(arshpiece).find('button').on('click', function () {
        var button = $(this);

        $(button).prev('.box').toggleClass('open');

        setTimeout(function () {
            $(button).find('span').toggleClass('d-none');
        }, 500);
    });
});
