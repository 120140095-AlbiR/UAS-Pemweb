<?php
// cookies.php
function setCookieValue($name, $value, $expire) {
    setcookie($name, $value, time() + $expire, "/");
}

function getCookieValue($name) {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}

function deleteCookie($name) {
    setcookie($name, "", time() - 3600, "/");
}
?>