<?php

namespace view;

class BaseView {
    public $layOut = ['
        <!DOCTYPE html>
            <html>',
                'head' => '',
                '<body>
                    <h1>TEST</h1>',
                    'header' => '',
                    'footer' => '',
                    '<script src="source/jquery/DevjQuery3.4.1.js"></script>
                    <script src="source/bootstrap/bootstrap.bundle.min.js"></script>
                    <script src="app/js/main.js"></script>                
                </body>
            </html>',
        ];

    public function buildLayOut(){             
        array_map(function($arrKey){
            if (!is_int($arrKey)) {
                $this->layOut[$arrKey] = $this->$arrKey;
            }
        }, array_keys($this->layOut), $this->layOut);

        echo implode($this->layOut);
    }

    public $header = '
        <header>
            <nav>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </nav>
        </header>';

    public $footer = '
        <footer>
            <nav>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </nav>
        </footer>';

    public $head = '
        <head>
            <meta name="viewport" content="width=device-width", initial-scale="1.0">
            <title>Document</title>
            <link rel="stylesheet" href="app/css/main.css">
        </head>';   
}