$(function () {
    $("input[data-type='number']").AutoFormatNumber({
        tooltip: {
            min: "Valoarea minima este [min]",
            max: "Valoarea maxima este [max]"
        },
        precision: 0
    });

    $("button[type='submit'][name='submit']").on("click", function () {
        $("input[data-type='number']").AutoFormatNumber('off');
    });
});

/**
    * Librarie editata de Vali, dupa libraria online maskNumber, incepand cu data de 04-07-2019.
    * Libraria originala avea listener-ul pe keyup(). Acum el este pe keydown(), iar performanta a crescut semnificativ.
    * In momentul, cel putin, scrierii acestor randuri nu exista alta librarie de formatare numere/monede care sa permita toate aceste lucruri:
        - stabilire numar de zecimale (la initializare, cu html tag sau prin tag-ul clasic 'step');
        - formatare campuri si la load page;
        - (in|de)crementare din scroll (pe :focus) si sagetile up-down;
        - daca nu-i cifra inainte de separatorul de zecimale sa fie pus un 0 default;
        - salt, peste caracterul decimal si caracterele de separare a miilor, la folosirea sagetilor left-right;
        - repozitionarea carot-ului in dreptul cifrei adaugate sau cifrei sterse;
        - stabilire valoarea minima si valoare maxima si mesaj in tooltip-ul, de bootstrap, integrat;
        - stabilire durata afisare tooltip (default: 1000 ms);
        - formatarea numarului din tooltip cu aceleasi reguli;
        - cod scurt si ~usor de inteles;

    Bugs:
        - carot-ul nu este mereu repozitionat bine la stergere si adaugare de cifra.
*/
!function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : a(jQuery || Zepto)
}
(function(a) {
    function fn_attrs (el) {
        var attrs = {};
        $.each(el.attributes, function() {
            if ((this.name).startsWith("fn-"))
            attrs[(this.name).substring(3)] = this.value;
        });
        return attrs;
    }
    // Cleans the value of any non-digit.
    function c (value, precision) {
        return ('0'.repeat(precision + 1) + value.replace(/\D/g, '')).replace(new RegExp("^0+(?=\\d{"+ (precision + 1) +"})", 'g'), '');
    }
    // Puts decimal separator.
    function d (input, precision, decimal) {
        return input.replace(new RegExp("(\\d{"+ precision +"})$"), decimal + "$1")
    }
    // Puts thousands separator.
    function e (input, thousands, precision) {
        var c = (input.length - 3) / 3;
        for (var d = 0; d < c; d++)
        input = input.replace(new RegExp("(\\d+)(\\d{3}.*\\d{"+ precision +"})"), "$1" + thousands + "$2");

        return input;
    }
    // Returns the real number.
    function f (value, precision) {
        return parseFloat(value.replace(new RegExp("(\\d{"+ precision +"})$"), ".$1"));
    }

    function adjust_carot (config, number, carot_position, action) {
        // first delimiter position
        var fdp = number.indexOf(config['decimal']);
        if (fdp < 1) {
            fdp = number.indexOf(config['thousands']);
        }

        if (action == "removal") {
            carot_position -= (fdp == 1 ? 2 : 1);
        }
        else if (action == "adding") {
            carot_position += (4 % fdp) + 1;
        }

        return carot_position;
    }

    var tooltipInterval;

    function b (input, value, conf, position, loadtime = false) {
        value = c(value, conf['precision']);

        // increase input value with one single smallest unit
        if (position != 0) {
            value = (Math.max(0, parseInt(value) + parseInt(position > 0 ? '+1' : '-1'))).toString();
            value = "0".repeat(Math.max(0, conf['precision'] - value.length + 1)) + value;
        }

        var floated_number = f(value, conf['precision']);

        if (floated_number < conf['min']) {
            $(input).attr('data-original-title', conf['tooltip-min']);
            $(input).tooltip('show');

            if (!loadtime) {
                if (f(c(input.value, conf['precision']), conf['precision']) >= conf['min']) {
                    clearInterval(tooltipInterval);
                    tooltipInterval = setInterval(function () {
                        $(input).tooltip('hide');
                    }, conf['tooltip-visible']);
                }
                return;
            }
        }
        else if (floated_number > conf['max']) {
            $(input).attr('data-original-title', conf['tooltip-max']);
            $(input).tooltip('show');

            if (!loadtime) {
                if (f(c(input.value, conf['precision']), conf['precision']) <= conf['max']) {
                    clearInterval(tooltipInterval);
                    tooltipInterval = setInterval(function () {
                        $(input).tooltip('hide');
                    }, conf['tooltip-visible']);
                }
                return;
            }
        }
        else if (!loadtime) {
            $(input).tooltip('hide');
        }

        if (conf['precision'] > 0)
            value = d(value, conf['precision'], conf['decimal']);

        input.value = e(value, conf['thousands'], conf['precision']);
    }

    a.fn.AutoFormatNumber = function (conf) {
        if (typeof conf == "string") {
            if (conf == "off") {
                $(this).off('keydown');

                this.each(function () {
                    let value = this.value;

                    this.value = value.replace(new RegExp("\\"+ this.config['thousands'], 'g'), '').replace(new RegExp("\\"+ this.config['decimal'], 'g'), '.');
                });
            }
            return this;
        }

        conf["thousands"]           = conf["thousands"]             || '.';
        conf["decimal"]             = conf["decimal"]               || ',';
        conf["min"]                 = conf["min"]                   || Number.MIN_SAFE_INTEGER;
        conf["max"]                 = conf["max"]                   || Number.MAX_SAFE_INTEGER;
        conf["tooltip-placement"]   = conf["tooltip"]['placement']  || 'top';
        conf["tooltip-min"]         = conf["tooltip"]['min']        || '';
        conf["tooltip-max"]         = conf["tooltip"]['max']        || '';
        conf["tooltip-visible"]     = conf["tooltip"]['visible']    || 1000;

        $(this).tooltip({
            trigger: 'manual',
            placement: conf['tooltip-placement']
        });

        this.each(function () {
            $(this).attr("autocomplete", "off");

            var attrs = fn_attrs(this);
            attrs['precision'] = (attrs['precision'] || ($(this).attr('step') ? ((($(this).attr('step')).match(/\d/g)).length - 1) : conf['precision']));
            this.config = $.extend({}, conf, attrs);

            if (typeof this.config['min'] == 'string') {
                let decimals = (this.config['min']).match(/\.(\d+)/);
                let precision = (decimals ? decimals[1].length : 0);

                let min = c(this.config['min'], precision);

                if (precision > 0)
                    min = d(min, precision, this.config['decimal']);

                this.config['tooltip-min'] = this.config['tooltip-min'].replace("[min]", e(min, this.config['thousands'], precision));
            }
            if (typeof this.config['max'] == 'string') {
                let decimals = (this.config['max']).match(/\.(\d+)/);
                let precision = (decimals ? decimals[1].length : 0);

                let max = c(this.config['max'], precision);

                if (precision > 0)
                    max = d(max, precision, this.config['decimal']);

                this.config['tooltip-max'] = this.config['tooltip-max'].replace("[max]", e(max, this.config['thousands'], precision));
            }

            this.config.precision           = parseInt(this.config.precision);
            this.config.min                 = parseFloat(this.config.min);
            this.config.max                 = parseFloat(this.config.max);
            this.config['tooltip-visible']  = parseInt(this.config['tooltip-visible']);

            if (this.config.precision > 0) {
                let decimals = (this.value).match(/\.(\d+)/);

                if (decimals == null) {
                    this.value += ('.' + '0'.repeat(this.config.precision));
                }
                else {
                    this.value += '0'.repeat(Math.max(0, this.config.precision - decimals[1].length));
                }
            }

            b(this, this.value, this.config, 0, true);
        });

        $(this).on('keydown', function (event) {
            event.preventDefault();

            var carot_position = parseInt($(this).prop('selectionStart'));

            if (event.key != 'ArrowLeft' && event.key != 'ArrowRight') {
                if (!isNaN(event.key) || event.key == "Backspace" || event.key == 'ArrowUp' || event.key == 'ArrowDown') {
                    let old_value = this.value;
                    let value = this.value;

                    if (event.key == "Backspace") {
                        if (carot_position > 0 && !isNaN(value.charAt(carot_position - 1)))
                            value = value.slice(0, carot_position - 1) + value.slice(carot_position);
                    }
                    else if (!isNaN(event.key)) {
                        value = value.substring(0, carot_position) + event.key + value.substring(carot_position);
                    }

                    b(this, value, this.config, (event.key == 'ArrowUp' ? 1 : (event.key == 'ArrowDown' ? -1 : 0)));

                    carot_position = adjust_carot(
                        this.config,
                        old_value,
                        carot_position,
                        (old_value.length < this.value.length ? 'adding' : (old_value.length > this.value.length ? 'removal' : ''))
                    );
                }
            }
            else {
                if (event.key == 'ArrowRight') {
                    carot_position += 1;
                    let char = this.value.charAt(carot_position - 1);

                    if (char == this.config['thousands'] || char == this.config['decimal']) {
                        carot_position += 1;
                    }
                }
                else if (carot_position > 0) {
                    if (event.key == 'ArrowLeft') {
                        carot_position -= 1;
                    }
                    let char = this.value.charAt(carot_position - 1);
                    if (char == this.config['thousands'] || char == this.config['decimal']) {
                        carot_position -= 1;
                    }
                }
            }

            $(this).prop({
                selectionStart: carot_position,
                selectionEnd:   carot_position
            });
        });
        $(this).filter(function(){
            return (typeof $(this).attr('disabled') == 'undefined');
        }).on('mousewheel', function(e) {
            if ($(this).is(":focus")) {
                e.preventDefault();

                var carot_position = $(this).prop('selectionStart');
                var old_value = this.value;

                b(this, this.value, this.config, e.originalEvent.wheelDelta);

                carot_position = adjust_carot(
                    this.config,
                    old_value,
                    carot_position,
                    (old_value.length < this.value.length ? 'adding' : (old_value.length > this.value.length ? 'removal' : ''))
                );

                $(this).prop({
                    selectionStart: carot_position,
                    selectionEnd:   carot_position
                });
            }
        });

        return this;
    }
});
