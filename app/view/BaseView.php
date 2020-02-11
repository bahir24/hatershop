<?php

namespace view;

class BaseView
{
    public $pageTemplate = '
        <!DOCTYPE html>
            <html>
                {(head)}
                <body>
                    {(header)}
                    {(section)}
                    {(footer)}
                    <script src="source/jquery/DevjQuery3.4.1.js"></script>
                    <script src="source/bootstrap/bootstrap.bundle.min.js"></script>
                    <script src="app/js/main.js"></script>                
                </body>
            </html>';

    public function pageRender()
    {
        $this->collectElements();
        $arrSearch = ['{(head)}', '{(header)}', '{(section)}', '{(footer)}'];
        $arrReplace = [$this->head, $this->header, $this->section, $this->footer];
        echo $this->insertEntities($arrSearch, $arrReplace, $this->pageTemplate);
    }

    public function insertEntities($arrSearch, $arrReplace, $element){        
        return str_replace($arrSearch, $arrReplace, $element);
    }

    public function collectElements(){
        $this->header = $this->insertEntities('{(nav)}', $this->nav, $this->header);        
    }
    
    public $header = '
        <header class="mb-4">            
            {(nav)}          
        </header>';

    public $section = '
        <section></section>';    

    public $footer = '
        <footer>            
            <nav class="navbar navbar-footer navbar-dark bg-dark p-0 p-lg-2">
                <div class="container">
                    <h2 class="footer-text d-none d-lg-block">Qui ipsum ad aliquip tempor non nulla amet Lorem mollit.</h2>
                </div>
            </nav>            
        </footer>';

    public $head = '
        <head>
            <meta name="viewport" content="width=device-width", initial-scale="1.0">
            <title>Document</title>
            <link rel="stylesheet" href="app/css/main.css">
        </head>';

    public $logo = '
        <head>
            <meta name="viewport" content="width=device-width", initial-scale="1.0">
            <title>Document</title>
            <link rel="stylesheet" href="app/css/main.css">
        </head>';

    public $nav = '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="logo navbar-brand" href="#">
                    <img class="img-fluid rounded mx-auto d-block" src="app/img/logo.jpg">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>          
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Gallery</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>';
}
