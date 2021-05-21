<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <fieldset><legend><b>SEATS  INFO</b></legend>
        <form action="route.php" method="POST">
            <table border="0">

                    <tr>
                        <td>Name of Seats</td>
                        <td><input class="textfield" type="text" name="name_route" value="" /></td>
                    </tr>
                     <tr>
                        <td>Number of Seats</td>
                        <td><input class="textfield" type="text" name="noticket" value="" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="formbutton" type="submit" value="Submit" name="submit" /></td>

                    </tr>
                
            </table>

        </form>
        </fieldset>
        <?php
        // put your code here
        if (isset ($_POST['submit']))
        {

          $route=trim($_POST['name_route']);
          $notick=trim($_POST['noticket']);
          

            require '../include/sqlconn.php';
            if (!empty ($route)){

            
            $sql="insert into route(route_name,avail_ticket) value('$route','$notick')";
            mysqli_query($conn,$sql);
            }
            else
            {
                echo "<font color='red'>"."Fill all fields"."</font>";
            }
        }

        ?>
    </body>
</html>

