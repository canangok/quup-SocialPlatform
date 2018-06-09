<?php 
include 'baglanti.php';

if(isset($_POST["kaydol"])){

echo "</br>";
	$adsoyad = $_POST["adsoyad"];
	$email = $_POST["email"];
	$sifre =md5($_POST["sifre"]);
	$kullaniciAdi = $_POST["kullaniciAdi"];


	$kayit = mysqli_query($baglanti,"INSERT INTO kullanicilar(ad_soyad,email,sifre,kullanici_adi,profil_foto,kapak_foto) VALUES('$adsoyad','$email','$sifre','$kullaniciAdi','avatarlar/ikon.jpg','profil_kapak/cover.jpg' )");

    
     
     if($kayit){
         $kullanicilar=mysqli_query($baglanti,"SELECT kullanici_id FROM kullanicilar WHERE email = '$email' ");
      $kullanici=mysqli_fetch_array($kullanicilar);

      $kullanici_id=$kullanici['kullanici_id'];
      
      $takipekle=mysqli_query($baglanti,"INSERT INTO takip(takipeden_id,takipedilen_id,bildirim) VALUES('$kullanici_id','$kullanici_id','0')");
        header("location:giris.php?kayit=basarili");
     	
     }
     else{
          
        header("location:kayitol.php?kayit=basarisiz");
     }
 }

?>