<?php session_start(); 
include('baglanti.php');
if(($_SESSION['yetki']==2)){

$kullanici_id=$_SESSION['kullanici_id'];
$kullanici_bilgi_sorgu=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id='$kullanici_id' ");
$kullanici_bilgi=mysqli_fetch_array($kullanici_bilgi_sorgu);

if(isset($_POST['bilgikaydet'])){
$web=$_POST['web'];
$hakkinda=$_POST['hakkinda'];
$hobi=$_POST['hobi'];
$link=$_POST['link'];
$etiket=$_POST['etiket'];

$bilgi_kaydet=mysqli_query($baglanti,"UPDATE kullanicilar SET websayfa='$web', hakkinda='$hakkinda', ilgi_alani='$hobi',linkler='$link', etiket='$etiket' WHERE kullanici_id='$kullanici_id' ");

if($bilgi_kaydet){
  echo "<script>alert('Bilgiler Başarıyla Güncellendi.');</script>";
}
else{
  echo "<script>alert('Bilgiler Güncellenemedi.');</script>";
}

}

?>

<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/form-genel.css">
<style type="text/css">
  
textarea {
    width: 100%;
    min-height: 100px;
}
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
        <div class="rw-row page-title">
        <strong>Profil</strong><p class="description">    Bu bölümde aşağıda yer alan kişisel bilgilerini ve avatarını değiştirebilir, gönderilerin sadece belirlediğin kişiler tarafından görülmesi için ayarlama yapabilir ya da istersen hesabını dondurabilirsin. Profilindeki boş olan alanları doldurduğun takdirde, seninle aynı özelliklerdeki diğer üyeleriyle karşılaşma ve tanışma şansın da artacak!Profil fotoğrafını düzenle</p></div>                                                

          <div class="rw-row">                    

       <form method="POST" action="" enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate">    
       <div class="settings-items-container">        
       <div class="form-group">            
       <label for="Web" class="center control-label" >Web Sayfası</label>            
       <div class="center3" >                
       <input class="input-validation-error form-control" id="Web" name="web" type="text" value="<?php echo $kullanici_bilgi['websayfa']; ?>" autocomplete="off">            
       </div>        

       </div>   

       <div class="form-group">            
       <label for="Biography" class="center control-label">Hakkımda</label>            
       <div class="center3">                
       <textarea class="input-validation-error form-control" id="Biography" name="hakkinda"><?php echo $kullanici_bilgi['hakkinda']; ?></textarea>
    
       </div>        
       </div>             

        <div class="form-group">            
        <label for="Hobbies" class="center control-label">İlgi alanlarım</label>            
        <div class="center3">                
        <textarea class="form-control" id="Hobbies" name="hobi" rows="2" style="overflow: hidden; word-wrap: break-word; resize: vertical; height: 100px;"><?php echo $kullanici_bilgi['ilgi_alani']; ?></textarea>          
        </div>        
        </div>        

        <div class="form-group">            
        <label class="center control-label">Linklerim</label>            
        <div class="center3">                
        <textarea class="form-control" id="Links" name="link" rows="2"style="overflow: hidden; word-wrap: break-word; resize: vertical; height: 100px;"><?php echo $kullanici_bilgi['linkler']; ?></textarea>              
        <span class="help-block">Yukarıdaki kutuya web sitenin, blogunun vs. adresini, her satıra bir adres gelecek biçimde yazabilirsin.</span>            
        </div>        
        </div>        

        <div class="form-group">            
        <label for="Tags" class="center control-label">Etiketlerim <strong class="tooltip" original-title="Etiketler sizi ortak ilgi alanlarına sahip kişilerle buluşturabilir. Etiketler en az 3 en fazla 40 karakterden oluşabilir ve en fazla 10 etiket girebilirsiniz.">?</strong></label>            
        <div class="center3">                

        <input class="form-control" id="Tags" name="etiket" type="text" value="<?php echo $kullanici_bilgi['etiket']; ?>" autocomplete="off">

        <ul class="tagEditor">
          
        </ul>

        <input type="hidden">
        <span class="help-block">Yeni eklemek için, etiketinizi yazıp boşluk bırakın yada enter tuşuna basın. En fazla 5 etiket yazabilirsiniz. Popüler etiketleri ve ilgili kullanıcıları <a href="#/">bu sayfadan</a> takip edebilirsiniz.                
        </span>            
        </div>        
        </div>        

        <div class="form-group">            
        <label for="NewWindow" class="center control-label">&nbsp;</label>            
        <div class="center3">                
        <div class="checkbox">                    
        <label>                        
        <input name="NewWindow" value="True" type="checkbox" checked="checked">Linkleri yeni pencerede aç                    
        </label>                
        </div>            
        </div>        
        </div>        

        <hr>
        <div class="form-group">            
        <label class="center control-label">&nbsp;</label>            
        <div class="center3">                
        <input type="submit" class="button blue" value="Kaydet" name="bilgikaydet">            
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

