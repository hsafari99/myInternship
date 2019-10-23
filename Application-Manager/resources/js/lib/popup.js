/**
 * Pop up a modal window in the browswe with some information.
 */
window.popup = function(json)
{
    $('#popup-title').html(ucfirst(json.code));
    $('#popup-content').html(json.msg+'<br><br>'+json.e);

    $("#popup").modal('show');
}