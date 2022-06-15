<?php

function debug($data, $is_die = 1)
{
    echo '<pre>';
    print_r($data);
    if($is_die)
    exit;
}
