<?php
$file = "counter.txt";
$count = 0;
if (file_exists($file)) {
    $count = file_get_contents($file);
}
$count++;
file_put_contents($file, $count);
echo "count=$count";
?>