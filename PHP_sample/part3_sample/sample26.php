<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>RSSの情報を読み込む</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>RSSの情報を読み込む</h1>
</div>

<div id="content">
<p>
<ul class="list">
<?php
$xmlTree = simplexml_load_file('http://h2o-space.com/category/news/feed');

foreach($xmlTree->channel->item as $item) {
	print('<li><a href="' . $item->link . '">' . $item->title . '</a></li>');
}
?>
</ul>
</p>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
