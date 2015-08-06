<?php
function checkLogin()
{
    if (empty($_SESSION['__user_name__'])) {
        return false;
    }
    $username = $_SESSION['__user_name__'];

    return !empty($username);
}

session_start();

if (checkLogin()) {
    echo session_id();
} else {
    echo "<button class=\"btn\" onclick=\"w2popup.load({ url: 'loginForm.html'})\">Login</button>";
}