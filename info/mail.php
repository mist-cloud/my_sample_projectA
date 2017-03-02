<?php 
//php.iniの編集ができない場合の言語とエンコード指定
mb_language("japanese");
mb_internal_encoding("utf-8");
  
if(!empty($_POST['mail'])){
    $name=$_POST['name'];//お名前
    $gender=$_POST['gender'];//性別
    $blood=$_POST['blood'];//血液型
    $yubin=$_POST['yubin'];//郵便番号
    $to=$_POST['mail'];//メールアドレス
    $subject=$_POST['sub'];//件名
    $naiyou=$_POST['naiyou'];//お問い合わせ内容

//郵便番号の型の判定
$yubin=mb_convert_kana($_POST['yubin'],'a','utf-8');
  
if(!preg_match("/\A\d{3}\-\d{4}\z/",$yubin)){
    $yubin="正しい郵便番号を入力してください";
}
//ここまで郵便番号

//差出人の名前を表示
$mail=$_POST['mail'];    
$from=mb_encode_mimeheader(mb_convert_encoding($name,"jis","utf-8"))."<".$mail.">";

$success=mb_send_mail($to,$subject,"名前：".$name."　性別：".$gender."　血液型：".$blood."　郵便番号：".$yubin."　本文：".$naiyou,"from:".$from);
}
?>
  
  
<?php 
if($success){
    echo('送信しました');
}else{
    echo('送信失敗！！');
}
?>