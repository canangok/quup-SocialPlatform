<?php 
session_start();

include('baglanti.php'); 


if(isset($_POST['admin_giris']))
{

  $email=$_POST["email"];
  $sifre = md5($_POST["sifre"]);

  $giris_sorgu=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE email = '$email' and sifre = '$sifre' ");
  $giris_goster=mysqli_fetch_array($giris_sorgu);

  if($giris_goster){
    $_SESSION['kullanici_id']=$giris_goster['kullanici_id'];
    $_SESSION['email']=$giris_goster['email'];
    $_SESSION['sifre']=$giris_goster['sifre'];
    $_SESSION['adsoyad']=$giris_goster['ad_soyad'];
    $_SESSION['kullanici_adi']=$giris_goster['kullanici_adi'];
    $_SESSION['yetki']=$giris_goster['yetki'];

    if($_SESSION['yetki']==1){
      
      header("Location:admin.php?giris=basarili&kullanici_id=".$_SESSION['kullanici_id']);
    }
    else{
      
        header("Location:admin_giris.php?giris=basarisiz");
    }
  }
  else
  {
    header("Location:admin_giris.php?giris=basarisiz");
  }

}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>        
<link rel="stylesheet" type="text/css" href="css/giris.css">
</head>   

<body>    
<?php

?>
<div class="container">                
<div class="container-member">    
<div class="row">        
<div style="width: 70%;margin-left: 15%;">            

<form role="form" method="POST" action="">                
<fieldset>   
<div class="text-center"><img src="img/admin6.png" style="width: 15%;"></div>                             
<h1 class="text-center">Admin</h1>                    
<hr class="colorgraph">                    

<div class="form-group">                        
<input class="form-control " id="Email" name="email" type="email" placeholder="E-Posta Adresi" autocomplete="off" data-val="true" data-val-required="Bu alan gereklidir.">                       
<span class="field-validation-valid" data-valmsg-replace="true" data-valmsg-for="Email"></span>                         
</div>                    

<div class="form-group">                        
<input class="form-control " id="Password" placeholder="Şifre" name="sifre" type="password" autocomplete="off" data-val="true" data-val-required="Bu alan gereklidir.">                        
<span class="field-validation-valid" data-valmsg-replace="true" data-valmsg-for="Password"></span>                    
</div>                    
                    
                                          
<hr class="colorgraph">                    
  <div class="row" >                        
    <div style="margin-left: 3%;">                                                        
    <input type="submit" class="btn btn-success" style="width: 100%;" name="admin_giris" value="Giriş Yap">                        
    </div>                    
  </div>                    
<br>                    
<br>                    
<div class="row">                        
<div style="margin-left: 2%;">
                                                                                 
</div>
</div>
<hr>

</fieldset>
</form>


</div>  
</div>
</div>
</div>    
</body>
</html>