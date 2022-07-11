<?php
require_once(dirname(__FILE__, 2) . '/config.php');

session_unset();
session_destroy();
header("Location: ../");
