<?php

require __DIR__ . '/vendor/autoload.php';


$list = \Src\Routes::getRouteList(__DIR__ . '/Src/Controllers');

print_r(iterator_to_array($list));


