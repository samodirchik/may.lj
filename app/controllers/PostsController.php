<?php

namespace controllers;

use core\AbstractController;

class PostsController extends AbstractController {

    public function index() {
        $this->view->render('posts_index_view');
    }

}
