<?php
require_once('DateControl.php');
$dc = new DateControl();
if(isset($_POST['submit'])){
  echo $_POST['SalesDate'];
}
/*
echo $dc->DataFformat('NOW');
echo "<br>\n";
echo $dc->TodayToString();
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>売上管理システム</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h1>Classの確認</h1>
<form method="post" action="">
<label>日付<input type="date" id="SalesDate" name="SalesDate"  required></label>
<input type="submit" value="　　検索　　" name="submit" />
<input type="submit" value="←" id="prev" name="prev" />
<input type="submit" value="→" id="next" name="next" />
</form>
</body>
</html>