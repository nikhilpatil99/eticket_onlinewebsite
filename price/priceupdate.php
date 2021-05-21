<?php require '../include/sqlconn.php';
$sqlselect="select * from price";
$sqlselect1="select * from price";
$sqlselect2="select * from bus_type";
$resultsel = mysqli_query($conn,$sqlselect);
$resultsel1 = mysqli_query($conn,$sqlselect1);
$resultsel2 = mysqli_query($conn,$sqlselect2);
?>
<fieldset><legend><b>PRICE EDIT INFO</b></legend>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ETICKETING</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    
        <form action="priceupdate.php" method="POST">
            <table border="0">
                    <tr>
                        <td>Number of Seat</td>
                        <td><select class="textfield" name="noseat"><option value="">Pick Bus Type</option><?php while ($row = mysqli_fetch_assoc($resultsel2)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>
                    </tr>
                    <tr>
                        <td>Seat Name</td>
                        <td><select class="textfield" name="seatname"><option value="">Pick Bus Type</option><?php while ($row = mysqli_fetch_assoc($resultsel1)){
    extract($row); echo "<option value='$route'>$route</option>"; } ?></select></td>
                    </tr>

                      <tr>
                        <td>Amount</td>
                        <td><input class="textfield" type="text" name="amount" value="" /></td>
                    </tr>
                    <tr>
                        <td><input class="formbutton" type="submit" value="Submit" name="submit" /></td><td><input class="formbutton" type="button" value="Reset" onclick="location.href='priceupdate.php'" /></td>

                    </tr>

            </table>

        </form>
        </fieldset>
        <?php
        // put your code here

         $noseat = trim(filter_input(INPUT_POST,'noseat'));
           $seatname = trim(filter_input(INPUT_POST,'seatname'));
         
          $amount = trim(filter_input(INPUT_POST,'amount'));
        
         $sqlupdate ="update price set amount='$amount' where name='$noseat' and route='$seatname' "  ;
         mysqli_query($conn,$sqlupdate);
        

        ?>
          <table align="left" border="5px" width="100%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Match Details</h1>
            <tr style="background-size: 5px"><td>S/N</td><td>Number of Tickets</td><td>Amount</td></tr>
    </thead>
<?php
require '../include/sqlconn.php';
				

				$query1="select * from price";
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

