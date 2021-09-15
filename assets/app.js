/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */



// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';


const $ = require('jquery');

// You can specify which plugins you need
//import 'bootstrap';
import {Tooltip, Toast, Popover} from 'bootstrap';


// start the Stimulus application
//import './bootstrap';

require('bootstrap');

window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');


$(function () {

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })


    // Select QR size
    var $vCardForm = $('#vcard_form');
    if ($vCardForm.length > 0) {

        function VoucherSourcetoPrint(source) {
            return "<html><head><script>function step1(){\n" +
                    "setTimeout('step2()', 10);}\n" +
                    "function step2(){window.print();window.close()}\n" +
                    "</scri" + "pt></head><body onload='step1()'>\n" +
                    "<img src='" + source + "' /></body></html>";
        }
        function VoucherPrint(source) {
            var Pagelink = "about:blank";
            var pwa = window.open(Pagelink, "_new");
            pwa.document.open();
            pwa.document.write(VoucherSourcetoPrint(source));
            pwa.document.close();
        }


        $('#vcard_form_size button').on('click', function () {
            var qrSize = Number($(this).text());
            $('#v_card_form_size').val(qrSize);
        });

        $vCardForm.on('submit', (e) => {
            var $qrResultBlock = $('#qr_result');

            $qrResultBlock.html('<div class="spinner-border loader" role="status"></div>');

            e.preventDefault();
            $.ajax({
                url: "/",
                type: 'POST',
                dataType: 'json',
                data: $vCardForm.serialize(),
                success: (response) => {
                    $qrResultBlock.parent().find('.loader').addClass('d-none');
                    $qrResultBlock.html(
                            '<img src="'+ response.qr +'">' +
                            '   <div class="qr-result-btns d-flex justify-content-center">\n' +
                            '                <button type="button" class="btn btn-primary" id="qr_resutl_print">Печать</button>\n' +
                            '                <a href="'+ response.qr +'" type="button" class="ms-2 btn btn-primary" download>Скачать</a>\n' +
                            '            </div>\n'
                    );
                }
            })
        });

        $('body').on('click', '#qr_resutl_print', function () {

           var imageSource = $('#qr_result img').attr('src');
            VoucherPrint(imageSource);
        });
    }





});


