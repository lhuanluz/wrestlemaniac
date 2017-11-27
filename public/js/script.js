newFunction();

function newFunction() {
    $('.profile-brand-nav a').click(function () {
        $('.profile-brand-nav a').removeClass('active');
        $(this).addClass('active');
    });
}
