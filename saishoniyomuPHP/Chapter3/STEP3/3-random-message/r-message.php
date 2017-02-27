<div style="font-size:32px;">
<?php
$no = rand(1, 5); // ランダムな値を得る
switch ( $no ) {  // 値によって処理を分岐する
    case 1:
        $msg = "まいどおおきに。";
        break;
    case 2:
        $msg = "お疲れ様です。";
        break;
    case 3:
        $msg = "よくきてくれました!!";
        break;
    default:
        $msg = "どうも、どうもです。";
}
echo $msg;
?>
</div>
