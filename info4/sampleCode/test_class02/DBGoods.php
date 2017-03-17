<?php
require_once('db.php');
class DBGoods extends DB{
  
  public function InsertGoods(){
    $sql = "INSERT INTO goods VALUES(?,?,?)";
    $array = array($_POST['GoodsID'],$_POST['GoodsName'],$_POST['Price']);
    parent::executeSQL($sql, $array);
  }
  
  public function SelectGoodsAll(){
    $sql = "SELECT * FROM goods";
    $res = parent::executeSQL($sql,null);
    $records = "<table>\n";
    while($row = $res->fetch(PDO::FETCH_ASSOC)){
      $records .= "<tr><td>{$row['GoodsID']}</td>";
      $records .= "<td>{$row['GoodsName']}</td>";
      $records .= "<td>{$row['Price']}</td></tr>\n";
    }
    $records .= "</table>\n";
    return $records;
  }
}
?>