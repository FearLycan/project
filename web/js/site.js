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

            if (item.type == 'tag') {
                return '<div class="row">' +
                    '<div class="col-4 s-title">' +
                    item.name
                    + '</div>' +
                    '<div class="col-1">' +
                    '<small class="s-small">tag</small>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<a href="/tag/' + item.name + '">wyszukaj</a>'
                    + '</div>'
                    + '</div>';
            }

            if (item.type == 'shop') {
                return '<div class="row">' +
                    '<div class="col-4 s-title">' +
                    item.name
                    + '</div>' +
                    '<div class="col-1">' +
                    '<small class="s-small">sklep</small>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<a href="/shop/' + item.slug + '">zobacz</a>'
                    + '</div>'
                    + '</div>';
            }

            if (item.type == 'item') {
                return '<div class="row">' +
                    '<div class="col-4 s-title">' +
                    title
                    + '</div>' +
                    '<div class="col-1">' +
                    '<small class="s-small">przedmiot</small>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<a href="/item/' + item.id + '/' + item.slug + '">zobacz</a>'
                    + '</div>'
                    + '</div>';
            }


        }
    },
    requestDelay: 300
};

$("#search-input").easyAutocomplete(options);
