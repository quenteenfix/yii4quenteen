<?php
/**
 * 工厂模式：获取单例对象
 * @Description:
 * @ClassName: Factory
 * @author Quenteen || qintao ; hi：qintao870314 ;
 * @date 2014-10-23 上午01:44:59
 */
class Factory{
    private static $instance;

    private $class_cache;

    public static function getInstance($controller = null){
        if(!self::$instance){
            self::$instance = new Factory($controller);
        }

        return self::$instance;
    }

    public function isObject($name){
        return isset($this->class_cache[$name]) ? true : false;
    }

    public function getClass($name){
        if(!isset($this->class_cache[$name])){
            $root_managers_path = DIR_BIN . '/';

            //只遍历managers第一层和其第一级子目录的的manager类，注:更多层次的manager则无法访问
            $manager_arr = glob($root_managers_path . 'managers/*', GLOB_ONLYDIR);

            $manager_arr = $manager_arr ? $manager_arr : array();
            $manager_arr[] = $root_managers_path. 'managers';

            $flag = false;
            $class_name = ucfirst($name) . 'Manager';
            foreach($manager_arr as $key => $val){
                $path = $val;
                $file = $path . '/' . $class_name . '.php';
                if(file_exists($file)){
                    $flag = true;
                    break;
                }
            }

            if($flag){
                //先 获取 TestManager.php 的类
                require_once($file);

                $this->class_cache[$name] = new $class_name;
            }else if(file_exists($file = DIR_FW_COMPONENT . "third/{$name}.php")){
                //否则去 framework底下的 components 去找组件
                require_once($file);

                //同时查找配置文件，并引入配置文件
                $conf_file = DIR_CONF . "components/{$name}.php";

                if(file_exists($conf_file)){
                    $conf = require_once($conf_file);
                    G::merge($conf);
                }

                $this->class_cache[$name] = new $name;
            }

            if(isset($this->class_cache[$name]))
            {
                $this->$name = $this->class_cache[$name];
                return $this->$name;
            }else{
                throw new CHttpException(404, 'unknown manager');
            }
        }
    }


}
