<?php

  //データベース接続
  protected function connectedDB
  {
    try{
      return new PDO(DSN,USER,PASSWORD);
    }
    catch(PDOExeption $e);
    exit;
  }