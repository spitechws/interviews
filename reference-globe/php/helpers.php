<?php 

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