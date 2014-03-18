<?php
// 定数定義
define('APP_DIR', '/var/www/html/dcal.bnw-dev.info/app');
define('SMARTY_DIR', APP_DIR.'/libs/Smarty-3.1.16/libs/');

require_once(SMARTY_DIR . 'Smarty.class.php');

// Smartyオブジェクトの生成
$libSmarty = new Smarty;
// Smartyの設定
$libSmarty->compile_check      = true;
$libSmarty->template_dir       = APP_DIR . '/views/';
$libSmarty->compile_dir        = APP_DIR . '/tmp/smarty_templates_c/';
$libSmarty->config_dir         = APP_DIR . '/tmp/smarty_configs/';
// Smarty Cacheの設定
$libSmarty->caching            = true;
$libSmarty->cache_dir          = APP_DIR . '/tmp/smarty_cache/';
$libSmarty->cache_lifetime     = 60;

