<?php
/**
 * 通用controller父类
 * @Description:
 * @ClassName: Controller
 * @author Quenteen || qintao ; hi：qintao870314 ;
 * @date 2014-11-19 下午11:01:40
 */
class Controller extends CController{
    //定义魔术方法 - 可利用单例模式 获取 manager类：使用方式： $this->oper->method()
    public function __get($name){
        $factory = Factory::getInstance($this);

        $this->$name = $factory->getClass($name);

        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function beforeAction($action){
        $this->initController($this->getRoute());

        return true;
    }

    public function afterAction($action){

    }

    public function initController($route){
        if(get_magic_quotes_gpc()){
            $this->filter($_GET);
            $this->filter($_POST);
            $this->filter($_COOKIE);
            $this->filter($_REQUEST);
        }
    }

    private function filter($input){
        if(is_array($input)){
            while(list($k, $v) = each($input)){
                if(is_array($input[$k])){
                    while(list($k2, $v2) = each($input[$k])){
                        $input[$k][$k2] = stripslashes($v2);
                    }
                    @reset($input[$k]);
                }else{
                    $input[$k] = stripslashes($v);
                }
            }
            @reset($input);
        }
    }
}