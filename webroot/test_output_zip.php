<?PHP
require_once( '../conf/AppConf.php');

// �X�^���v�f�[�^�ꎟ�ۑ��f�B���N�g��
define('APP_STAMPDATA_TMP_DIR', APP_DIR.'/tmp/files/');
// zip�t�@�C���̊g���q
define('APP_STAMP_ZIP_SUFFIX', '.zip');

$sessionId  = $_POST["session_id"];
$categoryId = $_POST["categoryId"];

$archiveFile = APP_STAMPDATA_TMP_DIR . $sessionId . DS .$categoryId . APP_STAMP_ZIP_SUFFIX;

// �w�b�_�̏o��
header('Content-Type: application/octet-stream'); 
// �t�@�C�����̎w��
header('Content-Disposition: attachment; filename="'.$categoryId . APP_STAMP_ZIP_SUFFIX.'"'); 
header('Content-Length: '.filesize($archiveFile));

readfile($archiveFile);