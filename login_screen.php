<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>
	<title>K&oslashbenhavns Trampolinklub</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<?php

 include 'ConnectionFileOracle.php';

// define variables and set to empty values
$Uname = "";
$nameErr="";
$adminpassword = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["Uname"])) {
     $nameErr = "Name or password is required";
   } 
   if (empty($_POST["adminpassword"])) {
     $nameErr = "Name or password is required";
   } 
   else {
     $Uname = test_input($_POST["Uname"]);
     $adminpassword = test_input($_POST["adminpassword"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

 
<div class="boxed">
<br>
  <h2>Admin Login</h2> <br>
	<form method="post"> 
   		Username: <input type="text" name="Uname" value="<?php echo $Uname;?>" class="loginBox">* <br> <br>
   		Password: <input type="password" name="adminpassword" value="<?php echo $adminpassword;?>" class="loginBox">* <br>
   		<?php echo $nameErr; 
   		?> 


  		 <br><br>
   
   		<br><br>
   		<input type="submit" name="submit" value="Submit"> 
	</form>

</div>

<?php
$loginerror= "";

$query = $con -> prepare(" SELECT username from ADMINS where username = '$Uname' and password = '$adminpassword'");
$query -> execute();
$query_result = $query -> fetchAll();

  
echo $Uname;
	if (empty($query_result))
	{
    if (empty($Uname))
    { 
    
    }
    else{
		$loginerror = "The username or password didnt match";
    }
	}
	else 
	{
		echo "<meta http-equiv=\"refresh\" content=0;URL=main.php?Ausename=$Uname>";
	}
echo '<font class="intoBox">'.$loginerror.'</font>';

$_SESSION['LOGIN_PASSWORD'] = $adminpassword;
$_SESSION['LOGIN_USERNAME'] = $Uname;
?>


</body>
</html>