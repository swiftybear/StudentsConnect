<?php

  class N{

    public static $e;
    public static $database;
    public static $DIR = "/Studentsconnect/New";
    public static $GMAIL = "bearpipsqueak@gmail.com";
    public static $GMAIL_PASSWORD = "";

    public static function _DB(){
      try {
        self::$database = new PDO('mysql:host=localhost;dbname=studentsconnect;charset=utf8mb4', 'root', '');
        self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $e = self::$e;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
      return self::$database;
    }

  }

?>
