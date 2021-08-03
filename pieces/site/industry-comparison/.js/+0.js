$(document).ready(function () {
    var arshpiece = $('.arshpiece.site.industry-comparison');

    $(arshpiece).find('a[data-toggle="collapse"]').on('click', function () {
        var button = $(this);

        setTimeout(function () {
            $(button).find('.comparison--industry-read-text').toggleClass('d-none');
        }, 300);
    });
});
