<?php
/*
具体格式是：
‘module’ => array (
      ‘controller’ => array(

            ‘action1’ => ‘allow’, //全部用户可见
            ‘action2’ => ‘register’, //登陆用户可见
            ‘action3’ => ‘admin’, //管理员(所有)权限可见
            ‘action4’ => ‘tpla’, //产品线管理员

            ‘action5’ => ‘tplsa’, // 产品线超级管理员
            ‘action6’ => ‘sa’, //平台超级管理员权限
            ‘action7’ => ‘tplsaandsa’, // 产品线超级管理员与平台超级管理员
            .......
      ),
      ......
  )
 */
return array (
    'LOCAL_ACL_RULES' => array(
        'main' => array(),
        'site' => array(
            'site' => 'allow',
            'error' => array(
                'error' => 'allow',
            ),
        ),
        'user' => 'register',
    ),
);