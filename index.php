<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // usuario and contrasena sent from form 
      
      $myusuario = mysqli_real_escape_string($db,$_POST['usuario']);
      $mycontrasena = mysqli_real_escape_string($db,$_POST['contrasena']); 
      
      $sql = "SELECT id FROM usuarios WHERE usuario = '$myusuario' and contrasena = '$mycontrasena'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusuario and $mycontrasena, table row must be 1 row
		
      if($count == 1) {
         session_start();
         $_SESSION['login_user'] = $myusuario;
         
         header("location: chat.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "usuario" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "contrasena" name = "contrasena" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>