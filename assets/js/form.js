let $input = $('input');
let $eye = $('.form__item-password');

$input.on('focusin', function () {
    $(this).parent().find('label').addClass('active');
});

$input.on('focusout', function () {
    if (!this.value) {
        $(this).parent().find('label').removeClass('active');
    }
});

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
