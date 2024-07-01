<?php

function redirectIfNotSet($param, $location)
{
    if (!isset($param)) {
        header("Location: $location");
        exit();
    }
}
