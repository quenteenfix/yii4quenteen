<?php
class Init{
    public $key;

    /**
     * 一个模块的验证条件是在其模块下，有conf/*.php 的文件，否则，不会被识别为模块
     * @Description:
     * @Title: init
     * @author Quenteen || qintao ; hi：qintao870314 ;
     * @date 2014-11-19 下午09:42:02
     */
    public function init(){
        $cmd_argv = $_SERVER['argv'];

        //如果不是command模式，则设置route
        if(!isset($cmd_argv) || count($cmd_argv) <= 0 || strstr($cmd_argv[0], "XDEBUG_SESSION")){
            $this->setRoute();
        }

        $this->setDir();
        $this->setModulePath();
        $this->setModule();

        //设置command模式的参数
        if(isset($cmd_argv) && count($cmd_argv) > 0 && strstr($cmd_argv, "XDEBUG_SESSION") === false){
            $this->setCmd();
        }else{
            $this->session();
            //记录所有log信息
            //Yii::app()->attachEventHandler('onEndRequest', array($this, 'commonLog'));
        }

        //setCmd 已经将module的路径更正，所以初始化操作可以统一进行
        $this->initBeforeModule();

        //设置数据库插件
        $this->setDb();
    }


    //设置全局的route：module/controll/action
    public function setRoute(){
        $url_route = Yii::app()->urlManager->parseUrl(Yii::app()->getRequest());

        if(!$url_route){
            $url_route = Yii::app()->defaultController . '/index';
        }

        //controller下的子目录，兼容访问子目录的路径，如果有子目录的话，需要在这里注册
        //小心有坑 -_- 先别管这个 - 确保三级目录是可以被访问到的
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
        define('DIR_BIN', DIR_ROOT . 'bin/');

        define('DIR_FW_YII', DIR_ROOT . 'framework/yii/');
        define('DIR_FW_COMPONENT', DIR_ROOT . 'framework/components/');

        define('DIR_MODULE_BASE', DIR_BIN . 'modules/');

        define('DIR_CONF', DIR_BIN . 'conf/');
        define('DIR_DATA', DIR_BIN . 'data/');
        define('DIR_TEMP', DIR_BIN . 'temp/');
    }

    public function setModulePath(){
        //还不清楚 module_path是做什么用的？

        //改变默认modules的路径，默认是找到 modules文件夹，所以这里不做修改
        Yii::App()->setModulePath(DIR_MODULE_BASE);
    }

    //扩展：手动增加module - 其实不通用：modulePath其实是唯一的!
    public function setModule(){
        $module = glob(DIR_BIN . '*', GLOB_ONLYDIR);

        $result = array();
        foreach((array)$module as $key => $val){
            $result[] = basename($val);
        }

        if($result){
            Yii::app()->setModules($result);
        }
    }

    public function session(){
        session_cache_limiter('private, must-revalidate');
    }

    public function setCmd(){
        $cmd_argv = $_SERVER['argv'][1];

        $module = Yii::app()->getModulePath() . '/' . $cmd_argv;

        if(!is_dir($module)){
            die("\nUnknown module: {$cmd_argv}\n");
        }

        G::$param['route'] = array('m' => $cmd_argv);

        for($i = 1; $i < $_SERVER['argc']; $i++){
            if($i == $_SERVER['argc'] - 1){
                $_SERVER['argc']--;
                unset($_SERVER['argv'][$i]);
                break;
            }
            $_SERVER['argv'][$i] = $_SERVER['argv'][$i + 1];
        }

        Yii::App()->setBasePath($module);
    }

    public function initBeforeModule(){
        $module_name = G::$param['route']['m'];
        define('DIR_MODULE', DIR_MODULE_BASE . $module_name . '/');

        define('DIR_MODULE_DATA', DIR_DATA . $module_name . '/');
        define('DIR_MODULE_TEMP', DIR_TEMP . $module_name . '/');

        $temp = array();

        $conf_file = glob(DIR_MODULE . 'conf/*.php');

        if($conf_file === false){
            throw new CHttpException(404, 'unknown module config');
        }

        foreach($conf_file as $key => $val){
            $conf_target = require_once($val);

            if(is_array($conf_target)){
                $temp = array_merge($temp, $conf_target);
            }
        }

        //合并配置文件
        G::merge(array(G::$param['route']['m'] => $temp));
    }

    public function setDb(){
        $db_name_arr = array(
            'db',
            //'db_slave',
        );

        $db = array();
        foreach($db_name_arr as $key => $val){
            $db_name = $val;
            $db_conf_path = DIR_CONF . "sys/{$db_name}.php";

            $db_conf = require_once($db_conf_path);


            $db[$db_name] = $this->getDb($db_conf);

        }

        Yii::app()->setComponents($db);
    }

    public function getDb($db_config){
        $module = G::$param['route']['m'];

        if(YII_DEBUG === true && isset($db_config['offline'])){
            $db_info = $db_config['offline'];
        }else{
            $db_info = $db_config['online'];
        }

        return $db_info;
    }
}