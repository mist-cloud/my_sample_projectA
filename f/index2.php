<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>画面に文章を表示する</h1>
    <?php
    if (empty($_REQUEST['my_name'])) {
        print('<div style="color:#ff0000;">名前は必須項目です。</div><br />');
    } else {
        print('正しく記載されています。<br />');
    }
    print('名前：　' . htmlspecialchars($_POST['my_name'], ENT_QUOTES) . '<br />');
    print('性別：　' . htmlspecialchars($_POST['gender'], ENT_QUOTES) . '<br />');
    print('年齢：　' . htmlspecialchars($_POST['age'], ENT_QUOTES) . '<br />');
    print('点数：　' . htmlspecialchars($_POST['test'], ENT_QUOTES) . '<br />');
    print('ご希望日：　' . htmlspecialchars($_POST['day'], ENT_QUOTES) . '<br />');
    print('県名：　' . htmlspecialchars($_POST['pref'], ENT_QUOTES) . '<br />');
    ?>
</body>
</html>
