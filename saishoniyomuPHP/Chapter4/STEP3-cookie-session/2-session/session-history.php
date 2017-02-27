<?php
session_start();               // セッションを開始する
// 商品の一覧を表示
$list = array(
    "金のバッグ"=>300,
    "銀の財布"=>150,
    "真珠のピアス"=>120,
    "ダイヤの腕輪"=>250
);
echo "<h3>商品の一覧</h3><ul>";
foreach ($list as $item => $price) {
    $p = urlencode($item);
    $self = $_SERVER["SCRIPT_NAME"];
    echo "<li><a href='$self?p=$p'>$item({$price}万円)</a></li>";
}
echo "</ul>";
// 商品を購入したか？
if (isset($_GET["p"])) {
    // 入力を検証
    $item = $_GET["p"];
    if (!isset($list[$item])) {
        echo "商品がありません"; exit;
    }
    // セッションに追加
    $history = array();
    if (isset($_SESSION["history"])) {
        $history = $_SESSION["history"];
    }
    $history[] = array("item"=>$item, "time"=>time());
    $_SESSION["history"] = $history;
    echo "<h2>購入しました: $item</h2>";
}
// 購入履歴を表示
if (isset($_SESSION["history"])) {
    echo "<h3>購入履歴</h3><ul>";
    $history = $_SESSION["history"];
    foreach ($history as $i) {
        $name = $i["item"];
        $time = date("m/d H:i:s", $i["time"]);
        $price = $list[$name];
        echo "<li>$time : $name ({$price}万円)</li>";
    }
    echo "</ul>";
}
