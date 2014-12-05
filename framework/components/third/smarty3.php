<?php
require_once('smarty3/SmartyBC.class.php');

class smarty3 extends SmartyBC {
    public function __construct(array $options=array()) {
        parent::__construct($options);

        spl_autoload_unregister('smartyAutoload');
        Yii::registerAutoloader('smartyAutoload');

        $this->setTemplateDir(DIR_BIN . 'template/smarty/');

        $this->setCompileDir(DIR_TEMP . 'template/compile/smarty3/');
        $this->setConfigDir(DIR_TEMP . 'template/config/smarty3/');
        $this->setCacheDir(DIR_TEMP . 'template/cache/smarty3/');

        $this->caching = G::$param['TPL_CACHE'];
        //$this->force_compile = true;

        $this->left_delimiter = '{';
        $this->right_delimiter = '}';

        if($_SERVER['HTTP_HOST']){
            $base = Yii::app()->getRequest()->getBaseUrl(true);

            $this->assign('BASE_URL', $base . '/');
            $this->assign('BASE_URL_MODULE', $base . '/' . G::$param['route']['m'] . '/');
            $this->assign('BASE_DIR_MODULE', $base . '/' . G::$param['route']['m'] . '/');
        }
    }
}
