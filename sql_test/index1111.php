<html><head><meta charset="utf-8" /><title>SQLテスト</title></head>
<body bgcolor="#f0f0f0"><?php
// SQLの入力フォームを表示
$query = isset($_GET["query"]) ? $_GET["query"] : "";
$q_html = htmlspecialchars($query);
echo <<< __FORM__
<form><div>SQLを以下に記述:</div>
<textarea name="query" rows="5" cols="70">{$q_html}</textarea>
<div><input type="submit" value="SQL実行" /></div>
</form>
__FORM__;
// SQLを実行する
if ($query != "") {
    $username = "root";
    $password = "root";
    $db = new PDO(
        'mysql:host=localhost;dbname=TestDB', //ホストとデータベース名を指定
        $username,  //ユーザー名とパスワードを指定
        $password,
        array_pop(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") //文字コードUTF-8で接続
    );
    //$db = new PDO("sqlite:./test.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        // 実行して結果を表示する
        $html = $head = "";
        foreach ($db->query($query, PDO::FETCH_ASSOC) as $row) {
            if ($head == "") { // ヘッダ行
                $keys = array_keys($row);
                $head .= "<tr>";
                foreach ($keys as $c) {
                    $c_html = htmlspecialchars($c);
                    $head .= "<th>$c_html</th>";
                }
                $head .= "</tr>";
            }
            $html .= "<tr>";
            foreach ($row as $c) { // 実行結果
                $c_html = htmlspecialchars($c);
                $html .= "<td><pre>$c_html</pre></td>";
            }
            $html .= "</tr>\n";
        }
        echo "<p style='font-weight:bold; color:blue;'>実行しました</p>";
        echo "<table border='1' bgcolor='#fff' cellpadding='4'>";
        echo $head . $html;
        echo "</table>";
    } catch (Exception $e) {
        $msg = $e->getMessage();
        echo "<div style='color:red'>$msg</div>";
    }
}
?></body></html>
