<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" /> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <fieldset><legend><b>Add Number of Tickets</b></legend>
        <form action="../businfo/businfo.php" method="POST">
            <table border="0">

                    <tr>
                        <td>Number of Tickets</td>
                        <td><input class="textfield" type="text" name="ticket_no" value="" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="formbutton" type="submit" value="Submit" name="submit1" /></td>

                    </tr>

            </table>

        </form>
        </fieldset>
    </body>

   <?php
   require '../include/sqlconn.php';
        // put your code here
        if (isset ($_POST['submit1']))
        {

          $name=trim($_POST['ticket_no']);


            require '../include/sqlconn.php';
            if (!empty ($name)){


            $sql="insert into bus_type(name) value('$name')";
            mysqli_query($conn,$sql);
            }
            else
            {
                echo "<font color='red'>"."Fill all fields"."</font>";
            }
        }

        ?>