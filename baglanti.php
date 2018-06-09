<?php 

try{



	$baglanti = mysqli_connect("localhost","root","","quup");
	mysqli_set_charset($baglanti,"utf8");
	if($baglanti){
	
	//echo "Veritabanı bağlantısı BAŞARILI !!!";
	}
	
	else{
	throw new Exception("Veritabanı Sunucusuna Bağlanılamadı");
	}
}
catch(Exception $e)
{
	echo $e->getMessage();
	//echo "Bağlanti başarısız";
}

?>