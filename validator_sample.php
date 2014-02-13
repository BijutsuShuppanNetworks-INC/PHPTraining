<html lang="ja">
<head>
  <meta charset="utf-8">
</head>
<body>
<?PHP
require_once('Validator.php');

//入力チェッククラスのインスタンスを生成
$libValidator = new Validator();

$value01 = $_POST['categoryId'];
$result  = $libValidator->_stringLength($value01,4);
echo $result;
// if($result >= 1){
// 	echo $result;
// } else {
// 	echo 'ちがうよ';
// }


?>
</body>
</html>