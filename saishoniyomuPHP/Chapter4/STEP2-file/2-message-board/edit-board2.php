<?php
include 'setting.inc.php';

// 更新用パスワードを指定する
$master_password = "ai300";
// 投稿があるか?
if (isset($_POST["msg"])) {
    // パスワードが合わない場合は保存しない
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
    if ($pass !== $master_password) {
        echo "パスワードが違います！！";
        exit;
    }
    // ファイルにメッセージを保存
    file_put_contents($save_file, $_POST["msg"]);
    echo "保存しました!!";
} else {
    // 投稿フォームの表示
    $self = $_SERVER["SCRIPT_NAME"];
    echo <<< __FORM__
<!-- 投稿フォーム -->
<form method="POST" action="$self">
<textarea name="msg" cols="60" rows="6">
ここにメッセージを記入してください。
</textarea><br/>
パスワード:
<input type="password" name="pass" />
<input type="submit" value="記録" />
</form>
__FORM__;
}
