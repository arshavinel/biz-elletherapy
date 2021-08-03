(function () {
    // appointment form
    $("#app form").on('submit', function (event) {
        event.preventDefault();

        var trigger = $(this).find('[type="submit"]');
        trigger.prop('disabled', true).addClass('hovered progress-bar-striped progress-bar-animated');

        var form = new Form(this);

        form.syncErrors(function (element) {
            $(element).css('opacity', '0');
        });
        $(this).find('[data-response="message"]').css('opacity', 0);

        $.ajax({
            url:        $(this).attr('action'),
            type:       'POST',
            dataType:   'JSON',
            data:       form.serialize({
                form_token: Form.token('form')
            })
        })
        .done(function (json) {
            form.response(json);
            form.syncValues();

            if (form.invalid()) {
                form.syncErrors(function (element, error) {
                    $(element).html(error).animate({opacity: 1});
                });
            }
            else {
                form.empty();
                $(form.dom).find('[data-response="message"]').animate({opacity: 1});
            }

            setTimeout(function () {
                trigger.prop('disabled', false).removeClass('progress-bar-striped progress-bar-animated hovered');
            }, 500);
        });
    });
})();
