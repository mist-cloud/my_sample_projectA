<?php
$news = file_get_contents('./news_data/news.txt');
/*readfile('./news_data/news.txt');　←読み込んでそのまま表示する方法。変数に代入出来ない*/
?>

<?php
print($news);
?>