<?php
$db = new PDO("sqlite:ejdict.db"); // データベースに接続する
$script_name = $_SERVER["SCRIPT_NAME"];
$title = isset($_GET["title"]) ? trim($_GET["title"]) : "";
// 英単語の検索フォームを表示する
$title_html = htmlspecialchars($title);
echo <<< __FORM__
<link rel="stylesheet" type="text/css" href="ejdict.css" />
<h3>英和辞書</h3>
<form action="$script_name" methtod="get">
  英単語: <input type="text" name="title" value="$title_html" />
  <input type="submit" value="検索" />
</form>
__FORM__;
// 検索するか？
if ($title != "") {
    $stmt = $db->prepare("SELECT * FROM words WHERE title=?");
    $stmt->execute(array($title));
    foreach ($stmt as $row) {
        $word = htmlspecialchars($row["title"]);
        $body = str_replace(" / ", "\n", $row["body"]);
        $body = htmlspecialchars($body);
        $body = str_replace("\n", "<br/>", $body);
        echo "<h4>$word</h4><div class='body'>$body</div>";
    }
}
