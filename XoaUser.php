<?php
try{
    session_start();    
    $ID=$_REQUEST['ID'];
    include_once("DataProvider.php");
    $result=DataProvider::ExecuteQuery("Delete From user Where ID =" . $ID);
    $_SESSION["flag"]=1;
    
}catch(Exception $e){
    $_SESSION["flag"]=0;
}
header("location: QuanLyUser.php"); 
    
    
?>