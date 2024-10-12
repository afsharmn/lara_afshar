import './bootstrap';

$('#menu-button').on('click', function() {
    $('.wrapper').toggleClass('menu-closed');
})
$('#menu-closed-overlay').click(function() {
    console.log('menu closed');
    $('.wrapper').addClass('menu-closed');
})
