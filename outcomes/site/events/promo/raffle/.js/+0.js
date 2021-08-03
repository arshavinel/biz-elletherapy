(function () {
    // form
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
                $(form.dom).find('[data-response="message"]').animate({opacity: 1});

                var confirmation = $(form.dom).find('[confirmation]');
                confirmation.fadeOut(0);
                confirmation.find('[field="name"]').html(json.values.name);
                confirmation.fadeIn(200);

                if (confirmation.attr('confirmation') == 'generate' && json.values.email) {
                    $('#user-content--join-form').fadeOut(200);

                    setTimeout(function () {
                        $('#user-content--join-expired').fadeIn(200);
                    }, 200);
                }
            }

            setTimeout(function () {
                trigger.prop('disabled', false).removeClass('progress-bar-striped progress-bar-animated hovered');
            }, 500);
        });
    });
})();
