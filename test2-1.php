<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>フォームを使ったテスト1</h1>
    <!-- 遷移先のPHPファイルを指定 -->
    <form action="test2-2.php" method="post">
    <label for="my_name">お名前：</label>
    <input id="my_name" type="text" name="my_name" size="35" maxlength="255" value="" />
    <input type="submit" value="送信する" />
    </form>

</body>
</html>
