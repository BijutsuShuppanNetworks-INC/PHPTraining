<?PHP
require_once( '../conf/AppConf.php');

$imgFile = APP_DIR . '/tmp/test/bnr_stamplist_1000000911.png';

// ƒwƒbƒ_‚Ìo—Í
header('Content-type:image/png');

readfile($imgFile);