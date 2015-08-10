<?php
function appIt($theArray, $classname) {
    $result = '';
    for ($idx=0; $idx < $theArray->getSize(); $idx++) {
        $value = $theArray[$idx];
        if (is_null($value)) {
            $result .= $classname::toEmptyXml();
        } else {
            $result .= $value->toXml();
        }
    }
    return $result;
}

function logoutButton()
{
    if (isset($_SESSION['__user_name__'])) {
        return "<button onclick=\"$(this).load('logout.php')\">Logout " . $_SESSION['__user_name__'] . "</button>";
    } else {
        return "Logout";
    }
}