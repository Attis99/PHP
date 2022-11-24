<?php
$array = [5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200'];
foreach ($array as $item) {
    if (is_numeric($item)) {
        echo gettype($item) . " Igen" . "<br>";
    } else {
        echo gettype($item) . " Nem" . "<br>";}
