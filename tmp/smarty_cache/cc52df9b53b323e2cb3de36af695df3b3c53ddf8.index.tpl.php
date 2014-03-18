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
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5321701c549643_98890249',
  'has_nocache_code' => true,
  'cache_lifetime' => 60,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5321701c549643_98890249')) {function content_5321701c549643_98890249($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>SmartySample</title>
</head>
<body>
<?php $_smarty_tpl->smarty->loadPlugin('Smarty_Internal_Debug'); Smarty_Internal_Debug::display_debug($_smarty_tpl); ?>
	<p>Smartyタグ表示確認</p>
	名前：Suzuki
	<br>
	URL:
	<a href="http://www.my-domain.com/">http://www.my-domain.com/</a>
	<br>
	日付：2014年03月13日
	<br>

	<ul>
			<li>23: 2456: Alpha</li>
			<li>96: 4889: Bravo</li>
		</ul>

</body>
</html><?php }} ?>
