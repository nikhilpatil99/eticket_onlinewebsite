<?php require '../include/sqlconn.php';
$sqlselect="select * from bus_info";
$resultsel = mysqli_query($conn,$sqlselect);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
         <script type="text/javascript" src="../script/datepicker.js"></script>

    </head>


    <body>
<fieldset><legend><b>MATCH INFO DELETE</b></legend><form action="busupdate.php" method="POST">
<table><tr><td colspan="2">
<select class="textfield" name="match"><option value="">Pick Match Number</option><?php while ($row = mysqli_fetch_assoc($resultsel)){
    extract($row); echo "<option value='$match_no'>$match_no</option>"; } ?></select></td>
</tr><tr><td><input class="formbutton" type="submit" value="Delete" name="delete" /></td><td><input class="formbutton" type="submit" value="Reset" onclick="location.href='busupdate.php'" /></td></tr>
</table></form>
</fieldset>

<?php

$matchno = filter_input(INPUT_POST,'match');

if (!empty ($matchno)){
if (isset ($_POST['delete']))
{
  $sqldelete ="delete from bus_info where match_no ='$matchno'" ;
   $msql= mysqli_query($conn,$sqldelete);
   if ($msql)
   {
       echo $matchno." deleted Sucessfully";
   }
   else
   {
        echo $matchno." not deleted";
   }

}

}


?>
                <table align="left" border="5px" width="100%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Match Details</h1>
            <tr style="background-size: 5px"><td>Match Number</td><td>Match Name</td><td>Match Date</td><td>Match Time</td><td>Location</td></tr>
    </thead>
<?php
require '../include/sqlconn.php';
				

				$query1="select * from bus_info";
				$result=mysqli_query($conn,$query1);

$n=1;
while($row=mysqli_fetch_assoc($result)){
    
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