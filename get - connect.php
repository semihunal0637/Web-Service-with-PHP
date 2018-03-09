<?php

$veritabani = pg_connect("host=localhost port=5432 dbname=bilgiler user=postgres password='06370637'");



$result = pg_query("SELECT * FROM uyeler");
 
$json = array();
$total_records = pg_num_rows($result);
//echo $total_records;
 
if($total_records > 0){
  while ($row = pg_fetch_assoc($result)){
    $json[] = $row;
  }
}

echo json_encode($json);



/*
$result = pg_query($veritabani,"SELECT * FROM uyeler");
$json=array();

$sonuc=pg_fetch_row($result);
$json[]=$sonuc;

//echo json_encode($json);

//echo "</br>altsatır</br>";
 $x=0;
while($sonuc=pg_fetch_assoc($result))
{
	//echo $sonuc[0];
	//echo $sonuc[1];
	echo json_encode($json);
	if(x==0){
	$json[]=$sonuc;}
	$x=$x+1;
}

echo json_encode($json);

ÖNCEKİ HALİ DENEME İÇİN KAPATTIM
*/

?>