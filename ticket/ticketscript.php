<?php
 $route=$_GET['routeid'];
 $bus_type=$_GET['busid'];
  include '../include/sqlconn.php';
 $sql=" select * from price where route='$route'and name ='$bus_type'";
$result =mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
        extract($row);
        echo $amount;
}
?>
