<?php
$username = trim($_POST['username']);
$password = trim($_POST['password']);

if ($username == 'martin' && $password == '45484549') {
    $_SESSION['__user_name__'] = $username;
    echo 'logged in';
} else {
    echo 'access denied';
}
