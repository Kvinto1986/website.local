$(document).ready(function() {
    var halfText = $('.spoiler').innerHeight() / 10,
        textHeight = $('.spoiler').innerHeight();

    $('.spoiler').css('height', $('.spoiler').innerHeight() / 10);

    $('.show-hide').click(function() {
        $('.spoiler').css('z-index','4');
        if( $('.spoiler').innerHeight() == halfText ) {
            $('.spoiler').animate({ height: textHeight }, 2500);
            $(this).text('Скрыть');

        } else {
            $('.spoiler').animate({ height: halfText }, 2500);
            $(this).text('Показать');
        }
    });
});
$(document).ready(function() {
    var halfText1 = $('.spoiler1').innerHeight() / 10,
        textHeight1 = $('.spoiler1').innerHeight();
    $('.spoiler1').css('height', $('.spoiler1').innerHeight() / 10);

    $('.show-hide1').click(function() {
        if( $('.spoiler1').innerHeight() == halfText1 ) {
            $('.spoiler1').animate({ height: textHeight1 }, 2000);
            $(this).text('Скрыть');
        } else {
            $('.spoiler1').animate({ height: halfText1 }, 2000);
            $(this).text('Скрыть');
        }
    });
});