<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>商品登録</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>商品登録</h1>
</div>

<div id="content">
<p>登録する商品の情報を記入してください。</p>
<form id="frmInput" name="frmInput" method="post" action="input_do.php">
  <dl>
  <dt>
    <label for="maker_id">メーカーID</label>
  </dt>
  <dd>
    <input name="maker_id" type="text" id="maker_id" size="10" maxlength="10" />
  </dd>
  <dt>
    <label for="item_name">商品名</label>
  </dt>
  <dd>
    <input name="item_name" type="text" id="item_name" size="35" maxlength="255" />
  </dd>
  <dt>
    <label for="price">価格</label>
  </dt>
  <dd>
    <input name="price" type="text" id="price" size="10" maxlength="10" />
  円</dd>
  <dt>
    <label for="keyword">キーワード</label>
  </dt>
  <dd>
    <input name="keyword" type="text" id="keyword" size="50" maxlength="255" />
  </dd>
  <input type="submit" value="登録する" />
</form>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
