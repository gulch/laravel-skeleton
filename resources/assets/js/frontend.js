/* --- Show/hide password in registration form --- */
function showOrHidePassword($elem, $isOn) {
    var $pwd_input = $elem.closest('.field').find('input[name="password"], input[name="new_password"]');
    if ($pwd_input.length > 0) {
        if ($isOn) {
            $pwd_input.attr('type', 'text');
        } else {
            $pwd_input.attr('type', 'password');
        }
    }
}

$(document).ready(function () {

    /* --- Show/hide password button in registration form --- */
    $('.show-pwd-btn').on('mousedown', function () {
        showOrHidePassword($(this), true);
    });
    $('.show-pwd-btn').on('mouseup', function () {
        showOrHidePassword($(this), false);
    });
    $('.show-pwd-btn').on('mouseleave', function () {
        showOrHidePassword($(this), false);
    });
});