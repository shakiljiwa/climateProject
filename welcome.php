
<html>
<body>
<h1>
Search results:
</h1>
</body>
</html>
<?php
echo "Name, Province, Station ID, Latitude (Decimal Degrees), Longitude (Decimal Degrees), Elevation (m), Daily Data First Year, Daily Data Last Year";
echo "<br>";
if (($handle = fopen("/Users/main/Sites/stationIDs.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 10000, ',')) !== FALSE) {
    $num = count($data);
    $city = strtolower($data[0]);
    $cityinput = strtolower($_POST["name"]);
    $stationID = $data[3];
    $stationIDinput = $_POST["ID"];
    $long = $data[6];
    $longinput = $_POST["long"];
    $lat = $data[7];
    $latinput = $_POST["lat"];
    if($cityinput != NULL){
    if(strpos($city,$cityinput)!==FALSE){
    	for ($z = 0; $z<18; $z = $z +1){
    	if(($z!=0)&&($z!=1)&&($z!=3)&&($z!=6)&&($z!=7)&&($z!=10)&&($z!=15)&&($z!=16)){
    		continue;
    	}
    	echo $data[$z];
    	echo " ";
    }
    	echo "<br>";
    }
   	}
   	if($stationIDinput!=NULL){
    if($stationIDinput==$stationID){
    	for ($z = 0; $z<18; $z = $z +1){
    	if(($z!=0)&&($z!=1)&&($z!=3)&&($z!=6)&&($z!=7)&&($z!=10)&&($z!=15)&&($z!=16)){
    		continue;
    	}
    	echo $data[$z];
    	echo " ";
    }
    	echo "<br>";
    }
	}
	if($longinput!=NULL){
    if(($longinput-0.25<=$long)&&($longinput+0.25>=$long)&&($latinput-0.25<=$lat)&&($latinput+0.25>=$lat)){
    	for ($z = 0; $z<18; $z = $z +1){
    	if(($z!=0)&&($z!=1)&&($z!=3)&&($z!=6)&&($z!=7)&&($z!=10)&&($z!=15)&&($z!=16)){
    		continue;
    	}
    	echo $data[$z];
    	echo " ";
    }
    	echo "<br>";
    }
	}
    $row++;
    }
  fclose($handle);
}
?>
<form action = "http://localhost/~jiwa/func/helper.php" method = "post">
	<br><br>
	<h1>Enter the Station ID and range you want daily data for.</h1><br>
  Station  ID:<input type="text" name="ID"><br>
  Start Year:<input type="text" name="start"><br>
  Stop Year:<input type="text" name="end"><br>
  <input type = "submit" value = "Submit"><br>
</form><br>
<img src="cloud.jpg" alt="Welcome" width="700" height="300">
