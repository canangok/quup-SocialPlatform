<?php session_start(); 
include ('baglanti.php');
if(($_SESSION['yetki']==1)){


if(isset($_GET['kullanici'])){

$kullanici = $_GET['kullanici'];

$kullanici_bilgi_getir = mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id='$kullanici' ");
$bilgi_getir=mysqli_fetch_array($kullanici_bilgi_getir);

$_GET['kullanici'];
						
					$takipci_sorgu = mysqli_query($baglanti,"SELECT COUNT(takipeden_id) as toplamtakipci FROM takip WHERE takipedilen_id = '".$_GET['kullanici']."' ");
					$takipci = mysqli_fetch_array($takipci_sorgu)['toplamtakipci'];

					$takip_edilen_sorgu = mysqli_query($baglanti,"SELECT COUNT(takipedilen_id) as toplamtakipedilen FROM takip WHERE takipeden_id = '".$_GET['kullanici']."' ");
					$takipedilen=mysqli_fetch_array($takip_edilen_sorgu)['toplamtakipedilen'];

					$paylasim_sayi_sorgu = mysqli_query($baglanti,"SELECT COUNT(paylasim_id) as toplampaylasim FROM paylasimlar WHERE kullanici_id ='".$_GET['kullanici']."'  ");
					$paylasim_sayisi=mysqli_fetch_array($paylasim_sayi_sorgu)['toplampaylasim'];

}


 ?>


<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <style type="text/css">
           b{
            text-decoration: none;
            color:white;
        }
        ul{
            list-style: none;
        }
        a{
            text-decoration: none;
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
                        <a class="profile-pic" href="#"> <img src="img/admin6.png" alt="user-img" width="36" class="img-circle"><b style=" color:black;" class="hidden-xs">ADMİN</b></a>
                    </li>
                </ul>
            </div>
          
        </nav>
       
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">ADMİN</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        
                    </li>
                    <li>
                        <a href="admin.php" class="waves-effect"></i>Kullanıcılar </a>
                    </li>
                
                </ul>
  
            </div>
         
       </div>
  
       <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kullanıcı Profilleri</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="admin_cikis.php"  style="padding: 7px;color:white;" class="btn btn-danger pull-right">Çıkış</a>
                      
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user"  src="<?php echo $bilgi_getir['kapak_foto'];?>">
                                <div class="overlay-box" style="background: #707cd282;">
                                    <div class="user-content">
                                        <a href=""><img src="<?php echo $bilgi_getir['profil_foto'];?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $bilgi_getir['kullanici_adi'];?></h4>
                                        <h5 class="text-white"><?php echo $bilgi_getir['email'];?></h5> </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center"><a href="">Gönderiler</a><h1><?php echo $paylasim_sayisi; ?></h1> </div>
                                <div class="col-md-4 col-sm-4 text-center"><a>Takipçi </a> <h1> <?php echo $takipci-1; ?></h1> </div>
                                <div class="col-md-4 col-sm-4 text-center"><a>Takip </a> <h1><?php echo $takipedilen-1;?></h1> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Ad Soyad</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control form-control-line" value="<?php echo $bilgi_getir['ad_soyad'];?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-12">Kullanıcı Adı</label>
                                    <div class="col-md-12">
                                        <input type="text" readonly="true" class="form-control form-control-line" value="<?php echo $bilgi_getir['kullanici_adi'];?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" readonly="true" value="<?php echo $bilgi_getir['email'];?>" class="form-control form-control-line"> </div>
                                </div>

                          
                         <!--  <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="admin_profil.php?kullanici=<?php echo $bilgi_getir['kullanici_id'];?>"><button  class="btn btn-success">Kullanıcıyı Sil</button></a>
                                </div>
                                    -->

                                 
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            
        </div>
    </div>
  
</body>

</html>


<?php }else{
	header("Location:admin_giris.php");
}

?>