<?php /* Smarty version Smarty-3.1.16, created on 2014-03-13 14:30:18
         compiled from "/var/www/html/dcal.bnw-dev.info/app/views/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8636425125321426a3a0347-30557395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc52df9b53b323e2cb3de36af695df3b3c53ddf8' => 
    array (
      0 => '/var/www/html/dcal.bnw-dev.info/app/views/index.tpl',
      1 => 1394688199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8636425125321426a3a0347-30557395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'url' => 0,
    'items' => 0,
    'myId' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5321426a3f14b9_63172688',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5321426a3f14b9_63172688')) {function content_5321426a3f14b9_63172688($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/dcal.bnw-dev.info/app/libs/Smarty-3.1.16/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>SmartySample</title>
</head>
<body>
<?php echo '/*%%SmartyNocache:8636425125321426a3a0347-30557395%%*/<?php $_smarty_tpl->smarty->loadPlugin(\'Smarty_Internal_Debug\'); Smarty_Internal_Debug::display_debug($_smarty_tpl); ?>/*/%%SmartyNocache:8636425125321426a3a0347-30557395%%*/';?>

	<p>Smartyタグ表示確認</p>
	名前：<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

	<br>
	URL:
	<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
</a>
	<br>
	日付：<?php echo smarty_modifier_date_format(time(),"%Y年%m月%d日");?>

	<br>

	<ul>
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['myId']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['i']->value['no'];?>
: <?php echo $_smarty_tpl->tpl_vars['i']->value['label'];?>
</li>
	<?php } ?>
	</ul>

</body>
</html><?php }} ?>
