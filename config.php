<?php
session_start();
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "gbook");
define("CHARSET", "utf8");

$pbd = "mysql:host=".HOST.";dbname=".DBNAME.";charset=".CHARSET;
    try {
        $dbConn=new PDO($pbd,USER,PASSWORD);
    }
    catch (PDOException $q){
        die("Error".$q->getMessage());
    }