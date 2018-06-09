<?php 
session_start();

include('baglanti.php'); 


if(isset($_POST['kullanici_giris']))
{

	$email=$_POST["email"];
	$sifre = md5($_POST["sifre"]);

	$giris_sorgu=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE email = '$email' and sifre = '$sifre' ");
	$giris_goster=mysqli_fetch_array($giris_sorgu);

	if($giris_goster){
		$_SESSION['kullanici_id']=$giris_goster['kullanici_id'];
		$_SESSION['email']=$giris_goster['email'];
		$_SESSION['sifre']=$giris_goster['sifre'];
		$_SESSION['adsoyad']=$giris_goster['ad_soyad'];
		$_SESSION['kullanici_adi']=$giris_goster['kullanici_adi'];
		$_SESSION['yetki']=$giris_goster['yetki'];

		if($_SESSION['yetki']==2){
			
			header("Location:anasayfa.php?giris=basarili&kullanici_id=".$_SESSION['kullanici_id']);
		}
		else{
			
		    header("Location:giris.php?giris=basarisiz");
		}
	}
	else
	{
		header("Location:giris.php?giris=basarisiz");
	}

}


?>

