//Set the width of photo-wrapper
var photo_wrapper_width = 0;
var right_margin = 10;
var moving_distance = 0;
$(window).load(function () {
    $('.photo-wrapper').find('img').each(function () {
        photo_wrapper_width += ( $(this).width() + right_margin );
    })
    $('.photo-wrapper').width(photo_wrapper_width + 5);
    moving_distance = photo_wrapper_width - $('.clipper').width() - right_margin;
});


//Slide Slider
function move_right() {
    $('.photo-wrapper').animate({
        left: -moving_distance
    }, 500);
    $('.icon-go-left').removeClass('disabled');
}

function move_left() {
    $('.photo-wrapper').animate({
        left: 0
    }, 500);
    $('.icon-go-right').removeClass('disabled');
}

$('.icon-go-right').click(function () {
    move_right();
    $(this).addClass('disabled');
});

$('.icon-go-left').click(function () {
    move_left();
    $(this).addClass('disabled');
});