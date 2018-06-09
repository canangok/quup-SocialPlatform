<?php 
include ("giris_islemi.php");

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
<h1 class="text-center">Giriş Yapın</h1>                    
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
		<a href="index.php" class="pull-left" style="margin-top:12px;"><i class="glyphicon glyphicon-chevron-left"></i> Ana Sayfaya Dön</a>                            
		<input type="submit" class="btn btn-success" style="float: right;" name="kullanici_giris" value="Giriş Yap">                        
		</div>                    
	</div>                    
<br>                    
<br>                    
<div class="row">                        
<div style="margin-left: 2%;">
                                                                                 
</div>
</div>
<hr>
<a href="kayitol.php" class="btn btn-block btn-primary">Üye değil misin? Kaydol!</a>
</fieldset>
</form>


</div>  
</div>
</div>
</div>    
</body>
</html>