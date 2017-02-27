<?php
//--------------------------------------------------------------------
// 商品一覧の定義
$goods = array( "目薬","日焼け止め","シャンプー","虫除けスプレー",
                "石けん","ガム","チョコレート","バナナ");
//--------------------------------------------------------------------
// パラメータに応じて処理を変える
if (isset($_GET["goods"])) {
    show_item();
} else {
    show_form();
}
//--------------------------------------------------------------------
// 選択したアイテムを表示する
function show_item() {
    $goods = $_GET["goods"];
    $goods_html = htmlspecialchars($goods); // HTML変換
    echo "商品「{$goods_html}」を購入しました!!";
}
// フォームを表示する
function show_form() {
    global $goods; // グローバル宣言
    // 選択肢の文字列を生成する
    $options = "";
    foreach ($goods as $item) {
        $options .= "<option value='$item'>$item</option>";
    }
    // フォームをヒアドキュメントで表示
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
//--------------------------------------------------------------------
