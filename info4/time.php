<?php
$ctime = time() + (7 * 24 * 60 * 60);//7日*24時間*60分*60秒
//echo $ctime;
//exit;
echo 'Now:' . date('Y-m-d') . "\n";
echo 'Next Week:' . date('Y-m-d', $ctime) . "\n";
echo 'Next Week:' . date('Y-m-d', strtotime('+1 weel')) . "\n";
?>