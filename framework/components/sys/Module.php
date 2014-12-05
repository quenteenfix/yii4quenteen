<?php
class Module extends CWebModule{
    public function init(){
        $this->setHttpCache();
    }

    /**
     * 强制刷新缓存，防止运营商劫持
     * @Description:
     * @Title: setHttpCache
     * @author Quenteen || qintao ; hi：qintao870314 ;
     * @date 2014-11-19 下午11:10:34
     */
    private function setHttpCache(){
        if (G::$param['route']['c'] !== 'file') {
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: no-cache, must-revalidate');
            header('Pramga: no-cache');
        }
    }
}