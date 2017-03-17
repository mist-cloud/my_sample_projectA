<?php
class DB{
  //MySQLとやり取りをするクラス
  private  $USER = "root";
  private  $PW   = "dai";
  private  $dns  = "mysql:dbname=salesmanagement;host=localhost;charset=utf8";
  
  private function Connectdb(){
    //PDOのインスタンスを生成する（接続を担当する）関数
    try{
      $pdo = new PDO($this->dns,$this->USER,$this->PW);
      return $pdo;
    }catch(Exception $e){
      return false;
    }
  }
  
  public  function executeSQL($sql,$array){
    //SQLを実行する関数
    try{
      if(!$pdo = $this->Connectdb())return false;
      $stmt = $pdo->prepare($sql);
      $stmt->execute($array);
      return $stmt;   //戻り値はPDOStatementのインスタンス
    }catch(Exception $e){
      return false;
    }
  }
}
?>