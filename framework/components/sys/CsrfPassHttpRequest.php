<?php

class CsrfPassHttpRequest extends CHttpRequest {

    public $exceptionRoute = array(
        'smart',
        'admin' => array(),
    );

    public $csrfHttpHeaderTokenName = 'HTTP_X_YII_CSRF_TOKEN';

    private function isInCsrfException($m, $c, $a) {
        if(in_array($m, $this->exceptionRoute, true)) {
            return true;
        } elseif($this->exceptionRoute[$m] && is_array($this->exceptionRoute[$m])) {
            if (in_array($c, $this->exceptionRoute[$m], true)) {
                return true;
            } elseif ($this->exceptionRoute[$m][$c] && is_array($this->exceptionRoute[$m][$c])) {
                if (in_array($a, $this->exceptionRoute[$m][$c], true)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function validateCsrfToken($event) {
        if($this->isInCsrfException(strtolower(G::$param['route']['m']),
        strtolower(G::$param['route']['c']),
        strtolower(G::$param['route']['a']))) {
            return true;
        }

        if(isset($_SERVER[$this->csrfHttpHeaderTokenName]) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
            $_POST[$this->csrfTokenName] = $_SERVER[$this->csrfHttpHeaderTokenName];
        }

        return parent::validateCsrfToken($event);
    }
}


