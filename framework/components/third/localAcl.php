<?php
/**
 * 权限验证体系
 * @Description:
 * @ClassName: LocalAcl
 * @author Quenteen || qintao ; hi：qintao870314 ;
 * @date 2014-11-19 下午11:22:52
 */
class LocalAcl{
    public $host = "test.baidu.com";

    public function check($module, $controller, $action, $user) {

        $keys = array(strtolower($module), strtolower($controller), strtolower($action));

        $root = G::$param["LOCAL_ACL_RULES"];

        foreach ($keys as $key) {
            if (isset($root[$key])) {
                if (is_string($root[$key])) {
                    return $this->{$root[$key]}($user);
                }
                $root = $root[$key];
            } else {
                return false;
            }
        }
        return false;
    }

    public function allow() {
        return true;
    }
    public function deny() {
        return false;
    }
    public function register($user) {
        return isset($user) && (intval($user["role_type"]) !== -1);
    }
    public function admin($user) {
        return isset($user) && (intval($user["role_type"]) > 3);
    }
    public function tpla($user) {
        return isset($user) && (intval($user["role_type"]) === 4);
    }
    public function tplsa($user) {
        return isset($user) && (intval($user["role_type"]) === 5);
    }
    public function sa($user) {
        return isset($user) && (intval($user["role_type"]) === 6);
    }
    public function tplsaandsa($user) {
        return isset($user) && ((intval($user["role_type"]) === 5) || (intval($user["role_type"]) === 6));
    }

}

