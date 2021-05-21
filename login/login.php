<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title>
        <link href="../css/login.css" rel="stylesheet" type="text/css" />
        <style>
    body{background:url(/eticket/image/image1.jpg);
         background-position: center;
    }
    form{background-color: windowframe;
         background-position: center;
    }
</style>

    </head>
    <body>
        <h1 align="center" style="background-color: window" >Stadium Seat Ticket Booking System</h1>
        <div align="center"><fieldset><legend align="center"><h1 style="background-color: black" >Login</h1></legend>
           <br>
           <br>
           
           <form action="loginscript.php" method="POST" style="background-color: windowtext">
            <table border="3" align="center" width="30%" bgcolor="white">
                 <tr>
          <td colspan="2">
              <div align="center" class="please"><h3>Please enter your username and password</h3></div>

          </td>
        </tr>


                    <tr>
                        <td>Username</td>
                        <td><input class="textfield" type="text" name="user_name" value="" class="textfield"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input class="textfield" type="password" name="password" value="" maxlength="30" class="textfield"/></td>
                    </tr>
                    <tr><td>&nbsp;</td><td> <div class="form-group row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div></td></tr>
            </table>


        </form>
    <form action="create_user.php" method="POST">
              <div class="form-group row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
        </form>

               
               
        </fieldset>
    </div>
      
		

    </body>
</html>
