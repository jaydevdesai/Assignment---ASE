<?php
	include('config.php');
	$request = array(
		"method"=> $_SERVER['REQUEST_METHOD'],
		"post" => $_POST);
	$error="";
	if ((isset($request['post']['email'])
        && isset($request['post']['password']))) {
        
		$email = $request['post']['email'];
		$password = $request['post']['password'];
		//Encrypting password using Md5 to increase the seurity of authentication.
		$md5_pass = md5($password);
		$res = "SELECT * FROM user_login WHERE email= '$email' and password= '$md5_pass'";
		$result = mysqli_query($db,$res);
      
		$n = mysqli_num_rows($result);
		if($n == 1) {
			$_SESSION["login_email"] = $email;
			$token = bin2hex(random_bytes(16));
			$_SESSION["login_token"] = $token;
			
			header("location: welcome.php");
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
                  <label>Email   :</label><br/><input type = "text" name = "email" class = "box"/><br /><br />
                  <label>Password  :</label><br/><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;  ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>