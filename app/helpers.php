<?php

function isActiveNav(...$routes)
{
    foreach ($routes as $route) {
        if (strpos(request()->route()->getName(), $route) === 0) {
            return true;
        }
    }

    return false;
}