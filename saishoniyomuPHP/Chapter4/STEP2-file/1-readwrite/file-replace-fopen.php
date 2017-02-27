<?php

$handle_r = fopen("old.txt", "r");
$handle_w = fopen("new.txt", "w");
while (!feof($handle_r)) {
  $line = fgets($handle_r);
  $line = str_replace("old@example.com", "new@example.com", $line);
  fwrite($handle_w, $line);
}
fclose($handle_r);
fclose($handle_w);
echo "ok";
