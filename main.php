<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>K&oslashbenhavns Trampolinklub</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php 
include 'ConnectionFileOracle.php';
if(!isset($_SESSION['LOGIN_USERNAME'])){
   echo "<meta http-equiv=\"refresh\" content=0;URL=login_screen.php>";};

$Get_Uname = $_GET['Ausename'];


echo"<h1> Velkommen $Get_Uname  </h1>";
$LOGIN_USERNAME = $_SESSION['LOGIN_USERNAME'];
$LOGIN_PASSWORD = $_SESSION['LOGIN_PASSWORD'];





$springer_query = $con -> prepare("SELECT NAVN, SVAERHEDSREKORT ,KOMMENDEKONKURRENCER, JSOBL from SPRINGER");
$springer_query ->execute();
$springer_query_result = $springer_query -> fetchAll();
?>
<table id="table1"> 
		<tr> 
			<th>Tilf&oslashj springer</th>
		</tr>
		<tr>
			<td>
				<form method="post">
				<input type='input' name='springernavn'/>
				<input type='submit' name='submit'/>
				</form>
			</td>
		</tr>
		<tr>
			<th>
			<ul>
    			 <li><a href="#">Log ud</a></li>
  			</ul>
  			</th>
		</tr>
</table>




<table style="margin-left: 15%;">
	<table border="1">
			<tr>
				<th> Navn </th>
				<th> Sv&aelig;rhedsrekord </th>
				<th> Kommende Konkurrencer </th>
				<th> Obl rekord tid </th>
			</tr>

	<?php
		foreach ($springer_query_result as $row) {
			echo '<tr>
                    <td><a href = "springer.php?springernavn='.$row['NAVN'].'">'.$row['NAVN'].'</a> </td>
                    <td>'.$row['SVAERHEDSREKORT'].'</td>
                    <td>'.$row['KOMMENDEKONKURRENCER'].'</td>
                    <td>'.$row['JSOBL'].'</td>
                  </tr>';
		}

	echo "</table>";

 
 if (isset($_POST['submit'])) {
 	if(isset($_POST['springernavn'])){
		$springeren = $_POST['springernavn'];
		$new_jumper_query = $con -> prepare(
			"INSERT INTO Springer
	 		Values ('$springeren','','','','','','','','','','','','','','')");
		$new_jumper_query -> execute();
}}
?>
</body>
</html>