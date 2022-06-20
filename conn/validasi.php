<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/conn/koneksi.php');
    
    if(!isset($_SESSION[login])){
        header('location:/login.php');
    }
?>