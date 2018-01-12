function menuActive($controller) {
    var ul = $('ul.navbar-nav');
    $(ul).find('a[href*="' + $controller +'"]').parent('li').addClass('active');
}
