<?php /* Smarty version Smarty-3.1.19, created on 2014-12-02 00:02:46
         compiled from "D:\stu_crowd\workspace\yii\webroot\template\smarty\main\index.html" */ ?>
<?php /*%%SmartyHeaderCode:4609546cd2d5dabd28-26920517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aec059a02557530eccfc650157a62fa1ba3d2b66' => 
    array (
      0 => 'D:\\stu_crowd\\workspace\\yii\\webroot\\template\\smarty\\main\\index.html',
      1 => 1417449171,
      2 => 'file',
    ),
    'c0337fe5ca1e4d710c18367b5ead1f17cb390100' => 
    array (
      0 => 'D:\\stu_crowd\\workspace\\yii\\webroot\\template\\smarty\\widget\\layout\\base.html',
      1 => 1417449765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4609546cd2d5dabd28-26920517',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_546cd2d5dea533_14919459',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'widgets_css' => 0,
    'css' => 0,
    'BASE_URL_MODULE' => 0,
    'BASE_DIR_MODULE' => 0,
    'widgets_js' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546cd2d5dea533_14919459')) {function content_546cd2d5dea533_14919459($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\stu_crowd\\workspace\\yii\\framework\\components\\third\\smarty3\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html id="ng-app" ng-app="crowdtest">

<?php if (isset($_smarty_tpl->tpl_vars['widgets_css'])) {$_smarty_tpl->tpl_vars['widgets_css'] = clone $_smarty_tpl->tpl_vars['widgets_css'];
$_smarty_tpl->tpl_vars['widgets_css']->value = array(); $_smarty_tpl->tpl_vars['widgets_css']->nocache = null; $_smarty_tpl->tpl_vars['widgets_css']->scope = 3;
} else $_smarty_tpl->tpl_vars['widgets_css'] = new Smarty_variable(array(), null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['widgets_css'] = clone $_smarty_tpl->tpl_vars['widgets_css']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['widgets_css'] = clone $_smarty_tpl->tpl_vars['widgets_css'];?>
<?php if (isset($_smarty_tpl->tpl_vars['widgets_js'])) {$_smarty_tpl->tpl_vars['widgets_js'] = clone $_smarty_tpl->tpl_vars['widgets_js'];
$_smarty_tpl->tpl_vars['widgets_js']->value = array(); $_smarty_tpl->tpl_vars['widgets_js']->nocache = null; $_smarty_tpl->tpl_vars['widgets_js']->scope = 3;
} else $_smarty_tpl->tpl_vars['widgets_js'] = new Smarty_variable(array(), null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['widgets_js'] = clone $_smarty_tpl->tpl_vars['widgets_js']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['widgets_js'] = clone $_smarty_tpl->tpl_vars['widgets_js'];?>

<?php $_smarty_tpl->_capture_stack[0][] = array("main_body", null, null); ob_start(); ?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <head>
        <meta charset="utf-8">
        <title>百度众测平台</title>
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="乐园">
        <meta name="description" content="乐园">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="black" name="apple-mobile-web-app-status-bar-style" />
        <meta content="telephone=no" name="format-detection">
        <link rel="shortcut icon" href="http://www.baidu.com/favicon.ico">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/a.css" rel="stylesheet">
        <link href="/assests/css/mobile/layout.css" rel="stylesheet">
        <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
        <script src="/assests/js/mobase.js"></script>
        
        <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['widgets_css']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['css']->value;?>
<?php } ?>
    </head>
    <body>
    <?php echo Smarty::$_smarty_vars['capture']['main_body'];?>

    
    <div class="footer">
        <p>
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
crowdtest/help/contact" target="_blank">问题反馈</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <a href="http://test.baidu.com/about.html" target="_blank">关于众测</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
crowdtest/help/friendSite" target="_blank">友情链接</a>
        </p>
        <p>
            &copy;<?php echo smarty_modifier_date_format(time(),"%Y");?>
 Baidu&nbsp;&nbsp;&nbsp;&nbsp;
            <a target="_blank" href="http://www.miibeian.gov.cn">京ICP证030173号</a>
        </p>
	</div>
    
    
        
        <!--[if lt IE 8]><script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
crowdtest/js/json3.min.js"></script><![endif]-->
        <!--[if lte IE 8]><script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
crowdtest/js/IE9.js"></script><![endif]-->
        <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
crowdtest/js/sea.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
crowdtest/js/seajs_config.js?v=20141121"></script>
        <script>
            
            var base_url = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
';
            var base_url_module = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL_MODULE']->value;?>
';
            var base_dir_module = '<?php echo $_smarty_tpl->tpl_vars['BASE_DIR_MODULE']->value;?>
';
            var yii_csrf_token = '<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo Yii::app()->request->csrfToken;<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
';
        </script>
    
    <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['widgets_js']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['js']->value;?>
<?php } ?>
    
    <script>var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fee067321f257787b74d66558f6cd5733' type='text/javascript'%3E%3C/script%3E"));</script>
    </body>
</html>
<?php }} ?>
