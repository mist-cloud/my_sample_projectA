<?php 
//php.iniの編集ができない場合の言語とエンコード指定
mb_language("japanese");
mb_internal_encoding("utf-8");
  
if(!empty($_POST['mail']) && ($_POST['naiyou']) && ($_POST['sub'])){
    $name=$_POST['name'];//お名前
    $gender=$_POST['gender'];//性別
    $blood=$_POST['blood'];//血液型
    $yubin=$_POST['yubin'];//郵便番号
    $subject=$_POST['sub'];//件名
    $naiyou=$_POST['naiyou'];//お問い合わせ内容
    $mymail="256hunter@gmail.com";//【　送信先メールアドレスを指定する　】

//送信されたメールを読みやすいように整理する
$naiyouall="お名前：".$name."\n性別：".$gender."\n血液型：".$blood."\n郵便番号：".$yubin."\nお問い合わせ内容：".$naiyou;

//差出人の名前を表示
$mail=$_POST['mail'];    
$from=mb_encode_mimeheader(mb_convert_encoding($name,"jis","utf-8"))."<".$mail.">";

//送信処理
$success=mb_send_mail($mymail,$subject,$naiyouall,"From:".$from);//mb_send_mail(送信先アドレス,題名,本文,送信元アドレス)
}

if($success){
    echo('送信しました<br /><br />');
    echo('<a href="index.php">戻る</a>');
}else{
    echo('送信失敗！！');
}
?>