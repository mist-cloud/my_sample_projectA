<link rel="stylesheet" type="text/css" href="form.css"><?php
// ユーザーとパスワードの一覧
$users = array(
    // ユーザー名 => パスワード(SHA1でハッシュ化)
    "takeshi"=>"a94a8fe5ccb19ba61c4c0873d391e987982fbbd3",//←test
    "yutaka" =>"ee3f7d52ca341c51c694af9288701f4ce43be0ad",//←rabit
    "akiko"  =>"f91a8ee646a277a2f1359709604b99c1b32d9f24" //←panda
);
$script = $_SERVER["SCRIPT_NAME"]; // このPHPファイルのパス
// セッションを開始する
session_start();
// ログインしているか？
if (isset($_SESSION["login"])) { show_login_contents(); exit; }
// ログインフォームからの入力があるか？
if (isset($_POST["user"])) {
    check_login();     // ログインできるかチェック
} else {
    show_login_form(); // ログインフォームを表示
}
// ログインフォームを表示
function show_login_form() {
    global $script;
    echo <<< __FORM__
<div id="loginform">
<form action="$script" method="POST"><h3>ログインしてください</h3>
<label>ユーザー名</label><input type="text" name="user" />
<label>パスワード</label><input type="password" name="pass" />
<button type="submit">ログイン</button>
</form></div>
__FORM__;
}
// ログインするかチェック
function check_login() {
    global $users, $script;
    // 入力を検証する
    if (empty($_POST["pass"])) {
        echo "パスワードが入力されていません。"; exit;
    }
    if (empty($users[$_POST["user"]])) {
        echo "ユーザーが存在しないかパスワードが違います。"; exit;
    }
    // パスワードが合致しているかチェック
    $pass_correct = $users[$_POST["user"]];
    if (sha1($_POST["pass"]) != $pass_correct) {
        echo "ユーザーが存在しないかパスワードが違います。"; exit;
    }
    // ログインしたことをセッションに記録
    $_SESSION["login"] = array("user" => $_POST["user"]);
    echo "<a href='$script'>ログインしました！</a>";
}
// ログインしている時の処理
function show_login_contents() {
    $user = $_SESSION["login"]["user"];
    echo "<h1>こんにちは、{$user}さん！</h1>";
    echo "<p>このページはログインした人にだけ見える秘密のページです。</p>";
}
