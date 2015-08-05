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