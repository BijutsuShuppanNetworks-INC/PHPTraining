<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>SmartySample</title>
</head>
<body>
{debug}
	<p>Smartyタグ表示確認</p>
	名前：{$name}
	<br>
	URL:
	<a href="{$url}">{$url}</a>
	<br>
	日付：{$smarty.now|date_format:"%Y年%m月%d日"}
	<br>

	<ul>
	{foreach from=$items key=myId item=i}
		<li>{$myId}: {$i.no}: {$i.label}</li>
	{/foreach}
	</ul>

</body>
</html>