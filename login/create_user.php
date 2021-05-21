<?php require '../include/sqlconn.php';
$sqlselect="select * from location order by name";
$sqlselect1="select * from role";
$resultsel = mysqli_query($conn,$sqlselect);
$resultsel1 = mysqli_query($conn,$sqlselect1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stadium Seat Ticket Booking</title> <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <fieldset><legend><b>CREATE USER</b></legend>
        <form action="create_user.php" method="POST">
            <table border="0">

                    <tr>
                        <td>Name</td>
                         <td><input class="textfield" type="text" name="name" value="" /></td> </tr>
                      <tr>
                        <td>Password</td>
                        <td><input class="textfield" type="text" name="password" value="" /></td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><select class="textfield" name="location"><option value="">Pick Location</option><?php while ($row = mysqli_fetch_assoc($resultsel)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>
                    </tr>
                    <tr>
                        <td>Right</td>
                        <td><select class="textfield" name="rig"><option value="">Pick Role</option><?php while ($row = mysqli_fetch_assoc($resultsel1)){
    extract($row); echo "<option value='$name'>$name</option>"; } ?></select></td>

                    </tr>
                      <tr>
                        <td>Email ID</td>
                        <td><input class="textfield" type="text" name="email" value="" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="formbutton" type="submit" value="Submit" name="submit" /></td>

                    </tr>
                    

            </table>
          

        </form>
          <form action="login.php" method="POST">
              <div class="form-group row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Login </button>
                    </div>
                </div>
        </form>
        </fieldset>
         <?php


        // put your code here
          if (isset ($_POST['submit']))
        {

            $name =trim($_POST['name']);
              $password =trim($_POST['password']);
              $location =trim($_POST['location']);
              $rig=trim($_POST['rig']);
              $email= trim($_POST['email']);
     
$sqlsearch = "select * from user where user_name = '$name'";
$results= mysqli_query($conn,$sqlsearch);
  $s= mysqli_num_rows($conn,$results) ;
if  ($s == 0 && !empty ($name) && !empty ($password) && !empty ($location) && !empty ($rig) && !empty($email))
{

      $sql ="insert into user value('$name','$password','$rig','$location','$email')";
      $result =mysqli_query($conn,$sql);
      if($result){
    echo "<center>"."<font color='red' >"."User $name login has been added to database"."</font>"."</center>";
}}
else
{
    if($s !=0){
        echo "<center>"."<font color='red' >"."user $name info is in database already"."</font>"."</center>";
  
}
else{ 
    echo"<center>"."<font color='red'>"."Fill all fields"."</font>"."</center>";

}
}

        }
?>
        
    </body>
</html>
