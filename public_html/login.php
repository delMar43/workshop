<?php
include "tools.php";

if (isset($_POST["record"])) {
    $postData = $_POST["record"];
    $username = trim($postData["username"]);
    $password = trim($postData["password"]);
} else {
    echo "<div>missing credentials</div>";
    returnError();
    return;
}

if ($username == 'martin' && $password == '45484549') {
    session_regenerate_id();
    session_start();
    $_SESSION['__user_name__'] = $username;
    echo logoutButton();
} else {
    echo "<div>wrong credentials</div>";
    returnError();
}

function returnError()
{
    global $username, $password;

    header("HTTP/1.1 401 Unauthorized");
    echo '<div>access denied</div>';
}