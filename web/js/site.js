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

var options = {
    url: function (phrase) {
        return "/site/json?phrase=" + encodeURIComponent(phrase);
    },
    getValue: function (element) {
        return element.name;
    },
    template: {
        type: "custom",
        method: function (title, item) {

            if(item.type == 'tag'){
                return '<div class="row">' +
                    '<div class="col-2">' +
                    item.name
                    + '</div>' +
                    '<div class="col-2">' +
                    '<a href="/project/web/tag/' + item.name + '">wyszukaj</a>'
                    + '</div>'
                    + '</div>';
            }

            if(item.type == 'shop'){
                return '<div class="row">' +
                    '<div class="col-2">' +
                    item.name
                    + '</div>' +
                    '<div class="col-2">' +
                    '<a href="/project/web/shop/' + item.slug + '">zobacz</a>'
                    + '</div>'
                    + '</div>';
            }

            if(item.type == 'item'){
                return '<div class="row">' +
                    '<div class="col-2">' +
                    title
                    + '</div>' +
                    '<div class="col-2">' +
                    '<a href="/project/web/tag/' + item.name + '">wyszukaj</a>'
                    + '</div>'
                    + '</div>';
            }



        }
    },
    requestDelay: 400
};

$("#search-input").easyAutocomplete(options);
