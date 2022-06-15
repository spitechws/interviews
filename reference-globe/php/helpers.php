<?php 
function is_valid_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}

function is_valid_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function show_alert()
{
    if (!empty($_GET['msg'])) { ?>
        <div class="alert alert-primary"><?php echo $_GET['msg']; ?></div>
<?php
    }
}

function set_selected($left, $right)
{
    if ($left == $right) {
        echo "selected";
    }
}

function invalid_action()
{
    echo "Invalid Activity";
    exit;
}
function debug($data, $is_die = 1)
{
    echo '<pre>';
    print_r($data);
    if($is_die)
    exit;
}