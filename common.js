// Load bootstrap tooltips
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
// Load navbar and footer
$(function () {
    $("#navigation-bar").load("nav.html");
    $("#foot").load("foot.html");
})