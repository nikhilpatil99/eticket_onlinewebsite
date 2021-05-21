<table border="1" width="100%"><thead>
<tr><td>S/N</td><td>Issue Date</td><td>Match Date</td><td>Seats</td><td>First name</td><td>Last Name</td><td>TicketID</td><td>Amount</td><td>Phone No.</td><td>Total Amount</td><td>Status</td><td>Seat No.</td><td>Time</td><td> Number of Tickets</td><td>User</td><td>Location</td></tr>
    </thead>
<?php
 $dated=$_GET['dateid'];
 $number=$_GET['numberid'];
$dated=explode("/", $dated);
          $dated=$dated[2]."-".$dated[0]."-".$dated[1];
 
  include '../include/sqlconn.php';
 $sql=" select * from ticket where vehicle_number='$number'and date_travel ='$dated'";
$result =mysqli_query($conn,$sql);
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