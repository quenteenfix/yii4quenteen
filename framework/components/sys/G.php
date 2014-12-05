<?php
class G extends CApplicationComponent{
    public static $param;

    /**
     * merge参数的操作，让G能访问所有的初始化参数
     * @Description:
     * @Title: merge
     * @param unknown_type $param
     * @author Quenteen || qintao ; hi：qintao870314 ;
     * @date 2014-7-9 下午09:49:49
     */
    public static function merge($param){
        self::$param = array_merge((array)self::$param, (array)$param);
    }
}