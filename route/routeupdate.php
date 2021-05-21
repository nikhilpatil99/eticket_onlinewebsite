<?php require '../include/sqlconn.php';
$sqlselect="select * from route";
$resultsel = mysqli_query($conn,$sqlselect);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
         <script type="text/javascript" src="../script/datepicker.js"></script>

    </head>
    <body>
<fieldset><legend><b>ROUTE DELETE</b></legend><form action="routeupdate.php" method="POST">
<table><tr><td colspan="2">
<select class="textfield" name="route"><option value="">Pick Route</option><?php while ($row = mysqli_fetch_assoc($resultsel)){
    extract($row); echo "<option value='$route_name'>$route_name</option>"; } ?></select></td>
</tr><tr><td><input class="formbutton" type="submit" value="Delete" name="delete" /></td><td><input class="formbutton" type="submit" value="Reset" onclick="location.href='routeupdate.php'" /></td></tr>
</table></form>
</fieldset>

<?php

$route = filter_input(INPUT_POST,'route');

if (!empty ($route)){
if (isset ($_POST['delete']))
{
  $sqldelete ="delete from route where route_name ='$route'" ;
   $msql= mysqli_query($conn,$sqldelete);
   if ($msql)
   {
       echo $route." deleted Sucessfully";
   }
   else
   {
        echo $route." not deleted";
   }

}

}


?>
          <table align="left" border="5px" width="100%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Match Details</h1>
            <tr style="background-size: 5px"><td>S/N</td><td>Seat Name</td><td>Number Of Tickets</td></tr>
    </thead>
<?php
require '../include/sqlconn.php';
				

				$query1="select * from route";
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