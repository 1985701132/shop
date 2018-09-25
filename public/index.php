<?php

define('ROOT',__DIR__.'/../');

require ROOT . "libs/function.php";
/**
 * 类的自动加载
 */

function load($class)
{
    $path = str_replace('\\','/',$class);
    require ROOT.$path.'.php';
}
spl_autoload_register('load');

/**
 * 解析路由
 */

$controller = "\controllers\\IndexController";
$action = "index";

if(isset($_SERVER['PATH_INFO']))
{
    $route = explode("/",$_SERVER['PATH_INFO']);
    $controller = "\controllers\\". ucfirst($route[1])."Controller";
    $action = @$route[2] ? @$route[2] : "index"; 
}

$c = new $controller;
$c->$action();
