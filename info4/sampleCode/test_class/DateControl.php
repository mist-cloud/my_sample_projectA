<?php
class DateControl{
  
  public function DataFformat($dateString){
    $date = new DateTime($dateString);
    return $date->format('Y-m-d');
  }
  
  public function TodayToString(){
    $date = new DateTime('Now');
    return $date->format('Y-m-d');
  }
}
?>