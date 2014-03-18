<?php
require_once( '../conf/AppConf.php');

if($_GET['action'] == 'input01'){
    model_input01($libSmarty);
    $libSmarty->display('index.tpl');
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






