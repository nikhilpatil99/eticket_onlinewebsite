<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <fieldset><legend><b>Match Information</b></legend>
        <form action="businfo.php" method="POST">
            <table border="0">

                    <tr>
                        <td>Match Number</td>
                        <td><input class="textfield" type="text" name="match_no" value="" /></td>
                    </tr>
                    <tr>
                        <td>Match Name </td>
                        <td><input class="textfield" type="text" name="match_name" value="" /></td>
                    </tr>
                          <tr>
                    <td>Match Date</td>
                    <td><input class="textfield" type="text" name="match_date" value=""/></td>
                </tr>
                     <tr>
                        <td>Match Time </td>
                        <td><input class="textfield" type="text" name="match_time" value="" /></td>
                    </tr>
                     <tr>
                        <td>Match Location </td>
                        <td><input class="textfield" type="text" name="location" value="" /></td>
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

          $matchno=trim($_POST['match_no']);
          $matchname=trim($_POST['match_name']);
          $matchdate=trim($_POST['match_date']);
          $matchtime=trim($_POST['match_time']);
          $matchloc=trim($_POST['location']);

            require '../include/sqlconn.php';
            if (!empty ($matchno) && !empty ($matchname) && !empty ($matchdate) && !empty ($matchtime) && !empty ($matchloc) ){


            $sql="insert into bus_info(match_no,match_name,match_date,match_time,location) value('$matchno', '$matchname','$matchdate','$matchtime','$matchloc')";
            mysqli_query($conn,$sql);
            }
            else
            {
                echo "<font color='red'>"."Fill all fields"."</font>";
            }
        }
      
        ?>
        <br>
        <?php    include '../bustype/bustype.php';
        ?>
    </body>
</html>

