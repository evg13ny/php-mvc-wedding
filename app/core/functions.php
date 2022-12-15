<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str)
{
    return htmlspecialchars($str);
}

function redirect($path)
{
    header("Location: " . ROOT . "/" . $path);
    die;
}

function old_value($key, $default = "")
{
    return empty($_POST[$key]) ? $default : $_POST[$key];
}

function user($key = "")
{
    if (!empty($_SESSION["USER"])) {
        if (empty($key)) {
            return $_SESSION["USER"];
        }

        if (!empty($_SESSION["USER"]->$key)) {
            return $_SESSION["USER"]->$key;
        }
    }

    return "";
}

function get_image($filename = "")
{
    if (file_exists($filename)) return ROOT . "/" . $filename;

    return ROOT . "/assets/img/placeholder.jpg";
}
