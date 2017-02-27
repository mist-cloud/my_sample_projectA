<?php
$str = "hoge@example.com";
$str_htm = htmlspecialchars($str);
$str_url = urlencode($str);
$chartapi = "http://chart.apis.google.com/chart";
echo <<< __QRCODE__
<h1>$str_htm</h1>
<img src="$chartapi?cht=qr&chs=150x150&chl=$str_url" />
__QRCODE__;
