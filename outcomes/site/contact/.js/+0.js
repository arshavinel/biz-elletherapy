(function () { // formular angajator
    var $container = $('#section--letter');

    $container.find('[type="submit"]').on('click', function (event) {
        event.preventDefault();

        $container.find('[form-error], [data-response="require"]').css("opacity", 0);

        var $form = new Form($container.find('form')[0]);

        $.ajax({
            url:        Web.url('site.ajax.contact'),
            type:       'POST',
            dataType:   'JSON',
            data:       $form.serialize({
                form_token: Form.token('form')
            })
        })
        .done(function (json) {
            $form.response(json);
            $form.syncValues();

            if ($form.invalid()) {
                $form.syncErrors(function (element, error) {
                    $(element).html(error).animate({opacity: 1});
                });
            }
            else {
                $form.empty();
                $($container).find('[data-response="require"]').html($form.value('message')).animate({opacity: 1});
            }
        });
    });
})();
