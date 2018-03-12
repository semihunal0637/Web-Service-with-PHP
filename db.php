<?php



$conn = pg_connect("host=localhost port=5432 dbname=bilgiler user=postgres password='PASSWORD'");

if($conn == true ) {
            //echo "<h2><font color='green'>Bağlantı Başarıyla Yapıldı!</font></h2></br>";
}
else {
            echo "<h2><font color='red'>Bağlantı Sağlanamadı!</br></font>";
}
  


?>
