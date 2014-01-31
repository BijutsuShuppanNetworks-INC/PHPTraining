<html lang="ja">
<head>
  <meta charset="utf-8">
</head>
<body>
<?PHP
require_once('Validator.php');

//入力チェッククラスのインスタンスを生成
$libValidator = new Validator();

$value01 = "1234567890";
echo "半角数値チェック -> " . $libValidator->_stringIsHankakuAlphaNum($value01);

?>
</body>
</html>