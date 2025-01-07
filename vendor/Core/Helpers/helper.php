<?php

function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function h($str)
{
    return htmlspecialchars($str);
}

function redirect_to($path, $parameter = '')
{
    header("Location: {$path}{$parameter}");
    die;
}

// CamelCase
function upperCamelCase($str)
{
    return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
}

// camelCase
function lowerCamelCase($str)  
{
    return lcfirst(upperCamelCase($str));
}