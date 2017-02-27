<pre><?php
// 東京の天気を表すRSS
$weather_rss = "http://weather.livedoor.com/forecast/rss/13/63.xml";

// RSSデータをWebからダウンロードする
$s = trim(@file_get_contents($weather_rss));
// XMLをパースする
$xml = simplexml_load_string($s);
// XMLにある要素にアクセスする
$title = $xml->channel->title;
echo $title."\n"; // RSSのタイトル
// 配列になっている要素にアクセス
foreach ($xml->channel->item as $item) {
    $item_title = strval($item->title);
    echo "- $item_title\n";
}
