<?php
      error_reporting(E_ALL & ~E_NOTICE);
      $user = $_REQUEST['user'];
      $pass = $_REQUEST['pass'];
      $login = $_REQUEST['login'];

      $error = false;
      $errores = "";

      if(isset($login)){
        if(trim($user)=="" or $user!="admin" or trim($pass)=="" or $pass!="root"){
          $error=true;
          $errores = "Error: El usuario o contraseña introducidos son erróneos.";
        }
      }
      if(isset($login) && $error==false){
        header("Location: admin/index.html");
      }else{
          
        }
        if($error==true && trim($errores)!=""){
          echo "<p class=\"texto\">$errores</p>";
        }
    ?>