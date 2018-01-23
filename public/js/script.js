newFunction();
newFunction2();

function newFunction() {
    $('.profile-brand-nav a').click(function () {
        $('.profile-brand-nav a').removeClass('active');
        $(this).addClass('active');
    });
}

function newFunction() {
    $('.rank-tabs a').click(function () {
        $('.rank-tabs a').removeClass('active');
        $(this).addClass('active');
    });
}