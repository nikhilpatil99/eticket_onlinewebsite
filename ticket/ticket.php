<?php  session_start();

        if ($_SESSION['auth'] !=1)
        {
       header("location:../login/login.php");
        }
        
        

require '../include/sqlconn.php';
$sqlselect="select DISTINCT route from price";
$sqlselect1="select * from bus_info ";
$sqlselect2="select * from bus_type order by name";
$sqlselect3="select match_time from bus_info order by match_time";
$sqlselect5="select * from location order by name";
$resultsel5 = mysqli_query($conn,$sqlselect5);
$resultsel = mysqli_query($conn,$sqlselect);
$resultsel1 = mysqli_query($conn,$sqlselect1);
$resultsel2 = mysqli_query($conn,$sqlselect2);
$resultsel3 = mysqli_query($conn,$sqlselect3);
$user=$_SESSION['user'];

?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title>
                 <script type="text/javascript" src="../script/datepicker.js"></script>
          <script type="text/javascript" src="../script/amount_ajax.js"></script>
<link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <script language="javascript" type="text/javascript">
    function openwin()
    {
        window.open('printticket.php', 'mywin', 'left =20,top=20,width=600,height=350,resizable=0');
        location.href='ticket.php';

    }
    </script>
       
        <?$format=m."/".d."/".y;
        $dated= date($format);?>

        <img src="/eticket/image/lay.jpg" alt="" align="left" >
        <img src="/eticket/image/Price.png" alt="" align="bottom" >
        
        <fieldset><legend><b>TICKETING</b></legend>
            <form method="POST" name="ticket" action="ticket.php">
                
 <table border="0" width="100%"><tr><td width="25%">
        <table border="1">

                    <tr>
                    <td>Lastname</td>
                    <td><input class="textfield" type="text" name="lastname" value="" class="field"/></td>
                </tr>

               <tr>
                    <td>Firstname</td>
                    <td><input class="textfield" type="text" name="firstname" value="" class="field"/></td>
                </tr>

                <tr>
                    <td>Phone Number</td>
                    <td><input class="textfield" type="text" name="phone" value="" /></td>
                </tr>
                           <tr>
                    <td>Match Date</td>
                    <td><input class="textfield" type="text" name="travel_date" value="" id="dated" READONLY onclick="show_calendar('ticket.travel_date'); " onchange="do_space('space');"><a href="javascript:show_calendar('ticket.travel_date');"><img src="../css/images/cal.gif" border="0"></a></td>
                </tr>
                <tr>
                        <td>Seats</td>
                        <td><select class="textfield" name="route" id="route" onchange="do_amount('amount')"><option value="" >Pick Seats</option><?php while ($row = mysqli_fetch_assoc($resultsel)){
    extract($row); echo "<option value='$route'>$route</option>"; } ?></select></td>
                    </tr>
                    <tr>
                    <td>Number of Tickets</td>
                    <td><select class="textfield" name="bus" id="bus_type" onchange="do_amount('amount')"><option value="" > Number of Tickets</option><?php while ($row = mysqli_fetch_assoc($resultsel2)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>
                    </tr>



                <tr>
                    <td>Fare Amount</td>
                    <td><input class="textfield" type="text" name="amount" value=""  id="amount"/></td>
                </tr>


                <tr>
                    <td>Match Name</td>
                     <td><select class="textfield" name="vechile_number" id="numb"  ><option value="" class="field">Seat Number</option><?php while ($row = mysqli_fetch_assoc($resultsel1)){
    extract($row); echo "<option value='$match_name'>$match_name</option>"; } ?></select></td>
                    </tr>
                           <tr>
                        <td>Location</td>
                        <td><select class="textfield" name="location"><option value="">Pick Location</option><?php while ($row = mysqli_fetch_assoc($resultsel5)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>
                    </tr>
                <tr>
                    <td>Match Time</td>
                   <td><select class="textfield" name="departure"><option value="" class="field">Pick Time</option><?php while ($row = mysqli_fetch_assoc($resultsel3)){
    extract($row); echo "<option value='$match_time'>$match_time</option>"; } ?></select></td>
                    </tr>

                <tr>
                    <td colspan="2" align="center"><input class="formbutton" type="submit" value="Submit"  name="submit" class="submit"  /></td>

                </tr>
                
        </table>

</td><td width="75%" id="space" valign="top"></td></tr></table>
        <?php
        
          if (isset ($_POST['submit']))
        {
             $format='y'."-".'m'."-".'d';
        $dated= date($format);

           include 'ticketid.php';
          $travel_dater =trim($_POST['travel_date']);
          $travel_date=explode("/", $travel_dater);
          $travel_date=$travel_date[2]."-".$travel_date[0]."-".$travel_date[1];

            $route =trim($_POST['route']);
              $lastname =trim($_POST['lastname']);
              $firstname =trim($_POST['firstname']);
              $phone_number =trim($_POST['phone']);
              $amount =trim($_POST['amount']);
              $total_amount =$amount;
              $ticketid=$route."00".$num;
              $payment_status ="Paid";
              $dep_time =trim($_POST['departure']);
              $vechile_number =trim($_POST['vechile_number']);
              $bus =($_POST['bus']);
              $location =trim($_POST['location']);
              $_SESSION['ticketid']=$ticketid;
              
$sqlselect79="select avail_ticket from route where route_name='$route'";
$resultsel79=mysqli_query($conn,$sqlselect79);
while($row79= mysqli_fetch_assoc($resultsel79))
{ 
    $total9=$row79['avail_ticket'];
    
}
if($total9==0){
    echo "<font color='red'>"."Tickets are Full of $route"."</font>";
}
              
else if (!empty ($amount) && !empty ($firstname) && !empty ($vechile_number) && !empty ($bus) && !empty ($travel_dater) ){
$sql ="insert into ticket(date_issue,date_travel,route,firstname,lastname,ticketid,fare_amount,phone_number,total_amount,payment_status,vehicle_number,dep_time,bus_type, user, location)value('$dated','$travel_date','$route','$firstname','$lastname','$ticketid','$amount','$phone_number','$total_amount','$payment_status','$vechile_number',' $dep_time','$bus', '$user', '$location')";
mysqli_query($conn,$sql);

$sqlview = "select * from ticket where ticketid='$ticketid'";
$resultview = mysqli_query($conn,$sqlview);
echo "<table>";
while ($row1 = mysqli_fetch_assoc($resultview))
{
    extract($row1);
   echo "<tr><td>Customer Name</td><td>".$firstname." ".$lastname. "</td></tr>" ;
   echo "<tr><td>Seats</td><td>$route</td></tr>";
   echo "<tr><td>Amount</td><td>$fare_amount</td></tr>";
   echo "<tr><td>Time</td><td>$dep_time</td></tr>";
   echo "<tr><td>Number of Tickets</td><td>$bus</td></tr>";
   echo "<tr><td>Location</td><td>$location</td></tr>";
   echo "<tr><td><input class='formbutton' type='submit' name='dt' value='Delete' /></td><td><input class='formbutton' type='button' value='Generate Ticket' name='gtg' onclick='openwin();' /></td></tr>";

}

echo "</table>";

         }
            else
          {
              echo "<font color='red'>"."Fill all fields"."</font>";
           }

        }

        ?>
        <?php
        if(isset ($_POST['dt']))
        {
            $sqldel ="delete from ticket where ticketid='$ticketid'";
            mysqli_query($conn,$sqldel);
        }

        ?>
        </form>
        </fieldset>
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

?></table><table align="centre" border="4.5px" width="97%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Ticket Details</h1>
            <tr style="background-size: 5px"><td>Seat Name</td><td>Number of tickets</td></tr></thead>
                <?php
require '../include/sqlconn.php';
 $sqlselect7="select avail_ticket from route where route_name='$route'";
$resultsel7=mysqli_query($conn,$sqlselect7);
while($row7= mysqli_fetch_assoc($resultsel7))
{   echo "<tr><td>$route</td>";
    $total=$row7['avail_ticket'];
    $rem=$total-$bus;
    echo "<td>$rem</td>";
    echo "</tr>";    
}
if($total==0){
      echo "<font color='red'>"."Tickets are Full of $route"."</font>";
}
else{
    $sqlselect9="UPDATE route SET avail_ticket='$rem' WHERE route_name='$route'";
mysqli_query($conn,$sqlselect9);
}
?></table>
     
    </body>
</html>
