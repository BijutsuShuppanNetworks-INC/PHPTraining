<?PHP
require_once( '../conf/AppConf.php');

$imgFile = APP_DIR . '/tmp/test/bnr_stamplist_1000000911.png';

// �w�b�_�̏o��
header('Content-type:image/png');

readfile($imgFile);