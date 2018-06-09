<?php session_start();

include('baglanti.php'); 
if(($_SESSION['yetki']==2)){

if(isset($_FILES['kapakfoto'])){
  
   $hata = $_FILES['kapakfoto']['error'];

   if($hata != 0) {
      echo '<script>alert("Yüklenirken bir hata gerçekleşmiş.");</script>';
   } 

   else {
      $boyut = $_FILES['kapakfoto']['size'];
      
      if($boyut > (1024*1024))
      {
         echo '<script>alert("Dosya 1Mb dan büyük olamaz.");</script>';
      } 

        else 
        {
            $dosya_tipi =  array('jpeg','png' ,'jpg');
            $dosya_adi = $_FILES['kapakfoto']['name'];
            $uzanti = pathinfo($dosya_adi, PATHINFO_EXTENSION); //
            if(!in_array($uzanti,$dosya_tipi)) {
            echo '<script>alert("Yanlızca JPEG ve PNG dosyaları gönderebilirsiniz.");</script>';
          } 
 

         else { 
            
            //Yükleme işlemi-----------
                    if(isset($_POST['kapakkaydet'])){
                    echo  "girdi2";

                    $kapak_foto_adi=rand(1000,10000)."-".$_FILES['kapakfoto']['name']; 
                    $gecici_adi=$_FILES['kapakfoto']['tmp_name']; 
                    echo  "girdi3";
                    
                    if(move_uploaded_file($gecici_adi, "profil_kapak/".$kapak_foto_adi)){
                            
                            $kullanici_id=$_SESSION['kullanici_id'];
                            $kapakfoto_yolu="profil_kapak/".$kapak_foto_adi;

                            $kapak_foto_sorgu=mysqli_query($baglanti,"UPDATE kullanicilar SET kapak_foto='$kapakfoto_yolu' WHERE kullanici_id='$kullanici_id' ");

                            echo  "girdi4";
                            if($kapak_foto_sorgu){
                              
                                echo "<script>alert('Kapak Fotoğrafı Başarıyla Yüklendi');</script>";
                            }
                            else
                            {
                                echo "<script>alert('Kapak Fotoğrafı Yüklenemedi!');</script>";
                            }
                       }

                    }
         
             } 
         }
   } 

} 

?>

<!DOCTYPE>
<html>
<head>
<style type="text/css">
    .fotobtn{
        position: absolute; 
        right: 0px; 
        top: 0px; 
        z-index: 1; 
        font-size: 460px; 
        margin: 0px; 
        padding: 0px; 
        cursor: pointer; opacity: 0;
    }
</style>
<link rel="stylesheet" type="text/css" href="css/form-genel.css">
<link rel="stylesheet" type="text/css" href="css/ayarlar_profilfoto.css">

<body >
<style>
body{background:url('/picture/1071189876554072064') ;
        background-repeat:repeat repeat;
        background-attachment:fixed;
        background-color:#682261} a{color:}
</style>

<?php include'header.php' ?>

<section id="rw-layout" class="rw-layout">
  <div class="rw-section rw-container left-sidebar"> 
    <div class="rw-inner clearfix">
    

     <?php include'Ayarlar_sol.php' ?>
        <div class="rw-column rw-content">                                                    
        <div class="rw-row page-title"><strong>Profil Kapak Fotoğrafı</strong><p class="description">Kapak fotoğrafı profilinde üstte görünen seni yansıtan en önemli parçalardan biridir.</p>
        </div>                                                
        <div class="rw-row">                    
       
        <style>        
       
        </style>
        <div class="settings-items-container">    
        <div class="row">        
        
        <div class="">            
        <h2>Kapak fotoğrafın</h2>            

        <fieldset class="user-avatar" style="border: 0; margin: 0 0 10px 20px; width: 145px; top: inherit!important; right: inherit!important">                
        <figure>                    
        <div style="width: 135px; height: 135px; overflow: hidden;">                        
        <img src="img/ikon.jpg" width="135" height="135" alt="" style="border: 1px solid #c0c0c0;padding: 2px;margin:0;"> 
        </div>                
        </figure>            
        </fieldset>        
        </div>        

        <div class="">
        <h2>Bilgisayarınızdan fotoğraf seçin</h2>            
        <p class="well">Bilgisayarınızda kayıtlı olan fotoğrafı kapak fotoğrafı olarak ayarlayabilirsiniz. Kapak fotoğrafının sadece .jpeg ve .png formatlarında olabilir. Yükleyeceğin resim 700kb den büyük olmamalıdır.</p>            
         </div>  
    
    <form method="POST" action="" enctype="multipart/form-data">           
        <div class="button blue" >
        Fotoğrafı seç 
        <input class="fotobtn" type="file" name="kapakfoto" style=""></div>
        <br/>
        
        <div class="button blue" >
        Yükle
        <input class="fotobtn"  type="submit" name="kapakkaydet" style=""></div>

    </form>
         </div>    

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
