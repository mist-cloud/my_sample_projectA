<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>画面に文章を表示する</h1>

<?php
    /*タイムゾーンを東京に設定*/
    date_default_timezone_set('Asia/Tokyo');
    /*時間の表示*/
    print (date('n') . '月になりましたね。' . '今の時間は' . date('g時 i分 s秒') . 'だと思います。');
    print ('現在は' . date('g時 i分 s秒') . 'です。');
?>
    
    
</body>
</html>
