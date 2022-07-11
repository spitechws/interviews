<?php

function debug($args, $die = 1)
{
    echo "<pre>";
    print_r($args);
    echo "</pre>";
    if ($die) {
        exit;
    }
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
