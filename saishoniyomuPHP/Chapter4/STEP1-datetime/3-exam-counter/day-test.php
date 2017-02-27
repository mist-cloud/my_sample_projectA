<?php
$d1 = strtotime("2011-10-16");
$d2 = strtotime("2011-10-19");
$sa = $d2 - $d1;
$sa2 = ceil($sa / (24*60*60));
echo "差は{$sa2}日です！";
