// Scroll Top
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(500);
        } else {
            $('#return-to-top').fadeOut(500);
        
        }
    });

    $('#return-to-top').click(function () {
        $('body,html').animate({
            scrollTop : 0
         }, 500);
    });
});
