<?php
$no = rand(1, 5); // ランダムな値を得る
if ($no == 1) {
    $msg = "まいどおおきに。";
} else if ($no == 2) {
    $msg = "お疲れ様です。";
} else if ($no == 3) {
    $msg = "よくきてくれました!!";
} else {
    $msg = "どうも、どうもです。";
}
echo $msg;
