<?php 
include 'baglanti.php';

$_kullanici = $_GET['kullanici'];

$kullanici_id = $_SESSION['kullanici_id'];


if(isset($_POST['yorumyap'])){

$yorum = $_POST['yorum'];
$paylasim_id = $_GET['paylasim_id'];
$paylasimsahibi_id = $_GET['kullanici'];


$yorum_ekle = mysqli_query($baglanti,"INSERT INTO yorumlar(yorum,kullanici_id,paylasim_id,paylasimsahibi_id) VALUES('$yorum','$kullanici_id','$paylasim_id','$paylasimsahibi_id' ) ");

if($yorum_ekle){
  echo "<script>alert('Yorum Yüklendi !!);</script>";
}else{
  echo "<script>alert('Yorum Yüklenemedi!');</script>";
}

} 
 
$profil_paylasim = mysqli_query($baglanti,"SELECT * FROM paylasimlar INNER JOIN kullanicilar ON paylasimlar.kullanici_id = kullanicilar.kullanici_id WHERE paylasimlar.kullanici_id = '$_kullanici' ORDER BY paylasimlar.eklenme_tarihi DESC "); //getten gelen veriye göre



if(isset($_POST['yorumsil'])){

$yorum_id = $_GET['yorum_id'];	

$yorumsil = mysqli_query($baglanti,"DELETE FROM yorumlar WHERE yorum_id ='$yorum_id' ");
  if($yorumsil){
  	echo "";
  }
  else{
  	echo "yorum silinemedi";
  }
}



if(isset($_POST['gonderisil'])){
$paylasim_id = $_GET['paylasim_id'];

$gonderisil = mysqli_query($baglanti,"DELETE FROM paylasimlar WHERE paylasim_id = '$paylasim_id' ");
$yorum_sil = mysqli_query($baglanti,"DELETE FROM yorumlar WHERE paylasim_id = '$paylasim_id' ");
$begeni_sil =mysqli_query($baglanti,"DELETE FROM begeniler WHERE paylasim_id='$paylasim_id' ");


  if($gonderisil || $yorum_sil || $begeni_sil){
  	echo "";
  }else{
  	echo "gonderi silinemedi";
  }
}

//begeni kayit

if(isset($_GET['durum'])){

$paylasim_id = $_GET['paylasim_id'];
$paylasimsahibi_id=$_GET['kullanici'];
$durum=$_GET['durum'];

if($durum == 'begen'){
  $begeni_kayit = mysqli_query($baglanti,"INSERT INTO begeniler(kullanici_id,paylasim_id,paylasimsahibi_id,bildirim) VALUES('$kullanici_id','$paylasim_id','$paylasimsahibi_id','1')");

  if($begeni_kayit){
      
  }
  else{
      
  }
}else{
  $begeni_sil = mysqli_query($baglanti,"DELETE FROM begeniler WHERE paylasim_id='$paylasim_id' AND kullanici_id='$kullanici_id' ");
  if ($begeni_sil) {
    
  }
  else{
    
  }
}

}

?>


<html>
<head> 
<link rel="stylesheet" type="text/css" href="css/paylasim.css">
<style type="text/css">

</style>

</head>
<body>
 <?php while($profil_paylasim_getir = mysqli_fetch_array($profil_paylasim)){ 
 	
   $yorumsorgu=mysqli_query($baglanti,"SELECT * FROM yorumlar JOIN kullanicilar ON yorumlar.kullanici_id=kullanicilar.kullanici_id WHERE paylasim_id='".$profil_paylasim_getir["paylasim_id"]."' ");

    $begeni_sayac=mysqli_query($baglanti,"SELECT COUNT(begeni_id) AS toplambegeni FROM begeniler WHERE paylasim_id ='".$profil_paylasim_getir["paylasim_id"]."' ");
       $begeni=mysqli_fetch_array($begeni_sayac)['toplambegeni']; 

 if(isset($_SESSION['kullanici_id'])){

   $begeni_kontrol=mysqli_query($baglanti,"SELECT * FROM begeniler WHERE paylasim_id='".$profil_paylasim_getir['paylasim_id']."' AND kullanici_id='".$_SESSION['kullanici_id']."' ");

   $begeni_kontrol_sonuc = mysqli_fetch_array($begeni_kontrol);
 }

 	?>
<div style="width: 100%;height:auto;">
<div style="width:100%;height: auto;" >
    <div style="width: 64px;height: 64px;margin-top: 15px;">
       <a href="#"><div style="width: 60px;height: 60px;">
   <?php if(isset($_GET['kullanici'])){ ?>
			
				 <img src="<?php echo $kullanici_getir['profil_foto']; ?>" style="width:50px;"></div></a>
			<?php } ?>
			
    </div>
         
           
     <div class="isim">
       <a href="profil.php?kullanici=<?php echo $_SESSION['kullanici_id']; ?>"><b><?php if(isset($_GET["kullanici"])){
                  echo $kullanici_getir['kullanici_adi'];
                      
                  } ?> </a></b>
     </div>     
				
      <div class="paylasim-kutusu">
        <div class="paylasim-div">
      <?php echo "".$profil_paylasim_getir["aciklama"];?>
    </div>
    <div class="" style="">

	
    
    <?php if($profil_paylasim_getir['kullanici_id'] == $_SESSION['kullanici_id']) {?>
    	<form action="profil.php?paylasim_id=<?php echo $profil_paylasim_getir['paylasim_id']; ?>&kullanici=<?php echo $profil_paylasim_getir['kullanici_id']; ?>" method="POST">
		<div style="float: right;margin-top: -20px;" class="btn"><input type="submit" name="gonderisil" value="Gönderiyi Sil"/></div>
		</form>
   <?php } ?>
	


    <?php if(($profil_paylasim_getir['gorsel_yolu'])!=""){ ?>
              <img style="width: 50%;" src="<?php echo $profil_paylasim_getir['gorsel_yolu']; ?>">  
         <?php }
         else{
             echo "";
           }
        ?>
     
    </div>
    </div>    

</div>

	<div class="paylasim-menu">
	<div><a href="#"><img src="img/heart-128.png" style="width: 20px;margin-top: -3px;"/></a></div>
  <div><a href="#" style="margin-left: -12px;">&nbsp&nbsp&nbsp<?php echo $begeni;?></a></div>
		<div>

  <?php if($begeni_kontrol_sonuc > 0){ ?>

  <a class="a" href="profil.php?paylasim_id=<?php echo $profil_paylasim_getir['paylasim_id']; ?>&durum=begenme&kullanici=<?php echo $profil_paylasim_getir['kullanici_id']; ?>" >beğenmekten vazgeç</a>
    <?php }else { ?>
         <a class="a" href="profil.php?paylasim_id=<?php echo $profil_paylasim_getir['paylasim_id']; ?>&durum=begen&kullanici=<?php echo $profil_paylasim_getir['kullanici_id']; ?>">beğen</a>
    <?php } ?>

</div>
 <div style="float: right;"><a href="#"><?php echo $profil_paylasim_getir['eklenme_tarihi']; ?></a></div>


	</div>
		
  <?php  

  while($yorumlar=mysqli_fetch_array($yorumsorgu)){?>
  <form action="profil.php?yorum_id=<?php echo $yorumlar['yorum_id']; ?>&kullanici=<?php echo $profil_paylasim_getir['kullanici_id']; ?>" method="POST">
  <div id="aciliyor" class="yorum-penceresi">

  <div><img src=" <?php  echo $yorumlar['profil_foto']; ?>" style="width: 35px;"></div>
  <div class="yorum-form">
  <div><p><?php $yazi = $yorumlar['yorum'];
             echo  substr($yazi,0,80)."<br/>";
   ?></p></div>
   </div>

  <?php if($yorumlar['kullanici_id'] == $_SESSION['kullanici_id']) {?>
  <div class="btn"><input type="submit" name="yorumsil" value="Yorumu Sil"/></div>
   <?php } ?>

</div>
</form>
<?php } ?>


 <form action="profil.php?paylasim_id=<?php echo $profil_paylasim_getir['paylasim_id']; ?>&kullanici=<?php echo $profil_paylasim_getir['kullanici_id']; ?>" method="POST">
<div id="aciliyor" class="yorum-penceresi">
  <div><img src=" <?php  echo $bilgiler['profil_foto']; ?>" style="width: 35px;"></div>
  <div class="yorum-form"><input type="text" name="yorum" placeholder="yorum ekleyin..." /></div>
  <div class="btn"><input type="submit" name="yorumyap" value="Gönder"/></div>

</div>
</form>

	
</div>

<br/>
<br/>
<hr/>
<?php } ?>



</body>
</html>