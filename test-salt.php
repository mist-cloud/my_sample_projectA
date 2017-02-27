<?php
$password = "test";
$salt = "bnr4u9hx6ks4rdp1ded"; //類推されにくい文字列を指定
$pass_with_salt = $password.$salt;
$hash = hash("sha1", $pass_with_salt);
echo $hash;
?>