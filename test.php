<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>画面に文章を表示する</h1>
    <?php print('PHPを勉強中！'); ?>
    
    <a href="<?php print('http://h2o-space.com'); ?>">タグに埋め込み</a>
    
    <?php print('<h2 style="font-size: 110%; font-weight: bold">画面にHTMLを<br />表示する</h2>'); ?>
    
    <?php
    date_default_timezone_set('Asia/Tokyo');
    print('現在は' . date('G時　i分　s秒') . 'です。');
    ?>
    
    
</body>
</html>
