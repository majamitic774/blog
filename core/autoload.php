<?php

spl_autoload_register(function ($class) {
    var_dump(__DIR__ . '/' . strtolower($class) . '.php');
    require_once __DIR__ . '/' . strtolower($class) . '.php';
});
require_once __DIR__ . '/helpers.php';
