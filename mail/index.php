<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>メールを送信</h1>
    <form action="index2.php" method="post">
        <dl>
            <dt>送信先(To)</dt>
            <dd>
                <input name="email" type="text" id="email" size="50" maxlength="255" />
            </dd>
            <dt>サブジェクト</dt>
            <dd>
                <input name="subject" type="text" id="subject" size="50" maxlength="255" />
            </dd>
            <dt>内容</dt>
            <dd>
                <textarea name="message" id="message" cols="50" rows="10"></textarea>
            </dd>
        </dl>
        <input type="submit" value="送信する" />
    </form>
</body>
</html>
