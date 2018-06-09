<?php
include 'baglanti.php';
$kullanici_id=$_SESSION['kullanici_id'];

$bilgiler_sorgu=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id='$kullanici_id' ");
$bilgiler=mysqli_fetch_array($bilgiler_sorgu);

if($_GET){

  @$profil_id = $_GET['kullanici'];
  $kullanici_getir_sorgu = mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id = '$profil_id' ");
  $kullanici_getir = mysqli_fetch_array($kullanici_getir_sorgu);
}



if(isset($_POST["paylas"])){

  $aciklama=$_POST["yazi"];

      if(@$boyut > (1024*1024))
      {
         echo '<script>alert("Dosya 1Mb dan büyük olamaz.");</script>';
      } 

        else 
        {
            $dosya_tipi =  array('jpeg','png' ,'jpg');
            $dosya_adi = $_FILES['resim']['name'];
            $uzanti = pathinfo($dosya_adi, PATHINFO_EXTENSION); //
            if(in_array($uzanti,$dosya_tipi)) {

                    $resim_adi=rand(1000,10000)."-".$_FILES['resim']['name']; 
                    $gecici_adi=$_FILES['resim']['tmp_name']; 
            
                    
                    if(move_uploaded_file($gecici_adi, "paylasimlar/".$resim_adi)){
                            
                            $kullanici_id=$_SESSION['kullanici_id'];
                            $gorsel_yolu="paylasimlar/".$resim_adi;

                          $paylasim_sorgu1=mysqli_query($baglanti,"INSERT INTO paylasimlar(kullanici_id,gorsel_yolu,aciklama) value('$kullanici_id','$gorsel_yolu', '$aciklama')");

                    
                            if($paylasim_sorgu1){
                                
                                echo "<script>alert('Fotoğraf Başarıyla Yüklendi');</script>";
                            }
                            else
                            {
                                echo "<script>alert('Fotoğraf Yüklenemedi!');</script>";
                            }
                       }
            
          }
          else{
             $paylasim_sorgu2=mysqli_query($baglanti,"INSERT INTO paylasimlar(kullanici_id,aciklama) value('$kullanici_id', '$aciklama')");

                          
                            if($paylasim_sorgu2){
                                
                                echo "<script>alert('Yazı Başarıyla Yüklendi');</script>";
                            }
                            else
                            {
                                echo "<script>alert('Yazı Yüklenemedi!');</script>";
                            }
            
          } 

}
}


 ?>


<html>
<head>
	<style type="text/css">
        .replace{
            width:90%;  

        }
        .qq-upload-button{
            position: relative; 
            overflow: hidden; 
            direction: ltr;
            width:50px;     
        }
        
    </style>
</head>
<body>
 
   
            
            <form enctype="multipart/form-data" id="postEntry" name="postEntry" method="POST" action="" >    

             

                 <div class="media media-post"><a class="pull-left hidden-xs" href="#">
                
                 <img src ="<?php echo $bilgiler['profil_foto']; ?> " class="no-margin avatar media-object" style="width: 50px;margin-top: -3px;"></a>         
             
                     <div class="media-body">   
                  

                     <div class="form-group replace" >                    
                     <textarea class="form-control" placeholder="Yaz gitsin.." name="yazi"></textarea>                
                     </div>   

                     <div class="form-group new-post-actions">                    
                     <div class="row">                        
                     <div class="center">                                                                                    
                     <ul class="reset-list new-post-add-objects">                                
                     <li>                                    
                     <a href="#" class="upload-image b">                
                      <div id="file-uploader">
                           <div class="qq-uploader">
                              <div class="qq-upload-button replacebtn">
                               <img class="kamera" src="img/kamera.png" style="width: 30px;">
                             
                              <input multiple="multiple" type="file" name="resim" style="position: absolute; right: 0px; top: 0px; z-index: 1; font-size: 460px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                         </div>
                         <ul class="qq-upload-list"></ul>
                         </div>
                         </div>                                    
                       </a>                                
                       </li>                                

                      

                       </ul>                                                    
                       </div>                        

                       <div class="center2 text-right right">
                       <span class="new-post-action-socials"></span>                           
                       <button class="button orange qcb" type="submit" name="paylas">Gönder</button>                        
                       </div>                    
                       </div>                
                       </div>                
                    
                  
                     </div> 
           
                         
                  </div>        
            
    
       </form>  

</body>
</html>
