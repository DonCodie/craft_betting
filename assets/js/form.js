$(document).ready(function () {

    // variables
    let $input = $('input');
    let $eye = $('.form__item-password');
    let $formConnexion = $('.form__choice-connexion');
    let $formCreate = $('.form__choice-create');

    // open popin on focusin
    $input.on('focusin', function () {
        $(this).parent().find('label').addClass('active');
    });
    // open popin on focusout
    $input.on('focusout', function () {
        if (!this.value) {
            $(this).parent().find('label').removeClass('active');
        }
    });

    // input reset on email click
    $('input#registration_email, input#email_login').click(function () {
        $(this).val('');
    });

    // change input type password on eye click
    $eye.on('click', function () {
        let $source = $(this).find('img').attr('src');
        if ($source === '/build/header/eye.png') {
            $(this).find('img').attr('src', '/build/header/eye2.png');
            $(this).parent('.form__item').find('.form__item-input').prop('type', 'text').focus();
        } else {
            $(this).find('img').attr('src', '/build/header/eye.png');
            $(this).parent('.form__item').find('.form__item-input').prop('type', 'password').focus();
        }
    });

    // display form login
    $formConnexion.on('click', function () {
        $('.form__login').css('display', 'block');
        $('.form__register').css('display', 'none');
    });
// display form register
    $formCreate.on('click', function () {
        $('.form__register').css('display', 'block');
        $('.form__login').css('display', 'none');
    });
});