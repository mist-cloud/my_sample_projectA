<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>チェックボタン、ラジオボタン、リストボックスの値を取得する</h1>
    <!-- 遷移先のPHPファイルを指定 -->
    <form action="test4-2.php" method="post">
    <dl>
        <dt>性別：</dt>
        <dd>
            <input id="gender_male" type="radio" name="gender" value="male" /><label for="gender_male">男性</label>
            <input id="gender_female" type="radio" name="gender" value="female" /><label for="gender_female">女性</label>
        </dd>
    </dl>
    <input type="submit" value="送信する" />
    </form>

</body>
</html>
