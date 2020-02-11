<?php


namespace view;


use view\BaseView;
use model\MainModel;


class ExtendedView extends BaseView {
    public $model;
    public $mainCard;
    public $eventCard;
    public $animalCard;
    public $nowDate;
    public $nowTime;

    public function __construct(){
        $this->model = new MainModel;
        $this->mainCard = $this->model->mainCard;
        $this->eventCard = $this->model->eventCard;
        $this->animalCard = $this->model->animalCard;
        $this->nowDate = date('d M');
        $this->nowTime = date('h:m');
        $this->nowTimeHours = date('h');
        $this->section = str_replace('<section>', $this->structureOfContent, $this->section);
    }

    public function collectElements(){
        parent::collectElements();
        $this->collectCards();
        $arrReplace = ['{(cardMain)}', '{(cardEvent)}', '{(cardTime)}', '{(cardDate)}', '{(cardAnimals)}'];
        $arrCards = [$this->cardMain, $this->cardEvent, $this->cardTime, $this->cardDate, $this->cardAnimals];
        $this->section = $this->insertEntities($arrReplace, $arrCards, $this->section);
    }

    public function collectCards(){
        $this->nowTimeHours = (int)$this->nowTimeHours;
        $this->getCurrentData();
        $arrMainCardReplace = ['{(mainCard.img)}', '{(mainCard.time)}', '{(mainCard.head)}', '{(mainCard.quote)}', '{(mainCard.autor)}'];
        $arrEventCardReplace = ['{(eventCard.img)}', '{(eventCard.time)}', '{(eventCard.head)}', '{(eventCard.text)}'];
        $arrAnimalsCardReplace = ['{(animalCard.img)}', '{(animalsCard.head)}', '{(animalCard.text)}'];
        $this->cardMain = $this->insertEntities($arrMainCardReplace, $this->mainCardCurrent, $this->cardMain);
        $this->cardEvent = $this->insertEntities($arrEventCardReplace, $this->eventCardCurrent, $this->cardEvent);
        $this->cardAnimals = $this->insertEntities($arrAnimalsCardReplace, $this->animalCardCurrent, $this->cardAnimals);
        $this->cardTime = $this->insertEntities('{(time)}', $this->nowTime, $this->cardTime);
        $this->cardDate = $this->insertEntities('{(date)}', $this->nowDate, $this->cardDate);
    }

    public function getCurrentData(){
        switch(true){
            case $this->nowTimeHours <= 6:
                $this->mainCardCurrent = $this->mainCard[0];
                $this->eventCardCurrent = $this->eventCard[0];                                
                break;
            case $this->nowTimeHours <= 12:
                $this->mainCardCurrent = $this->mainCard[1];
                $this->eventCardCurrent = $this->eventCard[1];                                
                break;
            case $this->nowTimeHours <= 18:
                $this->mainCardCurrent = $this->mainCard[2];
                $this->eventCardCurrent = $this->eventCard[2];                                
                break;
            case $this->nowTimeHours <= 24:
                $this->mainCardCurrent = $this->mainCard[3];
                $this->eventCardCurrent = $this->eventCard[3];                                
                break;
            default:
            $this->mainCardCurrent = $this->mainCard[0];
            $this->eventCardCurrent = $this->eventCard[0];  
        }
        $randomNum = rand(0, 2);
        $this->animalCardCurrent = $this->animalCard[$randomNum];  
    }


    
    public $structureOfContent = '
    <section>
        <div class="container">
            {(cardMain)}
            <div class="row d-flex flex-wrap mb-4">
                <div class="col-12 col-sm-6 col-lg-4 order-0">
                {(cardEvent)}
                </div>
                <div class="col-12 col-lg-5 order-2 order-lg-1">
                {(cardTime)}
                {(cardDate)}
                </div>
                <div class="col-12 col-sm-6 col-lg-3 order-1 order-lg-2">
                {(cardAnimals)}
                </div>
            </div>                                                    
        </div>';

    public $cardMain = '
        <div class="card mb-3">
            <img src="app/img/{(mainCard.img)}" class="card-img-top day-time-img" alt="{(mainCard.time)}">
            <div class="card-body">
                <h5 class="card-title">{(mainCard.head)}</h5>
                <blockquote class="blockquote text-center">
                    <p class="mb-0">{(mainCard.quote)}</p>
                    <footer class="blockquote-footer">Так говорил Великий <cite title="Название источника">{(mainCard.autor)}</cite></footer>
                </blockquote>                    
            </div>
        </div>';

    public $cardEvent = '
        <div class="card h-100">
            <img class="card-img-top" src="app/img/{(eventCard.img)}" alt="{(eventCard.time)}">
            <div class="card-body">
                <h5 class="card-title">{(eventCard.head)}</h5>
                <p class="card-text d-none d-sm-block">{(eventCard.text)}</p>
                <a href="#" class="btn btn-primary">Читать</a>
            </div>
        </div>';

    public $cardTime = '
        <div class="card mb-lg-4">
            <div class="card-body">
                <h5 class="card-title">Часы</h5>
                <p class="card-text d-none d-sm-block">Здесь будет время</p>                               
            </div>
            <div class="card-footer text-muted">{(time)}</div>
        </div>';

    public $cardDate = '
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Дата</h5>
                <p class="card-text d-none d-sm-block">Здесь будет дата</p>
            </div>
            <div class="card-footer text-muted">{(date)}</div>
        </div>
    ';

    public $cardAnimals = '
        <div class="card  h-100 w-100">
            <img class="card-img-top" src="app/img/{(animalCard.img)}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{(animalsCard.head)}</h5>
                <p class="card-text d-none d-sm-block">{(animalCard.text)}</p>
                <a href="#" class="btn btn-primary">Смотреть</a>
            </div>
        </div>';
}