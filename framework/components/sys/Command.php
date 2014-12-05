<?php
/**
 * 通用command父类
 * @Description:
 * @ClassName: Command
 * @author Quenteen || qintao ; hi：qintao870314 ;
 * @date 2014-11-19 下午11:01:20
 */
abstract class Command extends CConsoleCommand{
    public function __construct($name, $runner){
        parent::__construct($name, $runner);
    }

    //定义魔术方法 - 可利用单例模式 获取 manager类：使用方式： $this->oper->method()
    public function __get($name){
        $factory = Factory::getInstance($this);

        $this->$name = $factory->getClass($name);

        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }
}