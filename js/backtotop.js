$(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 450) $('#goTop').fadeIn();
        else $('#goTop').fadeOut(1000);
    });
    
    $('#goTop').click(function () {
        $('body,html').animate({scrollTop: 0}, 300);
    });
});