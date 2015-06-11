<!DOCTYPE html>
<html>
<head>
	<title>K&oslashbenhavns Trampolinklub</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"></title>
</head>
<body>
<?php include 'ConnectionFileOracle.php';

//Get name and write out h1
$Get_name = $_GET['springernavn'];
echo '<h1> Tr&aelig;ningsplan over '.$Get_name.' </h1>';

//Get values from DB
$springer_query = $con -> prepare("SELECT * from SPRINGER where navn ='$Get_name'");
$springer_query ->execute();
$springer_query_result = $springer_query -> fetchAll();
//assign variables from DB
foreach ($springer_query_result as $key)
{
	 $navn = $key['NAVN']; 
	 $skrue = $key['SKRUERETNING']; 
	 $maal = $key['MAAL']; 
	 $nyeSpring = $key['NYESPRING']; 
	 $fokusPunkter = $key['FOKUSPUNKTER']; 
	 $vejledendeTraeningsplan = $key['VEJLEDENDETRAENINGSPLAN']; 
	 $svaerhedsrekord = $key['SVAERHEDSREKORT']; 
	 $obl = $key['OBL']; 
	 $fri = $key['FRI']; 
	 $jsobl = $key['JSOBL']; 
	 $svaerFri = $key['SVAERFRI']; 
	 $kommendeKonkurrencer = $key['KOMMENDEKONKURRENCER']; 
	 $maalOevelse = $key['MAALOEVELSE']; 
	 $tiHoeje = $key['TIHOEJE']; 
	 $svaerhedKonkurrence= $key['SVAERHEDKONKURRENCE']; 
}
	//assign post variables to use for form
	$twist = $_POST['twist'];
	$svaerhed = $_POST['rekord'];
	$obljs = $_POST['js'];
	$svaerhedkonk = $_POST['konkurrence'];
	$hoeje = $_POST['10hoeje'];
	$traeningsplan = $_POST['plan'];
	$springsekvenser = $_POST['spring'];
	$fokus = $_POST['fokus'];
	$nyemaal = $_POST['maal'];
	$kommendekonk = $_POST['kommende'];
	$maalsekvenser = $_POST['maalsekvens'];
	$obll = $_POST['obl'];
	$frii = $_POST['fri'];
	$svaerfrii = $_POST['svaerfri'];
	

?>
<a href="main.php">Til forside </a>
<form method="POST" action="<?php echo $PHP_SELF;?>">
<table border="1" style="width:100%">
  <tr>
    <td>Skrue Retning</td>
    <td>Tid p&aring; J/S OBL</td> 
    <td>Rekord 10 h&oslash;je</td>
    <td>Sv&aelig;rhedsrekord</td>
    <td>Sv&aelig;rhedsrekord i konkurrence</td>
  </tr>
  <tr>
    <td><input name="twist" style="width: 100%; height: 100%; border: none; font-size: 24px;" value="<?php echo $skrue;?>"></input></td>
    <td><input name="js" wrap="physical" style="width: 100%; height: 100%;border: none; font-size: 24px;" value="<?php echo $jsobl;?>"></input> </td> 
    <td><input name="10hoeje" wrap="physical" style="width: 100%; height: 100%; border: none; font-size: 24px;" value="<?php echo $tiHoeje;?>"></input></td>
    <td><input name="rekord" wrap="physical" style="width: 100%; height: 100%; border: none; font-size: 24px;"value="<?php echo $svaerhedsrekord;?>"></input></td>
    <td><input name="konkurrence" wrap="physical" style="width: 100%; height: 100%; border: none; font-size: 24px;" value="<?php echo $svaerhedKonkurrence;?>"></input></td>
  </tr>
</table>
<br />

	<table border="1" style="width:60%">
  		<tr>
    		<td>M&aring;l</td>
    		<td>OBL</td>
    		<td>Sv&aelig;r FRI</td>
  		</tr>
  		<tr>
  			<td><textarea rows="15" name="maal" style="width: 100%; height: 100%; border: none;"><?php echo $maal;?></textarea></td>
  			<td><textarea rows="15" name="obl" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $obl;?></textarea></td>
  			<td><textarea rows="15" name="svaerfri" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $svaerFri;?></textarea></td>
  		</tr>
 		 <tr>
  			<td>Kommende Konkurrencer</td>
  			<td>FRI</td>
  			<td>M&aring;l &Oslash;velse</td>
  		</tr>
  		<tr>
  			<td><textarea rows="15" name="kommende" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $kommendeKonkurrencer;?></textarea></td>
  			<td><textarea rows="15" name="fri" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $fri;?></textarea></td>
  			<td><textarea rows="15
  			" name="maalsekvens" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $maalOevelse;?></textarea></td>
  		</tr>
 	</table>

<table border="1" style="width:100%">
  <tr>
  	<td>Vejledende tr&aelig;ningsplan</td>
  	<td>Fokuspunkter</td>
  	<td>Nye Spring/Sekvenser</td>
  </tr>
  <tr>
  	<td><textarea rows="10" cols="45" name="plan" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $vejledendeTraeningsplan;?></textarea></td>
  	<td><textarea rows="10" cols="45" name="fokus" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $fokusPunkter;?></textarea></td>
  	<td><textarea rows="10" cols="45" name="spring" wrap="physical" style="width: 100%; height: 100%; border: none;"><?php echo $nyeSpring;?></textarea></td>
  </tr>
</table>
<input type="submit" value="submit" name="submit">
</form>

<?php 
		if (isset($_POST['submit'])) {
			$change_query = $con -> prepare(
				"UPDATE springer 
				SET SKRUERETNING = '$twist',
					MAAL = '$nyemaal',
					NYESPRING = '$springsekvenser',
					FOKUSPUNKTER = '$fokus',
					VEJLEDENDETRAENINGSPLAN = '$traeningsplan',
					SVAERHEDSREKORT = '$svaerhed',
					OBL = '$obll',
					FRI = '$frii',
					JSOBL = '$obljs',
					SVAERFRI = '$svaerfrii',
					KOMMENDEKONKURRENCER = '$kommendekonk',
					MAALOEVELSE = '$maalsekvenser',
					TIHOEJE = '$hoeje',
					SVAERHEDKONKURRENCE = '$svaerhedkonk'
				WHERE NAVN = '$Get_name'
				");
			$change_query ->execute();
			$location = "springer.php?springernavn=$Get_name"; 
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';

		}

 ?>
