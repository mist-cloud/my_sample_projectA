<?php
//ユーザーとパスワードの一覧
$users = array (
    "test1"=>"b444ac06613fc8d63795be9ad0beaf55011936ac",//test1をSHA1でハッシュ化、英数字は小文字に。
    "test2"=>"109f4b3c50d7b0df729d299bc6f8e9ef9066971f",//test2を同じく
    "test3"=>"3ebfa301dc59196f18593c45e519287a23297589"//test3を同じく
);
$script = $_SERVER["SCRIPT_NAME"];//このPHPのパス
//セッションを開始する
session_start();
//ログインしているか？
if (isset($_SESSION["login"])) { show_login_contents(); exit; }
//ログインフォームからので入力があるか？
if (isset($_POST["user"])) {//userに値が入っていれば
    check_login();//関数check_login()を実行
} else {//userに値が入っていなければ
    show_login_form();//関数show_login_form()を実行
}
//ログインフォームを表示
function show_login_form() {
    global $script;//グローバル関数$scriptにアクセス
    //ヒアドキュメントでフォームを記述
    echo <<< __FORM__
<div id="loginform">
<form action="$script" method="POST">
<label>ユーザー名</label><input type="text" name="user" />
<label>パスワード</label><input type="text" name="pass" />
<button type="submit">ログイン</button>
</form>
</div>
__FORM__;
}
//ログインするかチェック
function check_login() {
    global $users, $script;//グローバル関数$users,$scriptにアクセス
    //入力を検証する
    if (empty($_POST["pass"])) {//passに値が入っていない場合
        echo "パスワードが入力されていません。"; exit;
    }
    if (empty($users[$_POST["user"]])) {//userに値が入っていない場合
        echo "ユーザーが存在しないかパスワードが違います。"; exit;
    }
    //パスワードが合致しているかチェック
    $pass_correct = $users[$_POST["user"]];
    if (sha1($_POST["pass"]) != $pass_correct) {
        echo "ユーザーが存在しないかパスワードが違います。"; exit;
    }
    //ログインしたことをセッションに記憶
    $_SESSION["login"] = array("user" => $_POST["user"]);
    echo "<a href='$script'>ログインしました！</a>";
}
function show_login_contents() {
    $user = $_SESSION["login"]["user"];
    echo "<h1>こんにちは、{$user}さん！</h1>";
    echo "<p>このページはログインした人しか見られません。</p>";
}
?>