<?php
// データの保存先
$save_file = dirname(__FILE__)."/food.txt";
// 書き換えのためのパスワード(のハッシュ値)
$master_password = "a94a8fe5ccb19ba61c4c0873d391e987982fbbd3";
// ユーザーからデータが送信されているか？
if (isset($_GET["food"])) {
    save_data();
} else {
    show_form();
}
// データの保存
function save_data() {
    global $save_file;
    global $master_password;
    $self = $_SERVER["SCRIPT_NAME"];
    // パスワードの検証
    if (isset($_GET["pass"]) && sha1($_GET["pass"]) !== $master_password) {
        echo "パスワードが違います。"; exit;
    }
    // データの検証
    $list = $_GET["food"];
    if (count($list) != 3 || $list[1] == "" || $list[2] == "") {
        echo "<a href='$self'>食べ物を3つ入力してください。</a>";
        exit;
    }
    // 保存
    $str = implode("\n", $list); // 改行を使ってリストを区切る
    file_put_contents($save_file, $str);
    echo "<a href='$self'>保存しました</a>";
}
// フォームの表示
function show_form() {
    global $save_file;
    if (file_exists($save_file)) {
        echo "<h3>好きな食べ物</h3>";
        $str = file_get_contents($save_file);
        $list = explode("\n", $str);
        foreach ($list as $food) {
            echo htmlspecialchars($food) . "<br/>";
        }
        echo "<hr/>";
    }
    echo <<< __FORM__
<h3>好きな食べ物を3つ入力してください</h3>
  <form>
  <input type="text" name="food[]" /><br/>
  <input type="text" name="food[]" /><br/>
  <input type="text" name="food[]" /><br/><br/>
  パスワード: <input type="password" name="pass" /><br/>
  <input type="submit" value="保存" />
</form>
__FORM__;
}
