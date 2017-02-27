<?php
$name     = "検定試験";
$yotei    = strtotime("2014-10-16"); // 試験日
$today    = time();
$interval = $yotei - $today;
$days     = ceil($interval / (24 * 60 * 60));
echo "<p>今日は、".date("Y-m-d", $today)."</p>";
echo "<p>予定は、".date("Y-m-d", $yotei)."</p>";
echo "<p>{$name}まであと {$days} 日です！</p>";
