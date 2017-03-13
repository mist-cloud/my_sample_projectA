<?php
//関数 ひとつの処理にまとめて何度でも呼び出せる
function outputName() {
    $name = "山田";
    echo "私の名前は" . $name . "です。<br />";
}
outputName();
outputName();
outputName();

//関数における引数
function outputName2($name2) {
    echo "私の名前は" . $name2 . "です。<br />";
}
outputName2("赤城");
outputName2("加藤");
outputName2("斎藤");

//関数における引数。複数指定することも可能

function outputName3($name31,$name32,$name33) {
    echo "私の苗字は" . $name31 . "、名前は" . $name32 . "です。年齢は" . $name33 . "歳です。<br />";
}
outputName3("アカギ","ケイスケ","25");
outputName3("カトウ","コウジ","42");
outputName3("サイトウ","ハジメ","55");

//変数のスコープ
function outputInfo($name4) {
    global $pet;//グローバル宣言を追加31行目の変数がグローバル化
    $pet = "犬";//ローカルスコープ
    echo $name4 . "さんは" . $pet . "を飼っています。<br />";
}
outputInfo("山田");//グローバルスコープ
echo $pet . "は可愛い";//←通常は、そんな変数ねえよ。とエラーになる。global化した結果表示される
?>

<?php
//if(issset($_GET[]))は値が入っていたら処理する
if(isset($_GET['comment'])){
    $comment = $_GET["comment"];
    echo $comment;
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>ファームデータの送信</h1>
    <form action="index.php" method="get">
        <input type="text" name="comment"/><br />
        <input type="submit" value="送信"/>
    </form>
</body>
</html>