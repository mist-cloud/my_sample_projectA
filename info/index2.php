<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<style type="text/css">

</style>

</head>
<body>
  <div id="page">
    <div class="container">
      <h1>Bootstrap＆PHP</h1>  
        <div class="row">
            <form method="post" action="mail.php" class="form-horizontal">
            
            <div class="form-group">
                <label for="" class="col-sm-2 col-lg-3 control-label">お名前</label>
                <div class="col-sm-10 col-lg-9">
                  <input name="name" id="name" type="text" size="50" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-lg-3 control-label">性別</label>
                <div class="col-sm-10 col-lg-9">
                    <input name="gender" id="man" type="radio" value="男性" /><label for="man">男性</label>　<input name="gender" id="woman" type="radio" value="女性" /><label for="woman">女性</label>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-lg-3 control-label">血液型</label>
                <div class="col-sm-10 col-lg-9">
                    <select name="blood" id="blood">
                    <option value="A型">A型</option>
                    <option value="B型">B型</option>
                    <option value="O型">O型</option>
                    <option value="AB型">AB型</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-lg-3 control-label">郵便番号</label>
                <div class="col-sm-10 col-lg-9">
                    <input name="yubin" id="yubin" type="text" size="50" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-lg-3 control-label">メールアドレス</label>
                <div class="col-sm-10 col-lg-9">
                  <input name="mail" id="mail" type="text" size="50" maxlength="255" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-lg-3 control-label">件名</label>
                <div class="col-sm-10 col-lg-9">
                    <input name="sub" id="sub" type="text" size="50" maxlength="255" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 col-lg-3 control-label">お問い合わせ内容</label>
                <div class="col-sm-10 col-lg-9">
                    <textarea name="naiyou" id="naiyou" cols="50" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-lg-9">
              <button type="submit" class="btn btn-default">送信</button>
            </div>
            </div>
            
            </form>
        </div>
    </div><!-- /container -->
  </div><!-- /page -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>