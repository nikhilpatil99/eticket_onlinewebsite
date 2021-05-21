<?php require '../include/sqlconn.php';
$sqlselect="select * from company_info";
$resultsel = mysqli_query($conn,$sqlselect);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
         <script type="text/javascript" src="../script/datepicker.js"></script>

    </head>


    <body>
<fieldset><legend><b>COMPANY DELETE</b></legend><form action="companyupdate.php" method="POST">
<table><tr><td colspan="2">
<select class="textfield" name="name"><option value="">Pick Name</option><?php while ($row = mysqli_fetch_assoc($resultsel)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>
</tr><tr><td><input class="formbutton" type="submit" value="Delete" name="delete" /></td><td><input class="formbutton" type="submit" value="Reset" onclick="location.href='bustypeupdate.php'" /></td></tr>
</table></form>
</fieldset>

<?php

$name = filter_input(INPUT_POST,'name');

if (!empty ($name)){
if (isset ($_POST['delete']))
{
  $sqldelete ="delete from company_info where name ='$name'" ;
   $msql= mysqli_query($conn,$sqldelete);
   if ($msql)
   {
       echo $name." deleted Sucessfully";
   }
   else
   {
        echo $name." not deleted";
   }

}

}


?>
          <table align="left" border="5px" width="100%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Match Details</h1>
            <tr style="background-size: 5px"><td>S/N</td><td>Match Number</td><td>Match Name</td><td>Match Date</td><td>Match Time</td><td>Location</td></tr>
    </thead>
<?php
require '../include/sqlconn.php';
				

				$query1="select * from company_info";
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