$(function () {
    $('#search_report').click(function () {
        uni_modal("Search Request Report", "report/search.php");
    });
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink');
    });
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if ($('body').offset.top === 0)
            $('#mainNav').removeClass('navbar-shrink');
    });
});

$('#search-form').submit(function (e) {
    e.preventDefault();
    var sTxt = $('[name="search"]').val();
    if (sTxt !== '')
        location.href = './?p=products&search=' + sTxt;
});
