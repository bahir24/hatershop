<?php

    

    use view\BaseView;
    use view\ExtendedView;
    

    ini_set('display_errors', 1);
    error_reporting(E_ALL); 

    define('ROOT', __DIR__.'/app');

    spl_autoload_register(function (string $className) {
        require_once ROOT . '/' . str_replace('\\', '/', $className) . '.php';
    });

    $staticPage = new ExtendedView;
    $staticPage->pageRender();