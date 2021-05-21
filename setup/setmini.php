<?php session_start();
echo "<b>".$_SESSION['user']."</b><br>";
?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title>
         <link href="../css/login.css" rel="stylesheet" type="text/css" />
        <script language="javascript" type="text/javascript">
        function getsub()
        {
            var url =document.getElementById("edit").value;
            top.frames['main'].location.href=url;
        }
        </script>
    </head>
    <body>
    <center><h1>Administrator</h1></center>
<fieldset style="width:80%"><legend><b>Update</b></legend>
    <select name="EDIT" onchange="getsub()" id="edit"  ><option value="../setup/setmain.php">Select</option>
        <option value="../businfo/busupdate.php">Match Information edit</option>
        <option value="../bustype/bustypeupdate.php">Number of seats edit</option>
        <option value="../company/companyupdate.php">Company info edit </option>
        
        
        <option value="../price/priceupdate.php">Price Info edit</option>
        <option value="../route/routeupdate.php">Seat Info edit</option>
        
        <option value="../login/locationupdate.php">Location Edit</option>
        <option value="../login/create_userupdate.php">User Edit</option>
        <option value="../login/userupdate.php">Role Edit</option>
    </select>

</fieldset>
    <br>
<fieldset style="width:80%"><legend><b>Main</b></legend>
    <ul type="square">
    <li>Setup<ul>
    <li><a href="../businfo/businfo.php" target="main">Match Information</a></li>
    <li><a href="../company/company.php" target="main">Company</a></li>
    
    
    <li><a href="../price/price.php" target="main">Price Info</a></li>
    <li><a href="../route/route.php" target="main">Seats Info </a></li>
    <li><a href="../login/location.php" target="main">Location</a></li>
    <li><a href="../login/create_user.php" target="main">Create User</a></li>
    <li><a href="../login/user.php" target="main">Role Info</a></li>
    <li><a href="../login/password.php" target="main">Change password</a></li>
    </ul>
    <li><a href="../ticket/ticket.php" target="main">Ticket Booking</a></li>
    <li><a href="../query/datequery.php" target="main"  >Reports</a></li>
    </li>
</ul>
</fieldset>
<br>



        <?php
        // put your code here
        ?>
        <a href="../login/logout.php" target=_top> Logout</a>
    </body>
</html>