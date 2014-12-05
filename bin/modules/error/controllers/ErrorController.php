<?php

class ErrorController extends Controller {

    public function actionError(){
        echo 'Hello Jessy!';
        $this->smarty3->display('main/index.html');
    }
}

