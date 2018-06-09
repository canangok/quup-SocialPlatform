<?php 
session_start(); 
include("baglanti.php");

if(($_SESSION['yetki']==2)){

$kullanici_id=$_SESSION['kullanici_id'];

$kullanici_bilgi_sorgu=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id='$kullanici_id' ");
$kullanici_bilgi=mysqli_fetch_array($kullanici_bilgi_sorgu);

if(isset($_POST['hesapkaydet'])){
$email=$_POST['email'];
$kullaniciAdi=$_POST['kullaniciAdi'];
$adsoyad=$_POST['adsoyad'];
$cinsiyet=$_POST['cinsiyet'];
$dogumtarih=$_POST['gun']."-".$_POST['ay']."-".$_POST['yil'];
$yer = $_POST['yer'];

$kullanici_bilgilerini_guncelle=mysqli_query($baglanti,"UPDATE kullanicilar SET 
ad_soyad='$adsoyad', email='$email',kullanici_adi='$kullaniciAdi', cinsiyet='$cinsiyet', dogum_tarihi ='$dogumtarih',yer = '$yer'
WHERE kullanici_id='$kullanici_id' ");

if($kullanici_bilgilerini_guncelle){
  echo "<script>alert('Başarıyla Kaydedildi!')</script";
}
else{
  echo "<script>alert('Kaydedilemedi!')</script";
}

}

?>

<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/form-genel.css">
</head>
<body >
<style>
body{background:url('/picture/1071189876554072064') ;background-repeat:repeat repeat;background-attachment:fixed;background-color:#682261} a{color:}


</style>

<?php include'header.php' ?>

<section id="rw-layout" class="rw-layout">
  <div class="rw-section rw-container left-sidebar"> 
    <div class="rw-inner clearfix">
    

     <?php include'Ayarlar_sol.php' ?>
      <div class="rw-column rw-content">                                                    
      <div class="rw-row page-title">
      <strong>Hesap</strong><p class="description">Bu bölümde aşağıda yer alan hesap bilgilerini değiştirebilirsin.</p></div> 
      <div class="rw-row">       
      
      <form method="POST" action="" class="form-horizontal" novalidate="novalidate">    
      <div class="settings-items-container">        
      
      <div class="form-group">            
      <label class="center control-label" style="margin-top: -5px;"> E-Posta </label>            
     <div class="center2" >
      <input class="form-control" id="DisplayName" name="email" type="text" value="<?php echo $_SESSION['email'] ?>" style="">
             
      </div>              
            
      </div> 

      <div class="form-group"><label class="center control-label" style="margin-top: -1px;">Kullanıcı Adı</label>            
      <div class="center2" >
      <input class="form-control" id="DisplayName" name="kullaniciAdi" type="text" value="<?php echo $_SESSION['kullanici_adi'] ?>" style="">
             
      </div>                    
      </div>  

      <div class="form-group">
      <label  class="center control-label" >Ad, Soyad</label>
      <div class="center2" >
      <input class="form-control" id="DisplayName" name="adsoyad" type="text" value="<?php echo $_SESSION['adsoyad'] ?>" style="">
             
      </div>        
      </div>                
      <div class="form-group">            
      <label  class="center control-label">Cinsiyet</label>            
      <div class="center2">                               
       <select id="Gender" class="form-control" name="cinsiyet" value="<?php echo $kullanici_bilgi['cinsiyet']; ?>" >
       <option value="Seçiniz">Seçiniz</option>
       <option value="Kadın">Kadın</option>
       <option value="Erkek">Erkek</option>
       </select>            
       </div>        
       </div>                

       <div class="form-group" >            
       <label for="LastName" class=" control-label" style="width: 25%;">Doğum Tarihi</label>            
       <div class="" style="width:66%;float:right;" >                
       <div class="row">                    
       <div class="" style="width: 24%;float: left;margin-left: -11%;">                        
       <select  id="Day" name="gun" class="form-control" value="" >
         <?php for ($i=1; $i <32 ; $i++) { ?>
          <option value="<?php echo $i ?>"><?php echo $i ?></option>
       <?php }?>n>
       </select>                    
       </div>                    

       <div class="center" style="" >                        
       <select id="Month" name="ay" class="form-control" value="" >
         <?php for ($i=1; $i <13 ; $i++) { ?>
          <option value="<?php echo $i ?>"><?php echo $i ?></option>
       <?php }?>n>
       </select>                    
       </div>                    

       <div class="center" style="width: 24%;margin-left: 2%;">                        
       <select  id="Year" name="yil" class="form-control" >
       <?php for ($i=2018; $i >1905 ; $i--) { ?>
          <option value="<?php echo $i ?>"><?php echo $i ?></option>
       <?php }?> 
       </select>                    

       </div>                
       </div>            
       </div>        
       </div>        

       <div class="form-group">            
       <label class="center control-label">Bulunduğum yer</label>            
       <div class="center2" >                
       <input style="" class="input-validation-error form-control" id="Location" name="yer" type="text" value="<?php echo $kullanici_bilgi['yer']; ?>" autocomplete="off">
             
       </div>        
       </div>        

       <div class="form-group" style="margin-bottom:20%;">            
       <div class="" style="width: 75%;margin-left: 25%;float: left;">                
       <a href="#" class="button link">Hesabımı Dondur</a>                
       <br>                
       <a href="#" class="button link">Hesabımı Sil</a>            
       </div>        
       </div>   
       
       <hr>        
       <div class="form-group">            
       <div class="" style=" margin-left: 27%;float: left;width: 75%;">                
       <input type="submit" name="hesapkaydet" class="button blue"  value="Kaydet">            
       </div>        
       </div>    
       </div>    
       </form> 


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

