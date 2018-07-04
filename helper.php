<?php
$file = fopen("a.csv","w+");
$aaa = "a.csv";
$str = $_POST['start'];
$en =  $_POST['end'];
$range = range($str, $en);

$row = 1;
if (($handle = fopen("Daily_". $_POST['ID'].".csv","r")) !== FALSE) {
  while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
    if($row<=25){
        $num = count($data);
        for($i = 0; $i<$num; $i++){
        fwrite($file, $data[$i]);
        fwrite($file,",");
        }
        fwrite($file,"\n");
        $row++;
        continue;
    }
    if((in_array($data[1], $range))&&(!(empty($data[5])))){
    $num = count($data);
    for($i = 0; $i<$num; $i++){
        fwrite($file, $data[$i]);
        fwrite($file,",");
    }
    fwrite($file,"\n");
    $row++;
  }
  }
  fclose($handle);
}


if (file_exists($aaa)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($aaa).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($aaa));
    readfile($aaa);
    exit;
}
else{
}
fclose($file);
fclose($file1);
?>


