<?php
$txt = file_get_contents("old.txt");
$txt = str_replace("old@example.com", "new@example.com", $txt);
file_put_contents("new.txt", $txt);
echo "ok";
