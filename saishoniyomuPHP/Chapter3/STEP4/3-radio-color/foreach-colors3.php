<?php
$colors = array("赤"=>"#FF0000","水色"=>"#00FFFF","白"=>"#FFFFFF");
foreach ($colors as $name => $color) {
    echo create_radio_code($name, $color);
}
// フォームの表示で利用するラジオボタンとラベルの作成
function create_radio_code($name, $code) {
    return <<< __RADIO__
<input type="radio" id="$name" name="color" value="$code" />
<label for="$name"/>$name</label>
__RADIO__;
}
