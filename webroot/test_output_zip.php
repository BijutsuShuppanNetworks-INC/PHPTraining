<?PHP
require_once( '../conf/AppConf.php');

$archiveFile = APP_DIR . '/tmp/test/1000000911.zip';

// �w�b�_�̏o��
header('Content-Type: application/octet-stream'); 
// �t�@�C�����̎w��
header('Content-Disposition: attachment; filename="1000000911.zip"'); 
header('Content-Length: '.filesize($archiveFile));

readfile($archiveFile);