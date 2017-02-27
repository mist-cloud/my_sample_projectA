<?php
$t = strtotime("next monday", time());
echo "次の月曜日は..." . date("Y-m-d", $t);
