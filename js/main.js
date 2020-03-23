$(document).ready(() => {
    const topDivHeight = $('#top-div').height();
    const navbarHeight = $('.navbar').height();
    $(window).scroll(function() {
        if ($(document).scrollTop() < (topDivHeight + navbarHeight ) && $(document).scrollTop() > navbarHeight) {
            $('.navbar').addClass('transparent');
        } else {
            $('.navbar').removeClass('transparent');
        }
    });
    /*const aboutUsHeight = $('#aboutUs').height();
    $('#poly-div').height(0.35 * aboutUsHeight);*/
});
