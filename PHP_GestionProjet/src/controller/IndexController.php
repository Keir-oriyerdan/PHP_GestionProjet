<?php

namespace Madmax\Skrrr\controller;

use Madmax\Skrrr\app\AbstractController;

class IndexController extends AbstractController{

    public function index()
    {
        $this->render('index.php',[]);
    }
}