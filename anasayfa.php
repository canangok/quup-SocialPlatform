<?php session_start(); 
include 'baglanti.php';
if(($_SESSION['yetki']==2)){

$kullanici_id=$_SESSION['kullanici_id'];


$bilgiler_sorgu=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id='$kullanici_id' ");
$bilgiler=mysqli_fetch_array($bilgiler_sorgu);



$tum_paylasimlar = mysqli_query($baglanti, "SELECT * FROM takip as t INNER JOIN paylasimlar as p ON t.takipedilen_id=p.kullanici_id INNER JOIN kullanicilar as k ON t.takipedilen_id = k.kullanici_id WHERE t.takipeden_id  ='$kullanici_id' ORDER BY p.eklenme_tarihi DESC ");




$takip = mysqli_query($baglanti,"SELECT * FROM takip INNER JOIN paylasimlar ON takip.takipedilen_id=paylasimlar.kullanici_id WHERE takip.kullanici_id = '$kullanici_id' "); 


if(isset($_GET['kullanici'])){

$profil_id = $_GET['kullanici'];
  $kullanici_getir_sorgu = mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id = '$profil_id' ");
  $kullanici_getir = mysqli_fetch_array($kullanici_getir_sorgu);


}

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

if(isset($_GET['durum'])){

$paylasim_id = $_GET['paylasim_id'];
$paylasimsahibi_id=$_GET['kullanici'];
$durum=$_GET['durum'];

if($durum == 'begen'){
  $begeni_kayit = mysqli_query($baglanti,"INSERT INTO begeniler(kullanici_id,paylasim_id,paylasimsahibi_id,bildirim) VALUES('$kullanici_id','$paylasim_id','$paylasimsahibi_id','1')");

  if($begeni_kayit){
      echo "begenildi";
  }
  else{
      echo "sorgu çalışmadı";
  }
}else{
  $begeni_sil = mysqli_query($baglanti,"DELETE FROM begeniler WHERE paylasim_id='$paylasim_id' AND kullanici_id='$kullanici_id' ");
  if ($begeni_sil) {
    echo "begeni silindi";
  }
  else{
    echo "begeni silinemediii";
  }
}

}


?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/anasayfa.css">
<link rel="stylesheet" type="text/css" href="css/paylasim.css">
<style type="text/css">
  .center2{
    margin-top: -8%;
    margin-left: 80%;
  }


</style>
</head>

<body >
<style>
body{background:url('/picture/1071189876554072064') ;background-repeat:repeat repeat;background-attachment:fixed;background-color:#682261} a{color:}</style>

<?php include 'header.php' ?>

<section id="rw-layout" class="rw-layout">
  <div class="rw-section rw-container left-sidebar"> 
    <div class="rw-inner clearfix">
     
        <?php include 'anasayfa_sol.php' ?>
        
      <div class="rw-column rw-content rw-main-content" style="margin-top: -26%;" >
        <div class="rw-row" >
          <div class="new-post-container" id="div1" style="margin-top: -67%;">
         <?php include 'yeni_post.php'; ?>
         <div>
        
         <br/>
                

<?php while($paylasimlar = mysqli_fetch_array($tum_paylasimlar)){ 
    
    $yorumsorgu=mysqli_query($baglanti,"SELECT * FROM yorumlar INNER JOIN kullanicilar ON yorumlar.kullanici_id=kullanicilar.kullanici_id WHERE paylasim_id='".$paylasimlar["paylasim_id"]."' ");

    


      if(isset($_SESSION['kullanici_id'])){

          $begeni_kontrol = mysqli_query($baglanti,"SELECT * FROM begeniler WHERE paylasim_id = '".$paylasimlar["paylasim_id"]."' AND kullanici_id='".$_SESSION['kullanici_id']."' ");

          $begeni_kontrol_sonuc = mysqli_fetch_array($begeni_kontrol);

      }

        $begeni_sayac=mysqli_query($baglanti,"SELECT COUNT(begeni_id) AS toplambegeni FROM begeniler WHERE paylasim_id ='".$paylasimlar["paylasim_id"]."' ");
       $begeni=mysqli_fetch_array($begeni_sayac)['toplambegeni']; 

  ?>

<div style="width: 100%;height:auto;">

<div style="width:100%;height: auto;" >
    <div style="width: 64px;height: 64px;">
       <a href="#"><div style="width: 60px;height: 60px;"><img src="<?php 
                  echo $paylasimlar['profil_foto'];
                   ?>" style="width:50px;"></div></a>
            
    </div>
         
           
     <div class="isim">
       <a href="profil.php?kullanici=<?php echo $paylasimlar['kullanici_id']; ?>"><?php echo $paylasimlar['kullanici_adi'];?> </a>

                 
     </div>     
      <a href="#" style="color:#808080;text-decoration: none;">  
     <div class="paylasim-kutusu">
        <div class="paylasim-div">
      <?php echo "".$paylasimlar["aciklama"];?>
    </div>
    <div class="" style="">

    <?php if(($paylasimlar['gorsel_yolu'])!=""){ ?>
              <img style="width: 50%;" src="<?php echo $paylasimlar['gorsel_yolu']; ?>">  
         <?php }
         else{
             echo "";
           }
        ?>
     
    </div>
    </div> </a> 

</div>


  <div class="paylasim-menu">
    <div><a href="#"><img src="img/heart-128.png" style="width: 20px;margin-top: -3px;"/></a></div>
    <div><a href="#" style="margin-left: -12px;">&nbsp&nbsp&nbsp<?php echo $begeni;?></a></div>
    
<div>
<?php if($begeni_kontrol_sonuc > 0){ ?>

  <a class="a" href="anasayfa.php?paylasim_id=<?php echo $paylasimlar['paylasim_id']; ?>&durum=begenme&kullanici=<?php echo $paylasimlar['kullanici_id']; ?>" >beğenmekten vazgeç</a>
    <?php }else { ?>
         <a class="a" href="anasayfa.php?paylasim_id=<?php echo $paylasimlar['paylasim_id']; ?>&durum=begen&kullanici=<?php echo $paylasimlar['kullanici_id']; ?>">beğen</a>
    <?php } ?>



</div>
 <div style="float: right;"><a href="#"><?php echo $paylasimlar['eklenme_tarihi']; ?></a></div>

  </div>


  <?php  

  while($yorumlar=mysqli_fetch_array($yorumsorgu)){?>
  <form action="anasayfa.php?yorum_id=<?php echo $yorumlar['yorum_id']; ?>" method="POST">
  <div id="aciliyor" class="yorum-penceresi">
  <div><img src=" <?php  echo $yorumlar['profil_foto']; ?>" style="width: 35px;"></div>
  <div class="yorum-form">
  <div><?php $yazi = $yorumlar['yorum'];
             echo  substr($yazi,0,80)."<br/>";
   ?></div>
   </div>

  <?php if($yorumlar['kullanici_id'] == $_SESSION['kullanici_id']) {?>
  <div class="btn"><input type="submit" name="yorumsil" value="Yorumu Sil"/></div>
   <?php } ?>

</div>
</form>
<?php }
?>

  <form action="anasayfa.php?paylasim_id=<?php echo $paylasimlar['paylasim_id']; ?>&kullanici=<?php echo $paylasimlar['kullanici_id']; ?>" method="POST">
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


               
        </div>
      </div>

      
    </div>
  </div>

       
</section>

</body>
</html>

<?php }
else{
  header("Location:giris.php");
}

?>

