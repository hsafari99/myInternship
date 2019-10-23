/**
 * Capitalize the first letter of each word in a string.
 */
window.ucwords = function(str)
{
    var splitStr = str.toString().toLowerCase().split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        splitStr[i] = splitStr[i].charAt(0).toUpperCase()+splitStr[i].substring(1);     
    }
    return splitStr.join(' '); 
}

/**
 * Capitalize only the first letter of a string.
 */
window.ucfirst = function(str)
{
    return str.charAt(0).toUpperCase()+str.slice(1);
}