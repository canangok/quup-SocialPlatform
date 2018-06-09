<?php
include 'baglanti.php';

$kullanici_id=$_SESSION['kullanici_id'];
$sorgu=mysqli_query($baglanti,"SELECT COUNT(kullanici_id) AS toplamkullanici FROM kullanicilar" );


$kullanicilar = mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id ='".$_SESSION['kullanici_id']."' ");
$kullanici=mysqli_fetch_array($kullanicilar);

$kullanici_idler=mysqli_fetch_array($sorgu)['toplamkullanici'];

 ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/anasayfa_sol.css">
</head>
<body>
 <div class="rw-column rw-sidebar side-collapse">
        <div class="the-sidebar">
          <aside class="widget widget-menu">
            <div class="widget-posts-list widget-title-member" >
            <div class="post" >
                <div class="entry-photo" style="width: 100%;margin-top: -25px;">
                <a href="profil.php?kullanici_id=<?php echo $_SESSION['kullanici_id']; ?> ">
                <img style="width: 90px;margin-left: 3px;" src="<?php echo $kullanici['profil_foto']; ?>"></a>
                </div>  
                <div class="entry-title" style="margin-top: 90px;">
                <a  style="margin-top: 370px;margin-left: 20px;" href="profil.php?kullanici=<?php echo $_SESSION['kullanici_id']; ?>"><?php echo $_SESSION['adsoyad']; ?></a></div>
            </div>    
            </div>

            <div class="widget-posts-list">
            <ul class="list-unstyled sidebar-menu-items">
            <li><img src="img/n3.png"><a href="anasayfa.php">Akış</a></li>                                   
            </ul>        
            <ul class="list-unstyled sidebar-menu-items">
             <li><img src="img/Share-128.png" "><a href="profil.php?kullanici=<?php echo $_SESSION['kullanici_id']; ?>">Paylaşımlarım</a></li>            
             <li><img src="img/83-128.png"><a href="profil_yorumlar.php?kullanici=<?php  echo $_SESSION['kullanici_id']; ?>">Yorumlarım</a></li>            
             <li><img src="img/heart-01-128.png"><a href="profil_begeniler.php?kullanici=<?php  echo $_SESSION['kullanici_id']; ?>">Beğendiklerim</a></li>            
             <li><img src="img/pic.png"><a href="profil_fotograflar.php?kullanici=<?php  echo $_SESSION['kullanici_id']; ?>">Fotoğraflarım</a></li>                                  
             <li><img src="img/fire-128.png"><a href="anasayfa.php">Ana Akış</a></li>            
             <li><hr></li>            
             <li><img src="img/settings-128.png"><a href="Ayarlar_hesap.php">Ayarlar</a></li>        
             </ul>        
             <div class="sidebar-menu-expander tt hidden" title="" data-original-title="Menüyü Genişlet">            
             <hr>            
                
             </div>    
             </div>
          </aside>


          <div class="main-sidebar-whoisarround" style="height: 330px;">
            <aside class="widget widget-authors">
              <div>
                <h3>
                  <a href="#">Etrafımda Kimler Var</a>
                </h3>
              </div>

                <ul>
                <?php

                $idler= mysqli_query($baglanti,"SELECT * FROM kullanicilar ORDER BY kullanici_id DESC");
               $id=mysqli_fetch_array($idler);
                  
                    

                   $dizi[] = 10;
                   $dizi[0] = rand(2,$id['kullanici_id']);
                 
                 for($i=1;$i<10;$i++){ 
                  
                  $dizi[$i] = rand(2,$id['kullanici_id']);

                  for($j=$i;$j>=0;$j--){ 

                      if($dizi[$j]== $dizi[$i]){
                        $dizi[$j]=rand(2,$id['kullanici_id']);
                      }
                  }
            }
              for($i=0;$i<10;$i++){ 
                  

                  $sorgu4=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id='$dizi[$i]' ");
                  $sorgu5=mysqli_fetch_array($sorgu4);
                  if($sorgu5['kullanici_adi']!=""){
                      
                  ?>
                  <li>
                  <a href="profil.php?kullanici=<?php echo $sorgu5['kullanici_id']; ?>"><img style="width: 35px;margin-left: -35px;" src="<?php echo $sorgu5['profil_foto'];?>"></a>
                  <div style="margin: -35px 5px 15px 10px;" ><a href="profil.php?kullanici=<?php echo $sorgu5['kullanici_id']; ?>"> <?php echo $sorgu5['kullanici_adi']; ?>
                   </a></div>
                  </li>
                
                <?php }


                 }

                 ?>
                </ul>

            </aside>
          </div>

        </div>
      </div>
</body>
</html>
