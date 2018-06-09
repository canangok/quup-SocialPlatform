<?php session_start(); 
include("baglanti.php");
if(($_SESSION['yetki']==2)){

$kullanici_id=$_SESSION['kullanici_id'];

if(isset($_POST['sifrekaydet'])){

$eski_sifre=$_SESSION['sifre'];
$eskisifre=md5($_POST['eskisifre']);
$yeni_sifre=md5($_POST['yenisifre']);
$tekrar_sifre=md5($_POST['tekrarsifre']);


if($eskisifre==$eski_sifre){

if($yeni_sifre==$tekrar_sifre){
    $sifre_guncelle = mysqli_query($baglanti,"UPDATE kullanicilar SET sifre='$yeni_sifre' WHERE kullanici_id='$kullanici_id' ");


        if($sifre_guncelle){
         header("Location:cikis.php"); 
            }
        else{ echo "<script>alert('Şifre Güncellenemedi!')</script"; }
}
        else{ echo "<script>alert('Şifre Güncellenemedi!')</script"; }

}else{
    echo "<script>alert('Şifre Güncellenemedi Tekrar Dene!!')</script";
}

}


?>

<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/form-genel.css">
  <style type="text/css">

  </style>
 
</head>
<body >
<style>
body{background:url('/picture/1071189876554072064') ;background-repeat:repeat repeat;background-attachment:fixed;background-color:#682261} a{color:}</style>

<?php include'header.php' ?>

<section id="rw-layout" class="rw-layout">
  <div class="rw-section rw-container left-sidebar"> 
    <div class="rw-inner clearfix">
    

     <?php include'Ayarlar_sol.php' ?>
      <div class="rw-column rw-content">                                                    
      
            <div class="rw-column rw-content">                                                    
            <div class="rw-row page-title"><strong>Şifre</strong>
            <p class="description">Bu bölümde şifreni değiştirebilirsin. Güvenlik için şifrenin en az 6 karakter uzunluğunda olması ve harfler ile rakamların karışımından oluşması gerekiyor. Şifreni kimseyle paylaşmamaya da özen göstermelisin.</p></div>

             <div class="rw-row">                    
             <form action="" method="POST" class="form-horizontal">    
             
             <div class="settings-items-container">        
             <div class="form-group">            
             <label for="OldPassword" class="center control-label" style="margin-top: -5px;">Kullandığın şifre</label>            
             <div class="center2"  >                
             <input class="input-validation-error form-control" id="OldPassword" name="eskisifre" type="password" value="" autocomplete="off" required="">
           
             </div>        
             </div>        

             <div class="form-group">           
             <label  class="center control-label" style="margin-left:-76.5%;margin-top: 3%;">Yeni şifren</label>            
             <div class="center2" style="margin-top: 15px;">                
             <input class="input-validation-error form-control" id="NewPassword" name="yenisifre" type="password" value="" autocomplete="off" required="">
                    
             </div>       
            </div>        

            <div class="form-group">            
            <label for="ConfirmPassword" class="center control-label" style="margin-left:-76.7%;margin-top:7%;">Yeni şifre tekrarı</label>            
            <div class="center2" style="margin-top: 15px;">                
            <input class="input-validation-error form-control" id="ConfirmPassword"  name="tekrarsifre" type="password" value="" autocomplete="off" required="">
                      
            </div>        
            </div>        

            <div class="form-group">                       
            <div class="center2" style="margin-top: 20px;margin-left: 27%;">                
            <input type="submit" class="button blue" value="Şifremi Değiştir" name="sifrekaydet">            
            </div>       
             </div>    
             </div>
             </form>                
             </div>            
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

