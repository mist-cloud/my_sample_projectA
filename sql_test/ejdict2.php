<?php
$db = new PDO("sqlite:ejdict.db");//データベースに接続する
$script_name = $_SERVER["SCRIPT_NAME"];
$title = isset($_GET["title"]) ? trim($_GET["title"]) : "";//入力単語を得る
//英単語の検索フォームを表示する
$title_html = htmlspecialchars($title);
echo <<< __FORM__
<link rel="stylesheet" type="text/css" href="ejdict.css" />
<h3>英和辞書</h3>
<form action="$script_name" methtod="get">
英単語：<input type="text" name="title" value="$title_html" />
<input type="submit" value="検索" />
</form>
__FORM__;
//検索するか？
if ($title != "") {
    ///英語のタイトルから検索
    $stmt = $db->prepare("SELECT * FROM words WHERE title LIKE ? LIMIT 20");
    $stmt->execute(array($title."%"));
    $rows = $stmt->fetchAll();//配列で検索結果を全部取得する
    //検索した結果が0だったら本文を検索
    if (count($rows) == 0) {
        $stmt = $db->prepare("SELECT * FROM words WHERE body LIKE ? LIMIT 20");
        $stmt->execute(array("%{$title}%"));
        $rows = $stmt->fetchAll();//配列で検索結果を全部取得する
    }
    //検索結果を表示
    foreach ($rows as $row) {
        $word = htmlspecialchars($row["title"]);
        $body = str_replace(" / ", "\n", $row["body"]);
        $body = htmlspecialchars($body);
        $body = str_replace("\n", "<br />", $body);
        echo "<h4>$word</h4><div class='body'>$body</div>";
    }
}
?>