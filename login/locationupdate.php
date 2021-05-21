<?php require '../include/sqlconn.php';
$sqlselect="select * from location";
$resultsel = mysqli_query($conn,$sqlselect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
         <script type="text/javascript" src="../script/datepicker.js"></script>

    </head>


    <body>
        <fieldset><legend><b>LOCATION TYPE DELETE</b></legend><form action="locationupdate.php" method="POST">
<table><tr><td colspan="2">
<select class="textfield" name="bus"><option value="">Pick Location</option><?php while ($row = mysqli_fetch_assoc($resultsel)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>
</tr><tr><td><input class="formbutton" type="submit" value="Delete" name="delete" /></td><td><input class="formbutton" type="submit" value="Reset" onclick="location.href='bustypeupdate.php'" /></td></tr>
</table></form>
</fieldset>

<?php

$bus = filter_input(INPUT_POST,'bus');

if (!empty ($bus)){
if (isset ($_POST['delete']))
{
  $sqldelete ="delete from location where name ='$name'" ;
   $msql= mysqli_query($conn,$sqldelete);
   if ($msql)
   {
       echo $bus." deleted Sucessfully";
   }
   else
   {
        echo $bus." not deleted";
   }

}

}


?>
           <table align="left" border="5px" width="100%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Location Details</h1>
            <tr style="background-size: 5px"><td>S/N</td><td>Stadium Name</td><td>Location</td><td>Phone number</td></tr>
    </thead>
<?php
require '../include/sqlconn.php';
				

				$query1="select * from location";
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
</html>