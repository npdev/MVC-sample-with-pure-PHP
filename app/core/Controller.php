<?php

namespace app\core;

class Controller {

    public $template = 'template.php';
    public $css = array();
    public $js = array();
    public $year = false;
    public $years = array();
    public $defaultYear = '2015';
    public $allPages = array();
    public $model;
    public $DIR = __DIR__;

    public function __construct($page) {
        $this->DIR = substr_replace($this->DIR, '', -9);
        $this->model = new Model();
        $this->allPages = $this->model->ALL_PAGES;
        $page = $page . '.php';
        if (empty($page) or ! $this->model->isPage($page)) {
            $page = 'index';
        }
        $this->allPages[$page] = '<strong>' . $this->allPages[$page] . '</strong>';
    }

    public function actionIndex() {
        return $this->render('index.php');
    }

    public function actionPage($page) {
        return $this->render($page . '.php');
    }

    public function actionContact() {
        $this->addCss('/app/contact/css/style.css');
        return $this->render('contact.php');
    }

    public function actionGallery() {
        $model = new Model();
        $this->years = $model->getYears();
        if (($this->year = $_GET['y']) and in_array($this->year, $this->years)) {
            $this->years[$this->year] = '<strong>' . $this->year . '</strong>';
        } else {
            $this->year = $this->defaultYear;
            $this->years[$this->year] = '<strong>' . $this->year . '</strong>';
        }
        $this->addCss('/app/superbox/css/style.css');
        $this->addJs('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        $this->addJs('/app/superbox/js/superbox.js');

        return $this->render('gallery.php');
    }

    public function render($page) {
        $page = $this->DIR.'/app/views/' . $page;
        return include($this->DIR.'/app/views/' . $this->template);
    }

    public function addCss($cssPath) {
        $this->css[] = '<link href="' . $cssPath . '" rel="stylesheet" type="text/css">';
    }

    public function addJs($jsPath) {
        $this->js[] = '<script src="' . $jsPath . '"></script>';
    }
    public function action404(){
        return $this->render('404.php');
    }

}
