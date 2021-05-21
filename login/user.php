<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <fieldset><legend><b>ROLE TYPE</b></legend>
        <form action="user.php" method="POST">
            <table border="0">

                    <tr>
                        <td>Type of Role</td>
                        <td><input class="textfield" type="text" name="role_type" value="" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="formbutton" type="submit" value="Submit" name="submit" /></td>

                    </tr>

            </table>

        </form>
        </fieldset>
         <table align="left" border="5px" width="100%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Role Details</h1>
            <tr style="background-size: 5px"><td>S/N</td><td>Role Details</td></tr>
    </thead>
<?php
require '../include/sqlconn.php';
				

				$query1="select * from role";
				$result=mysqli_query($conn,$query1);

$n=1;
while($row=mysqli_fetch_assoc($result)){
   echo "<tr><td>$n</td>";
    foreach ($row as $value)
    {
        echo "<td>$value</td>";

   }
  echo "</tr>";
  $n++;
}
?></table>
    </body>

   <?php
        // put your code here
        if (isset ($_POST['submit']))
        {

          $name=trim($_POST['role_type']);


            require '../include/sqlconn.php';
            if (!empty ($name)){


            $sql="insert into role(name) value('$name')";
            mysqli_query($conn,$sql);
            }
            else
            {
                echo "<font color='red'>"."Fill all fields"."</font>";
            }
        }

        ?>