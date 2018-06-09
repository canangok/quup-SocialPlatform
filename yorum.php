<?php 
include 'baglanti.php';
$kullanici_id = $_SESSION['kullanici_id'];

  if(isset($_POST['yorumyap'])){

$yorum = $_POST['yorum'];
$paylasim_id = $paylasimlar['paylasim_id'];
$paylasan_id= $paylasimlar['kullanici_id'];

$yorum_ekle = mysqli_query($baglanti,"INSERT INTO yorumlar(yorum,kullanici_id,paylasim_id,paylasimsahibi_id) value('$yorum','$kullanici_id','$paylasim_id','$paylasan_id' ) ");

if($yorum_ekle){
  echo "<script>alert('Yorum Yüklendi !!);</script>";
}else{
  echo "<script>alert('Yorum Yüklenemedi!');</script>";
}

} 


?>
<!DOCTYPE html>
<html>
<head>

<style type="text/css">
.show2{
	display: block;
}
.yorum-penceresi{
	width: 90%;
	height: 60px;
	background-color: #edf0f0;
	margin :15px 10px 10px 88px;

}
.yorum-form input{
	padding: 7px 10px;
    margin: 5px 10px 19px 10px;
    border-radius: 5px;
    border: 1px solid #c8c9d3;
    background: #fff;
    color: #384142;
    width:300px;
}
.yorum-penceresi div{
	display: inline-block;
}
.btn input{
	padding: 7px 10px;
    margin: 5px 10px 19px 5px;
    border-radius: 5px;
    border: 1px solid #c8c9d3;
    color: #fff;
    height: 40px;;
	background-color: #42b4e4; 
	
}
</style>
</head>
<body>


  <?php  

  while($yorumlar=mysqli_fetch_array($yorumsorgu)){?>
  <form action="" method="POST">
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
<?php } ?>


 <form action="anasayfa.php?paylasim_id=<?php echo $paylasimlar['paylasim_id']; ?>&kullanici=<?php echo $paylasimlar['kullanici_id']; ?>" method="POST">
<div id="aciliyor" class="yorum-penceresi">
  <div><img src=" <?php  echo $bilgiler['profil_foto']; ?>" style="width: 35px;"></div>
  <div class="yorum-form"><input type="text" name="yorum" placeholder="yorum ekleyin..." /></div>
  <div class="btn"><input type="submit" name="yorumyap" value="Gönder"/></div>

</div>
</form>


</body>
</html>
