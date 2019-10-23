/**
 * Calls the right toggle function according to type.
 * 
 * @param {*} button 
 * @param {*} targetId 
 * @param {*} type 
 */
window.toggle = function(button, targetId, type = null)
{
    targetId = '#'+targetId;

    switch(type) {

        case 'password':
            protoPassword(button, targetId);
            break;
            
        case 'check':
            protoCheck(button, targetId);
            break;

        default:
            protoToggle(button, targetId);
    }
}

/**
 * PROTOS
 *****************************************************************/

/**
 * Toggles a regular button.
 * 
 * @param {*} button 
 * @param {*} targetId 
 */
function protoToggle(button, targetId)
{
    $(button).children().toggle();
    $(targetId).toggle();
}

/**
 * Toggles a checkbox.
 * 
 * @param {*} button 
 * @param {*} targetId 
 */
function protoCheck(button, targetId)
{
    $(button).children().toggle();
    $(targetId).attr('checked', !$(targetId).attr('checked'));
}

/**
 * Toggles the password into visible or invisible.
 * 
 * @param {*} button 
 * @param {*} targetId
 */
function protoPassword(button, targetId)
{
    var change =
        ( $(targetId).attr('type') === "password" ) ? 
        "text" : "password";
    $(button).children().toggle();
    $(targetId).attr('type', change);
}