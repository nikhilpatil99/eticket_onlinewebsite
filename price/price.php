<?php require '../include/sqlconn.php';
$sqlselect="select * from route  ";

$sqlselect2="select * from bus_type ";
$resultsel = mysqli_query($conn,$sqlselect);


$resultsel2 = mysqli_query($conn,$sqlselect2);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <fieldset><legend><b>PRICE INFO</b></legend>
        <form action="price.php" method="POST">
            <table border="0">

                    <tr>
                  
                        <td>Add Seats</td>
                        <td><select class="textfield" name="seats"><option value="">Pick Seats</option><?php while ($row = mysqli_fetch_assoc($resultsel)){
    extract($row); echo "<option value='$route_name'>$route_name</option>"; } ?></select></td>
                    </tr>
                      <tr>
                        <td>Number of Tickets:-</td>
                        <td><select class="textfield" name="noseats"><option value="">Pick Seat number</option><?php while ($row = mysqli_fetch_assoc($resultsel2)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>
                    </tr>
                      <tr>
                        <td>Amount:-</td>
                        <td><input class="textfield" type="text" name="amount" value="" /></td>
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
          
          $seats =trim($_POST['seats']);
            $noseats =trim($_POST['noseats']);
              $amount =trim($_POST['amount']);
          
            
           

          if (!empty ($seats) && !empty ($noseats) && !empty ($amount) ){


            $sql="insert into price(name,route,amount) value('$noseats', '$seats', '$amount')";
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

