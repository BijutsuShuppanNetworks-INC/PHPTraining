<?php
require_once( '../conf/AppConf.php');

if($_GET['action'] == 'input01'){
    model_input01($libSmarty);
    $libSmarty->display('index.tpl');
}

if($_GET['action'] == 'stamp1'){
    model_stamp1($libSmarty);
    $libSmarty->display('stamp1.tpl');
}

if($_GET['action'] == 'stamp2'){
    model_stamp2($libSmarty);
    $libSmarty->display('stamp2.tpl');
}



function model_input01($libSmarty){
    $libSmarty->assign('name', 'Suzuki');
    $libSmarty->assign('url', 'http://www.my-domain.com/');
    // 連想配列を生成
    $itemsList = array(23 => array('no' => 2456, 'label' => 'Alpha'),
                   96 => array('no' => 4889, 'label' => 'Bravo')
                   );
    $libSmarty->assign('items', $itemsList);

    return true;
}

/**
* stamp1 スタンプ管理情報入力
*/
function model_stamp1($libSmarty){
    $dir_name = session_id();
    mkdir( "../tmp/files/".$dir_name );
    $libSmarty->assign('sessionId', $dir_name);
    return true;
}

/**
* stamp2 スタンプ登録
*/
function model_stamp2($libSmarty){

    return true;
}


