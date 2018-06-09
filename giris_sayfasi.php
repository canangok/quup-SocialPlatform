<?php 
include ('kayit_islemi.php');
include ("giris_islemi.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>quup</title>
 
<link rel="stylesheet" type="text/css" href="css/giris_sayfasi.css">
</head>
<?php 

?>
<body class="landing">
<nav class="navbar">        
<div class="container">            

<div class="navbar-header">                
  <a class="navbar-brand" href="/"><img src="img/logo.png"></a>            
</div>  

<div id="navbar" class="collapse navbar-collapse navbar-right main-menu">                
<ul class="nav navbar-nav">                    
<li><a href="giris.php">Giriş Yap</a></li>                    
<li class="active"><a href="kayitol.php">Kaydol</a></li>                
</ul>            
</div>        
</div>  
  </nav>
<div class="container"><img src="img/landing.jpg" class="landing-image">
    
<div class="section">            
<div class="row">                
<div class="message">                    
<h1>quup.com</h1>                    
<h3>Keşfetmeye Hazır mısın?</h3>                
</div>                

<div style="width:35%;margin-left: 65%;margin-top: -10%;">                    
<form class="form-horizontal form-landing" role="form" method="POST" action="">                        
    
    <div class="form-group">                            
    <input class="form-control passive valid" name="email" type="text" placeholder="E-Posta Adresi">                            
                      
    </div>                        
    
    <div class="form-group">                            
    <input class="form-control passive valid" placeholder="Şifre" name="sifre" type="password" >                            
                      
    </div>    

    <div class="form-group">                            
    <button type="submit" class="btn btn-default btn-primary btn-sm" name="kullanici_giris"><strong>Giriş Yap</strong></button>                                       
    </div>   

</form>                    

<form class="form-horizontal form-landing" role="form" method="POST" action="" >                        
    <h5>Yeni misin? Kaydol</h5>                        

    <div class="form-group">                            
    <input class=" form-control" placeholder="Ad, Soyad" id="DisplayName" name="adsoyad" type="text" value="" autocomplete="off" required="">                                  
    </div>                        

    <div class="form-group">                            
    <input class="form-control valid" id="Email" name="email" type="text" value="" placeholder="E-Posta" autocomplete="off" required="" >                           
    </div>   


  <div class="form-group">                            
   <input class="form-control valid" id="Password" name="sifre" placeholder="Şifre" type="password" value="" autocomplete="off" required="" >                            
   </div>                        
 
  <div class="form-group">                            
       <input class=" form-control" id="UserName" placeholder="Kullanıcı Adı" name="kullaniciAdi" type="text" required="" >                            
       <
    </div>                        
  
                   
      
      <div class="form-group submit text-right">                            
      <p class="hide">Hesabını oluşturabilmen için Kullanım Şartları Sözleşmesi'ni kabul etmelisin!</p>                            
      <button type="submit" class="btn btn-default btn-warning qc" name="kaydol"><strong>Kayıt Ol</strong></button>                        
      </div>

   </form>                                        
     
                  
          
</div>            
</div>        
</div>    
</div>
</body>
</html>
