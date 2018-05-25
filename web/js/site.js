function menuActive($controller) {
    var ul = $('ul.navbar-nav');
    $(ul).find('a[href*="' + $controller + '"]').parent('li').addClass('active');
}

var pager = $('ul.pagination');
var pagination = $('#pagination');
$(pager).appendTo(pagination);

$(document).ready(function () {
    var height = $('.page-content').height();

    if (height < 800) {
        $('footer').addClass('f-bottom');
    }

    if ($('#login').length) {
        $('body').css({'background-image': 'url(../images/site/login-image-01.jpg)', 'background-size': 'cover'});
    }

    if ($('#register').length) {
        $('body').css({
            'background-image': 'url(../images/site/login-image-02.jpg)',
            'background-size': 'cover',
            'background-repeat': 'no-repeat',
            'background-position': 'center'
        });
    }

});
