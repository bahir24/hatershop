<?php

    namespace view;

    use view\BaseView;
    use view\ExtendView;

    define('ROOT', __DIR__.'/app');

    spl_autoload_register(function (string $className) {
        require_once ROOT . '/' . str_replace('\\', '/', $className) . '.php';
    });

    $staticPage = new BaseView;
    $staticPage->BuildLayOut();