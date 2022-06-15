<?php
function is_valid_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}

function is_valid_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}