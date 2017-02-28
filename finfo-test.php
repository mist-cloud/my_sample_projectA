<?php
$file = "test.jpeg";
$f = finfo_open(FILEINFO_MIME_TYPE);
$type = finfo_file($f, $file);
echo "$file --- $type";
?>