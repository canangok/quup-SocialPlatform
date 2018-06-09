<?php
session_start(); 
include ('baglanti.php');
if(($_SESSION['yetki']==1)){


$kullanicilari_getir=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE yetki ='2'");

if(isset($_GET['kullanici_sil']))
{
$kullanici= $_GET['kullanici_sil'];

$kullanici_sil = mysqli_query($baglanti,"DELETE FROM kullanicilar WHERE kullanici_id = '$kullanici' ");

$kullanici_begeni_sil=mysqli_query($baglanti,"DELETE FROM begeniler WHERE kullanici_id = '$kullanici'");
$kullanici_begeni_sil2=mysqli_query($baglanti,"DELETE FROM begeniler WHERE paylasimsahibi_id='$kullanici' ");

$kullanici_yorum_sil = mysqli_query($baglanti,"DELETE FROM yorumlar WHERE kullanici_id = '$kullanici'");
$kullanici_yorum_sil2 = mysqli_query($baglanti,"DELETE FROM yorumlar WHERE paylasimsahibi_id = '$kullanici'");

$kullanici_gonderi_sil = mysqli_query($baglanti,"DELETE FROM paylasimlar WHERE kullanici_id = '$kullanici'");

$kullanici_takip_sil = mysqli_query($baglanti,"DELETE FROM takip WHERE takipeden_id='$kullanici'  ");
$kullanici_takip_sil2=mysqli_query($baglanti,"DELETE FROM takip WHERE takipedilen_id='$kullanici' ");

if($kullanici_sil || $kullanici_begeni_sil || $kullanici_begeni_sil2 || $kullanici_yorum_sil || $kullanici_yorum_sil2 || $kullanici_gonderi_sil || $kullanici_takip_sil ||  $kullanici_takip_sil2 ){
	echo "<script>alert('Kullanıcı Silindi');</script>";
}else{
	echo "<script>alert('Kullanıcı Silinemedi!');</script>";
}

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/default.css" id="theme" rel="stylesheet">

    <style type="text/css">
        a,b{
            text-decoration: none;
            color:white
        }
        ul{
            list-style: none;
        }
    </style>
   
</head>

<body class="fix-header">
  
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                  
                    <a class="logo" href="index.html">
                        <img style = "width: 60px;" src="img/admin6.png" alt="home" class="light-logo" />
                     <span class="hidden-xs"></span> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                   
                    <li>
                        <a class="profile-pic" href="#"> <img src="img/admin6.png" alt="user-img" width="36" class="img-circle"><b style="text-decoration: none;color:black;"class="hidden-xs">ADMİN</b></a>
                    </li>
                </ul>
            </div>
          
        </nav>
       
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
             
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        
                    </li>
                    <li>
                        <a href="admin.php" class="waves-effect">Kullanıcılar</a>
                    </li>
               
                </ul>
  
            </div>
         
       </div>
  
               <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kullanıcı Tablosu</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="admin_cikis.php" class="btn btn-danger pull-right " style="padding: 5px;">Çıkış

                        </a>
                       
                    </div>
                   
                </div>
               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Kullanıcılar</h3>
                         
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Ad Soyad</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Email</th>
                                            <th>Sil</th>
                                            <th>Görüntüle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($kullanicilar=mysqli_fetch_array($kullanicilari_getir)) {?>
                                    	
                                    	 <tr>
                                            <td><?php echo $kullanicilar['kullanici_id']; ?></td>
                                            <td><?php echo $kullanicilar['ad_soyad']; ?></td>
                                            <td>@<?php echo $kullanicilar['kullanici_adi']; ?></td>
                                            <td><?php echo $kullanicilar['email']; ?></td>
                                            <td>
											
												<div >
						                     <a style="text-decoration: none;color:white;padding: 5px;"  href="admin.php?kullanici_sil=<?php echo $kullanicilar['kullanici_id'];?>" class="btn btn-danger" name="sil" >Sil</a>
						                 			</div>
										
                                            </td>
                                            <td><div>
						                     <a style="text-decoration: none;color:white;padding: 5px;" href="admin_profil.php?kullanici=<?php echo $kullanicilar['kullanici_id'];?>" class="btn btn-danger">Görüntüle</a>
						                 			</div></td>
						                 	
                                        </tr>
                                  <?php  } ?>
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
        </div>
        
    </div>
  
</body>

</html>


<?php }else{
	header("Location:admin_giris.php");
}

?>

