<?php session_start();
 if ($_SESSION['auth'] !=1)
        {
       header("location:../login/login.php");
        }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium seat ticket booking</title>
        <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    
    <frameset rows="25%, *" border="1" frameborder="1" >
        <frame name="top" src="top.php" noresize />  
     <frameset cols="20%,80%" border="0" frameborder="0">
       
    <frame name="head" src="setmini.php" noresize />
    <frame src="setmain.php" name="main2" />
    </frameset>
     </frameset>
      
    <body>
       
     
    </body>
</html>