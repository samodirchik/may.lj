<?php


namespace controllers;

use core\AbstractController;
use mysqli;
use core\Route;
use models\AuthModel;

class NewsController extends AbstractController{
    public function index() {
        if (AuthModel::haveAuthNews()) {
            Route::redirect(url('/'));
        }
        $this->view->render('news_index_view');
    }
}
