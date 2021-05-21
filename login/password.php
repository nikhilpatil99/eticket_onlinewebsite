<?php session_start();
require '../include/sqlconn.php';

$sqlselect3="select * from user ";
$sqlselect1="select * from role";

$resultsel3 = mysqli_query($conn,$sqlselect3);
$resultsel1 = mysqli_query($conn,$sqlselect1);


?>
<fieldset><legend><b>ADMIN CHANGE PASSWORD</b></legend>

    <br/>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <form action="password.php" method="POST">
            <table border="0">

                    <tr>
                        <td>Username</td>
                        <td><select class="textfield" name="use"><option value="">Pick user</option><?php while ($row = mysqli_fetch_assoc($resultsel3)){
    extract($row); echo "<option value='$user_name'>$user_name</option>"; } ?></select></td>
                    </tr>
                     <tr>
                        <td>Old Password</td>
                        <td><input class="textfield" type="password" name="pass" value="" /></td>
                    </tr>
                      
                    <tr>
                        <td><input class="formbutton" type="submit" value="Submit" name="submit" /></td><td><input class="formbutton" type="button" value="Retry" onClick="window.history.go(-1)" /></td>

                    </tr>

 	 

            </table>
            </form>

<?php
if(filter_input(INPUT_POST,'submit')){
     $use = trim(filter_input(INPUT_POST, 'use'));
     $pass = trim(filter_input(INPUT_POST, 'pass'));
      
$_SESSION['use']=$use;

    $sqlsearch = "select * from user where user_name = '$use' and password='$pass'";
    $results= mysqli_query($conn,$sqlsearch);
  $s= mysqli_num_rows($results) ;
    if  ($s == 1){

echo" <form action='passscript.php' method='POST'>";
echo"<table>";
echo"<tr>.<td>New Password</td>.<td><input class='textfield' type='text' name='pass1' value='' /></td>.</tr>";
echo"</table>";echo"<tr>";
echo"<td><input class='formbutton' type='submit' value='Submit' name='submit2' /></td>";
echo"</tr>";
echo"</form>";
    }}
           
          


        ?>
      </fieldset>
     <table align="centre" border="5px" width="100%" bgcolor="whitesmoke"><thead>
            <h1 align="center" style="background-size: 10px" >Admin Details</h1>
            <tr style="background-size: 5px"><td>S/N</td><td>Admin name</td><td>Password</td><td>Role</td><td>Email Id</td><td>Mobile number</td></tr>
    </thead>
<?php
require '../include/sqlconn.php';
				

				$query1="select * from user";
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

