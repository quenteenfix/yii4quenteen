<?php
class Init{
    public $key;

    public function init(){
        $cmd_argv = $_SERVER['argv'];

        //如果不是command模式，则设置route
        if(!isset($cmd_argv) || count($cmd_argv) <= 0 || strstr($cmd_argv[0], "XDEBUG_SESSION")){
            $this->setRoute();
        }

        $this->setDir();
        $this->setModule();

        //设置command模式的参数
        if(isset($cmd_argv) && count($cmd_argv) > 0 && strstr($cmd_argv, "XDEBUG_SESSION") === false){
            $this->setCmd();
        }

    }

    //设置全局的route：module/controll/action
    public function setRoute(){
        $url_route = Yii::app()->urlManager->parseUrl(Yii::app()->getRequest());

        if(!$url_route){
            $url_route = Yii::app()->defaultController . '/index';
        }

        //controller下的子目录，兼容访问子目录的路径，如果有子目录的话，需要在这里注册
        //小心有坑 -_- 先别管这个
        $dir_target_arr = array('i', 'm', 'n', 'o', 'x');
        $dir_target_arr = array();

        $url_route_arr = explode('/', $url_route);

        //module
        $module = $url_route_arr[0];

        if(in_array($url_route_arr[1], $dir_target_arr)){
            $dir = $url_route_arr[1];
            $controll = $url_route_arr[2];
            $action = $url_route_arr[3];
        }else{
            $dir = '';
            $controll = $url_route_arr[1];
            $action = $url_route_arr[2];
        }

        $route = array();

        $route['m'] = $module;
        $route['d'] = $dir;
        $route['c'] = $controll;
        $route['a'] = $action;

        G::$param['route'] = $route;
    }

    //设置全局的文件路径
    public function setDir(){
        define('DIR_CONF', DIR_ROOT . '/conf/');

    }

    //扩展：手动增加module - 其实不通用：modulePath其实是唯一的!
    public function setModule(){
        //Yii::app()->setModulePath($value);
        Yii::app()->setModules('i');
    }

    public function setCmd(){
        $cmd_argv = $_SERVER['argv'][1];
        $module = Yii::app()->getModulePath() . '/' . $cmd_argv;
        if(!is_dir($module)){
            die("\nUnknown module: {$cmd_argv}\n\n");
        }

        G::$param['route'] = array('m' => $cmd_argv);
    }
}