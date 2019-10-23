/**
 * Send a post request via ajax.
 */
window.ajaxPost = function(url, formId, callback=null)
{
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);

    var data = $('#'+formId).serialize();
    var token = $('meta[name="csrf-token"]').attr('content');
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            //console.log(xhr.responseText);
            var json = JSON.parse(xhr.responseText);
            if (typeof callback === "function") callback(json);
        }
    }

    xhr.send(data);
}

/**
 * Send a get request via ajax.
 */
window.ajaxGet = function(url, json, callback=null)
{
    var xhr = new this.XMLHttpRequest();
    var uri = new this.URLSearchParams(json).toString();
    xhr.open('GET', url+"?"+uri);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            //console.log(xhr.responseText);
            var json = JSON.parse(xhr.responseText);
            if (typeof callback === "function") callback(json);
        }
    }
    
    xhr.send();
}