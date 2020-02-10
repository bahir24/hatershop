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
        <header>
            
                {(nav)}
            </div>            
        </header>';

    public $section = '
        <section>
            <div class="container">
                <div class="card mb-3">
                    <img src="app/img/night.jpg" class="card-img-top day-time-img" alt="night">
                    <div class="card-body">
                    <h5 class="card-title">Ночное небо</h5>
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">Dolor amet enim excepteur mollit nisi. Et non nisi pariatur qui magna quis magna mollit.</p>
                        <footer class="blockquote-footer">Так говорил Великий<cite title="Название источника">Имя Великого</cite></footer>
                    </blockquote>                    
                    </div>
                </div>

                <div class="row d-flex flex-wrap">
                    <div class="col-12 col-sm-6 col-lg-4 order-0 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="app/img/evening_event.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Куда пойти вечером</h5>
                                <p class="card-text d-none d-sm-block">Adipisicing anim fugiat est voluptate sint labore sunt.</p>
                                <a href="#" class="btn btn-primary">Читать</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 order-2 order-lg-1">
                        <div class="card mb-lg-5">
                            <div class="card-body">
                                <h5 class="card-title">Часы</h5>
                                <p class="card-text d-none d-sm-block">Здесь будет время</p>                               
                            </div>
                            <div class="card-footer text-muted">14:33</div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Дата</h5>
                                <p class="card-text d-none d-sm-block">Здесь будет дата</p>
                            </div>
                            <div class="card-footer text-muted">10 февраля, понедельник</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 order-1 order-lg-2">
                        <div class="card w-100">
                            <img class="card-img-top" src="app/img/zver1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Что-то про животных</h5>
                                <p class="card-text d-none d-sm-block">Exercitation cupidatat magna aliquip nostrud.</p>
                                <a href="#" class="btn btn-primary">Смотреть</a>
                            </div>
                        </div>
                    </div>
                </div>
                    
                
                
            </div>
        </section>
    ';

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
