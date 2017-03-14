<?php
//--------------------------------------
//テスト
$list = array("Banana","Orange","Apple");//配列変数
echo "<h3>配列のテスト</h3>";
foreach ($list as $f){//配列変数$listの要素を1つずつ$fに代入してforeachで配列の各要素を出力
    echo "<p>$f</p>";
}
//--------------------------------------
//商品一覧の定義
$goods = array("目薬","日焼け止め","シャンプー","虫除けスプレー","石鹸","ガム","チョコレート","バナナ");
//パラメーターに応じて処理を変える
if (isset($_GET["goods"])) {
    show_item();
} else {
    show_form();
}
//選択したアイテムを表示する
function show_item() {
    $goods = $_GET["goods"];
    $goods_html = htmlspecialchars($goods);//HTML変換
    echo "商品「{$goods_html}」を購入しました！";
}
//フォームを表示する
function show_form() {
    global $goods;//グローバル宣言
    //選択肢の文字列を生成する
    $options = "";
    foreach ($goods as $item) {
        $options .= "<option value='$item'>$item</opton>";
    }
//ヒアドキュメントでフォームを表示
echo <<< __FORM__
<form>
<select name="goods">
<option>商品を選択</option>
{$options}
</select>
<input type="submit" value="購入" />
</form>
__FORM__;
}
?>