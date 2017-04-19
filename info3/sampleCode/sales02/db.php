<?php
class DB{
  //MySQL�Ƃ���������N���X
  private  $USER = "root";
  private  $PW   = "dai"; //�������p�X���[�h��ݒ肵�Ă�������
  private  $dns  = "mysql:dbname=salesmanagement;host=localhost;charset=utf8";
  
  private function Connectdb(){
    try{
      $pdo = new PDO($this->dns,$this->USER,$this->PW);
      return $pdo;
    }catch(Exception $e){
      return false;
    }
  }
  
  protected function executeSQL($sql, $array){
    //SQL�����s����֐�
    try{
      if(!$pdo = $this->Connectdb())return false;
      $stmt = $pdo->prepare($sql);
      $stmt->execute($array);  
      return $stmt;   //�߂�l��PDOStatement�̃C���X�^���X
    }catch(Exception $e){
      return false;
    }
  }
}
?>