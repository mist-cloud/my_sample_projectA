<?php
$colors = array("赤"=>"#FF0000","水色"=>"#00FFFF",
                "白"=>"#FFFFFF"); 
foreach ($colors as $name => $color) {
  echo <<<__RADIO__
<input type="radio" id="$name" name="color" value="$color" /> 
<label for="$name"/>$name</label>
__RADIO__;
}

