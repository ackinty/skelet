$("[data-toggle=popover_login]").popover({
    html: true,
    content: function() {
          return $('#popover-login').html();
        }
});
$("[data-toggle=popover_login]").on('shown.bs.popover', function () {
    $('.login').focus();
});
// allow to hide popover when clicking outside the popover div
$('body').on('click', function (e) {
    $('[data-toggle="popover_login"]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});
