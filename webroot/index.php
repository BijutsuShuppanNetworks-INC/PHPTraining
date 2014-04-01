<?php
session_start();
require_once( '../conf/AppConf.php');

switch($_REQUEST['action']){
  case 'input01':
    model_input01($libSmarty);
    $libSmarty->display('index.tpl');
    break;

  case 'stamp1':
    model_stamp1($libSmarty);
    $libSmarty->display('stamp1.tpl');
    break;

  case 'stamp2';
    model_stamp2($libSmarty);
    $libSmarty->display('stamp2.tpl');
    break;

  default:
    model_input01($libSmarty);
    $libSmarty->display('index.tpl');
    break;
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
  $ses_id = session_id();
  $name   = "../tmp/files/".$ses_id;
  mkdir($name);
  chmod($name, 0777);
  $libSmarty->assign('sessionId', $ses_id);
  return true;
}

/**
* stamp2 スタンプ登録
*/
function model_stamp2($libSmarty){
  $ses_id = session_id();
  $libSmarty->assign('sessionId', $ses_id);
  return true;
}


