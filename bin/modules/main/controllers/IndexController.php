<?php

class IndexController extends Controller {

    public function actionIndex(){
        echo 'Hello Jessy!';
        $this->smarty3->display('main/index.html');
    }
}

