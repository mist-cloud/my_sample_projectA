<?php
session_start();
session_unset(); //セッションの内容を全て削除
header('Location: index.php');
?>