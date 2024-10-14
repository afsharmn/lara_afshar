import './bootstrap';

$('#menu-button').on('click', function() {
    $('.wrapper').toggleClass('menu-closed');
})
$('#menu-closed-overlay').click(function() {
    $('.wrapper').addClass('menu-closed');
})

if ($(window).width() < 768)
    $('.wrapper').addClass('menu-closed');
