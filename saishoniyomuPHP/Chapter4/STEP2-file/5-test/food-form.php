<?php
// データの保存先
$save_file = dirname(__FILE__)."/food.txt";
// ユーザーからデータが送信されているか？
if (isset($_GET["food"])) {
    save_data();
} else {
    show_form();
}
// データの保存
function save_data() {
    global $save_file;
    $self = $_SERVER["SCRIPT_NAME"];
    // データの検証
    $list = $_GET["food"];
    if (count($list) != 3 || $list[1] == "" || $list[2] == "") {
        echo "<a href='$self'>食べ物を3つ入力してください。</a>";
        exit;
    }
    // 保存
    file_put_contents($save_file, serialize($list));
    echo "<a href='$self'>保存しました</a>";
}
// フォームの表示
function show_form() {
    global $save_file;
    if (file_exists($save_file)) {
        echo "<h3>好きな食べ物</h3>";
        $list = unserialize(file_get_contents($save_file));
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
  <input type="text" name="food[]" /><br/>
  <input type="submit" value="保存" />
</form>
__FORM__;
}
