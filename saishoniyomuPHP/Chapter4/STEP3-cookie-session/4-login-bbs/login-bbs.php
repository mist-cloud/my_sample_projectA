<link rel="stylesheet" type="text/css" href="form.css"><?php
// ユーザーとパスワードの一覧
$users = array(
    // ユーザー名 => パスワード(SHA1でハッシュ化)
    "takeshi"=>"a94a8fe5ccb19ba61c4c0873d391e987982fbbd3",//←test
    "yutaka" =>"ee3f7d52ca341c51c694af9288701f4ce43be0ad",//←rabit
    "akiko"  =>"f91a8ee646a277a2f1359709604b99c1b32d9f24" //←panda
);
$script = $_SERVER["SCRIPT_NAME"]; // このPHPファイルのパス
$savefile = dirname(__FILE__).'/log.txt';
// セッションを開始する
session_start();
//--------------------------------------------------------------------
// ログイン状態や送信されたパラメータにより分岐
if (isset($_SESSION["login"])) {   // ログインしているか？
    show_login_contents();
} else {
    // ログインフォームからの入力があるか？
    if (isset($_POST["user"])) {
        check_login();             // ログインできるかチェック
    } else {
        show_login_form();         // ログインフォームを表示
    }
}
//--------------------------------------------------------------------
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
    $user = trim($_POST["user"]);
    $pass = trim($_POST["pass"]);
    if (empty($users[$user])) {
        echo "ユーザーが存在しないかパスワードが違います。"; exit;
    }
    // パスワードが合致しているかチェック
    $pass_correct = $users[$user];
    if (sha1($pass) != $pass_correct) {
        echo "ユーザーが存在しないかパスワードが違います。"; exit;
    }
    // ログインしたことをセッションに記録
    $_SESSION["login"] = array("user" => $user);
    echo "<a href='$script'>ログインしました！</a>";
}
//--------------------------------------------------------------------
// ログイン時のコンテンツを表示
function show_login_contents() {
    $m = isset($_GET["m"]) ? $_GET["m"] : "";
    // 必要な処理があれば分岐する
    switch ($m) {
        case "logout":  show_logout(); break;
        case "write":   write_log(); break;
        default:        show_log(); break;
    }
}
// ログの表示
function show_log() {
    global $script, $savefile;
    // メニューの表示
    $user = $_SESSION["login"]["user"];
    echo "<h1>こんにちは、{$user}さん！</h1>";
    echo "現在ログイン中";
    echo "→(<a href='$script?m=logout'>ログアウトする</a>)";
    // 掲示板の表示
    echo "<h3>掲示板</h3>";
    $log = array();
    if (file_exists($savefile)) {
        $log = unserialize(file_get_contents($savefile));
    }
    echo "<ul>";
    foreach ($log as $i) {
        $name = htmlspecialchars($i["name"]);
        $body = htmlspecialchars($i["body"]);
        echo"<li>$name: $body</li>";
    }
    echo "</ul>";
    // 書き込みフォームを表示
    echo "<form action='$script' metod='get'>";
    echo "<input type='text' name='body' size='40' />";
    echo "<input type='hidden' name='m' value='write' />";
    echo "<input type='submit' value='書き込み' />";
    echo "</form>";
}
// ログの書き込み
function write_log() {
    global $script, $savefile;
    if (empty($_GET["body"]) || $_GET["body"] == '') {
        echo "本文が空です。"; exit; 
    }
    $log = array();
    if (file_exists($savefile)) {
        $log = unserialize(file_get_contents($savefile));
    }
    $log[] = array("name"=>$_SESSION["login"]["user"], "body"=>$_GET["body"]);
    file_put_contents($savefile, serialize($log));
    // ページをリロードする
    header("location: $script");
}
// ログアウト処理を行う
function show_logout() {
    global $script;
    unset($_SESSION["login"]);
    echo "<a href='$script'>ログアウトしました</a>";
    exit;
}
//--------------------------------------------------------------------
