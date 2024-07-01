<?php

spl_autoload_register(function ($class) {
    require_once __DIR__ . '/' . strtolower($class) . '.php';
});
require_once __DIR__ . '/helpers.php';
