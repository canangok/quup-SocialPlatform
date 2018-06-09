
<?php include("baglanti.php")

 ?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  
</style>

<link rel="stylesheet" type="text/css" href="css/header.css">

<script type="text/javascript">
function tikla() {
document.getElementById("acilir").classList.toggle("show");

 }
 function tikla2() {
document.getElementById("acilir2").classList.toggle("show");

 }

</script>

</head>
<body>

<div class="rw-section rw-header" style="height:60px;">   
<div class="rw-inner clearfix">        
<div class="grid-container">            

<div class="grid alpha clearfix">                
<button type="button" class="navbar-toggle main-navbar-toggle pull-left"></button>                
<div class="logo-holder">                    
<a href="anasayfa.php">                        
<img src="img/logo.png" class="logo" alt=""></a>                
</div>                
<nav id="the-main-menu" class="main-menu-nav menu-inline hidden-xs hidden-sm" data-breakpoint="1160">
<ul class="menu horizontal">
<li class="active"><a href="anasayfa.php">Ana Sayfa</a></li>
<li><a href="#">Gruplar</a></li>
<li class="item-tags"><a href="/social/membertag/">Etiketler</a></li>
<li class="search-item">

<form class="head-search-form navbar-form" action="arama.php?kullanici=<?php echo $_SESSION['kullanici_id']; ?>" method="POST" >
<div class="input-group">

<input type="text" name="q" id="q" placeholder="Arayın.." value=""><button type="submit" name="ara"><img class ="ara" src="img/ara3.png" 
 style="width: 30px;height: 27px;margin-top: -3%;margin-bottom: -2%;margin-left: -15%;"/></button>


</div>                            
</form> 

</li>                   
</ul>                
</nav>            
</div>            
<div class="menum">                
    <ul>
      <li class="aktif" onclick="tikla()">
      <a href="#"><img style="width:40px;margin-top: -5px;" src="img/bildirim.png"/></a>
          <div id="acilir" class="acilir-menu bildirim">
              <a href="tum_bildirimler.php?kullanici=<?php echo $_SESSION['kullanici_id']; ?>">Tüm Bildirimler</a>
          </div>
      </li>
      <li class="aktif" onclick="tikla2()"><a href="#"><img style="width: 35px;margin-top: -1px;" src="img/cikis.png"/></a>
          <div id="acilir2" class="acilir-menu">
              <a href="Ayarlar_hesap.php">Ayarlar</a>
              <a href="cikis.php">Çıkış</a>
           </div> 
      </li>
    </ul>        
</div>        
</div>
</div>
</div>

</body>
</html>