/**
 * Send login information.
 */
window.login = function(errorId)
{
   var callback = function(json)
   {
       if (json.code === 'OK') {
           window.location.href = json.url;
       }
       else {
           $('#'+errorId).html(json.msg);
       }
   }

   ajaxPost("/login", "login", callback);
}

/**
 * Post a form.
 */
window.post = function(button, url, formId)
{
    $(button).children('#l-error').hide();
    $(button).children("#l-done").hide();
    $(button).children('#l-load').removeClass('hide');
    $(button).children('#l-load').addClass('fa-spin');

    var callback = function(json)
    {
        var par1 = json.msg.toString();
        console.log(json.e);
        var par2 = json.e.toString();
        var content = par1 +'\n'+ par2;

        $(button).children('#l-load').addClass('hide');

        if (json.code === "OK") {
            $(button).children('#l-done').show();
        }
        else {
            $(button).children('#l-error').show();
            $('#popup-title').html(json.code);
            $('#popup-content').html(content);
            $('#popup').modal('show');
        }
    }

    ajaxPost(url, formId, callback);
}