<?php
include "db.php";
include "function.php";


header('Access-Control-Allow-Origin: *');//Sonradan eklendi.
header('Content-Type:application/json');//Sonradan eklendi.

$islem = isset($_GET["islem"]) ? addslashes(trim($_GET["islem"])) : null;
$jsonArray = array(); // array değişkenimiz bunu en alta json objesine çevireceğiz. 
$jsonArray["hata"] = FALSE; // Başlangıçta hata yok olarak kabul edelim. 
 
$_code = 200; // HTTP Ok olarak durumu kabul edelim. 

$_method = $_SERVER["REQUEST_METHOD"]; // client tarafından bize gelen method

// aldığımız işlem değişkenine göre işlemler yapalım. 
if($_method  == "POST") {
    // üye ekleme kısmı burada olacak. CREATE İşlemi 
	
	
	
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST") {
	
 // verilerimizi post yöntemi ile alalım. 
    $kullaniciadi = addslashes($_POST["kullaniciadi"]);
	echo $kullaniciadi;
    $adsoyad = addslashes($_POST["adsoyad"]);
    $sifre = addslashes($_POST["sifre"]);
    $posta = addslashes($_POST["posta"]);
    $telefon = addslashes($_POST["telefon"]);
    echo "postagirdi";
	echo $kullaniciadi;
	echo "adlıkisi";
    // Kontrollerimizi yapalım.
    // gelen kullanıcı adı veya e-posta veri tabanında kayıtlı mı kontrol edelim. 
   // $uyeler = $db->query("SELECT * from uyeler WHERE kullaniciadi='$kullaniciadi' OR posta='$posta'");
    //$uyeler = pg_query($db,"SELECT * FROM uyeler WHERE kullaniciadi='$kullaniciadi' OR posta='$posta'");
    if(empty($kullaniciadi) || empty($adsoyad) || empty($sifre) || empty($posta) || empty($telefon)) {
    	$_code = 400; 
 $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
        $jsonArray["hataMesaj"] = "Boş Alan Bırakmayınız."; // Hatanın neden kaynaklı olduğu belirtilsin.
 }
  /*  else if(!filter_var($posta,FILTER_VALIDATE_EMAIL)) {
    	$_code = 400;
        $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
        $jsonArray["hataMesaj"] = "Geçersiz E-Posta Adresi"; // Hatanın neden kaynaklı olduğu belirtilsin. 
    }
	*/else if($kullaniciadi != kullaniciadi($kullaniciadi)){ // kullaniciAdi fonksiyonunu db.php dosyası içerisinden bakabilirsiniz.
        $_code = 400;
        $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
        $jsonArray["hataMesaj"] = "Geçersiz Kullanıcı Adı"; // Hatanın neden kaynaklı olduğu belirtilsin.    
    }
	/*else if(FALSE) {
    	$_code = 400;
        $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
        $jsonArray["hataMesaj"] = "Kullanıcı Adı Veya E-Posta Alınmış."; 
    }
	*/else {
		echo "hazirlik";
		echo $kullaniciadi;
	
		$result = pg_query("SELECT * FROM uyeler");
 

$total_records = pg_num_rows($result)+1;
echo $total_records;
echo "kisi var";
 
			
	
		//echo "kisi var";
		//$ekle = pg_query($db,"INSERT INTO uyeler(kullaniciadi,adsoyad,sifre,posta,telefon) values('$kullaniciadi','$adsoyad','$sifre','$posta','$telefon') ");
	$ekle=pg_query($conn,"INSERT INTO uyeler(id,kullaniciadi,adsoyad,sifre,posta,telefon) values($total_records,'$kullaniciadi','$adsoyad','$sifre','$posta','$telefon')");
	//$veriyaz = pg_query($conn,"INSERT INTO kullanicilar(karakterler) values('7')");
	/*	
 $ex = pg_prepare($db,"INSERT INTO uyeler set  
 kullaniciadi= :kadi, 
 adsoyad= :ads, 
 sifre= :pass, 
 posta= :mail, 
 telefon= :tlf");
 $ekle = $ex->execute(array(
 "kadi" => $kullaniciadi,
 "ads" => $adsoyad,
 "pass" => $sifre,
 "mail" => $posta,
 "tlf" => $telefon
 
 ));
 */
 if($ekle==true) {
 $_code = 201;
 $jsonArray["mesaj"] = "Ekleme Başarılı.";
 }else {
 $_code = 400;
 $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
       $jsonArray["hataMesaj"] = "Sistem Hatası.";
	   
 }
 }
 echo "bitti";
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}else if($_method == "PUT") {
    // üye güncelle kısmı burada olacak. PUT işlemi  
	
	
	
	 $gelen_veri = json_decode(file_get_contents("php://input")); // veriyi alıp diziye atadık.
    	
    	// basitçe bi kontrol yaptık veriler varmı yokmu diye 
     if( isset($gelen_veri->kullanici_adi) && 
     isset($gelen_veri->ad_soyad) && 
     isset($gelen_veri->posta) && 
     isset($gelen_veri->user_id) && 
     isset($gelen_veri->telefon)
     ) {
    
   /*  if(pg_query($db,"SELECT * FROM uyeler WHERE id='$gelen_veri->user_id'") == 0 ) {
 // Üye yok ise hata veriyoruz. 
 $_code = 400;
 $jsonArray["hata"] = TRUE;
 $jsonArray["hataMesaj"] = "Belirtilen id de üye bulunamadı.";
 }*/
 /*
 else if(!filter_var($gelen_veri->posta,FILTER_VALIDATE_EMAIL)) {
 // E-mail geçersiz ise hata veriyoruz.  
 $_code = 400;
 $jsonArray["hata"] = TRUE;
 $jsonArray["hataMesaj"] = "Geçersiz E-mail adresi.";
 }*/
 
 if(TRUE) {
 
  echo "burayı gördüysen";
	 echo $gelen_veri->user_id;
	 echo $gelen_veri->kullanici_adi;
	 echo $gelen_veri->ad_soyad;
	 echo $gelen_veri->posta;
	 echo $gelen_veri->telefon;
     // veriler var ise güncelleme yapıyoruz.
	if($conn)
	{
		echo "sonuc conn";
	}
	if($db)
	{
		echo "sonnuc db";
	}
	$q = pg_query($conn,"UPDATE uyeler SET kullaniciadi='$gelen_veri->kullanici_adi', adsoyad='$gelen_veri->ad_soyad', posta='$gelen_veri->posta', telefon='$gelen_veri->telefon' WHERE id=$gelen_veri->user_id ");
/*	 $q = $db->pg_prepare("UPDATE uyeler SET kullaniciadi= :kadi, adsoyad= :ad_soyad, posta= :posta, telefon= :telefon WHERE id= :user_id ");
 $update = $q->execute(array(
 "kadi" => $gelen_veri->kullanici_adi,
 "ad_soyad" => $gelen_veri->ad_soyad,
 "posta" => $gelen_veri->posta,
 "telefon" => $gelen_veri->telefon,
 "user_id" => $gelen_veri->user_id 
 ));*/
 // güncelleme başarılı ise bilgi veriyoruz. 
 if($q) {
 $_code = 200;
 $jsonArray["mesaj"] = "Güncelleme Başarılı";
 }
 else {
 // güncelleme başarısız ise bilgi veriyoruz. 
 $_code = 400;
 $jsonArray["hata"] = TRUE;
 $jsonArray["hataMesaj"] = "Sistemsel Bir Hata Oluştu";
 }
 }
 }else {
 // gerekli veriler eksik gelirse apiyi kulanacaklara hangi bilgileri istediğimizi bildirdik. 
 $_code = 400;
 $jsonArray["hata"] = TRUE;
 $jsonArray["hataMesaj"] = "kullanici_adi,ad_soyad,posta,telefon,user_id Verilerini json olarak göndermediniz.";
 }
	
	
	
	
	
	
	
}










else if($_method == "DELETE") {
    // üye silme işlemi burada olacak. DELETE işlemi 
	
	 if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))) {
 $user_id = intval($_GET["user_id"]);
 $userVarMi = $db->query("select * from uyeler where id='$user_id'")->rowCount();
 if($userVarMi) {
 
 $sil = pg_query($conn,"delete from uyeler where id='$user_id'");
 if( $sil ) {
 $_code = 200;
 $jsonArray["mesaj"] = "Üyelik Silindi.";
 }else {
 // silme başarısız ise bilgi veriyoruz. 
 $_code = 400;
 $jsonArray["hata"] = TRUE;
 $jsonArray["hataMesaj"] = "Sistemsel Bir Hata Oluştu";
 }
 }else {
 $_code = 400; 
 $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
     $jsonArray["hataMesaj"] = "Geçersiz id"; // Hatanın neden kaynaklı olduğu belirtilsin.
 }
 }else {
 $_code = 400;
 $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
    	$jsonArray["hataMesaj"] = "Lütfen user_id değişkeni gönderin"; // Hatanın neden kaynaklı olduğu belirtilsin.
 }
 
 
 
	
}









else if($_method == "GET") {
    // üye bilgisi listeleme burada olacak. GET işlemi 
	
	
    // üye bilgisi listeleme burada olacak. GET işlemi 
    
 
    // üye bilgisi listeleme burada olacak. GET işlemi 
    if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))) {
 $user_id = intval($_GET["user_id"]);
 //$userVarMi = $db->pg_query("select * from uyeler where id='$user_id'")->rowCount();
 $userVarMi=true;
 if($userVarMi) {
 
 $bilgiler = pg_query($conn,"select * from  uyeler where id='$user_id'");
 $sonuc=pg_fetch_assoc($bilgiler);
 //echo $sonuc;
 $jsonArray[]=$sonuc;
 $jsonArray[]=$sonuc;
 $jsonArray[]=$sonuc;
 $jsonArray[]=$sonuc;
 $_code = 200;
 
 }else {
 $_code = 400;
 $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
     $jsonArray["hataMesaj"] = "Üye bulunamadı"; // Hatanın neden kaynaklı olduğu belirtilsin.
 }
 }else {
 $_code = 400;
 $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
    	$jsonArray["hataMesaj"] = "Lütfen user_id değişkeni gönderin"; // Hatanın neden kaynaklı olduğu belirtilsin.
 }
	
	
}else {
    // hatalı bir parametre girilmesi durumunda burası çalışacak. 
    $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
    $jsonArray["hataMesaj"] = "Girilen İşlem Bulunmuyor."; // Hatanın neden kaynaklı olduğu belirtilsin. 
}
 
SetHeader($_code);
$jsonArray[$_code] = HttpStatus($_code);
echo json_encode($jsonArray);
?>