<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>フォームを使ったテスト1</h1>
    <!-- 遷移先のPHPファイルを指定 -->
    <form action="test3-2.php" method="post">
    <dl>
        <dt>名前</dt>
        <dd><input id="my_name" type="text" name="my_name" size="35" maxlenghth="255" value="" /></dd>
    </dl>
    <input type="submit" value="送信する" />
    </form>

</body>
</html>
