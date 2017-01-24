<?php
$news = file_get_contents('./news_data/news.txt');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>ファイルの読み込み</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>ファイルの読み込み</h1>
</div>

<div id="content">
<p style="margin-top: 200px">
<?php
print($news);
?>
</p>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
