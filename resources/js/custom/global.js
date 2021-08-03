$(document).ready(function () {
    $.ajaxSetup({
        data: {
            "ajax_token": Form.token('ajax') // will be overwritten if you use FormData.
        }
    });

    (function () {
        // Adding file names at uploading input files.
        $(".custom-file input[type='file'].custom-file-input").on('change', function () {
            var label = $(this).siblings('.custom-file-label');
            if (!label.data('default-text')) {
                label.data('default-text', label.html());

                if (!label.data('files-text')) {
                    label.data('files-text', 'fisiere');
                }
            }

            var length = $(this)[0].files.length;

            if (!length) {
                label.html(label.data('default-text'));
                $(this).closest(".input-group").find(".custom-file-trash").removeClass('text-danger');
            }
            else {
                if (length == 1) {
                    label.html('"'+ $(this)[0].files[0].name +'"');
                }
                else {
                    label.html(length +' '+ label.data('files-text'));
                }

                $(this).closest(".input-group").find(".custom-file-trash").addClass('text-danger');
            }
        });

        // Removing files from input file.
        $(".input-group .custom-file-trash").on('click', function () {
            var input = $(this).closest(".input-group").find(".custom-file").find('input[type="file"]')[0];

            if (input.files.length) {
                $(input).val(null);
                $(input).trigger('change');
                $(this).removeClass('text-danger');
            }
        });
    })();

    if (typeof(jQuery.fancybox) == "object") {
        jQuery.fancybox.defaults.thumbs.autoStart = true;
    }
    if (typeof(tinyMCE) == "object") {
        tinyMCE.baseURL = (Web.site() + 'statics/plugins/tinymce');
        tinymce.suffix = '.min';
    }
});
