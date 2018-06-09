
<html xmlns="http://www.w3.org/1999/xhtml">
<head>        
    <link rel="stylesheet" type="text/css" href="css/kayit.css">
    
</head>    
<?php 
include 'kayit_islemi.php';

?>
<body> 
<div class="container">                
<div class="container-member">        
<div class="row">   

  
<div class="" style="width: 55%;margin-left: 25%;">                                                
         

<form class="form-horizontal"  method="POST" action="" >                
<h1 class="text-center">Kayıt Olun</h1>                
<hr class="colorgraph">                
             
<hr>                
		<div class="form-group">                    
		<label class="control-label">Ad, Soyad</label>                    
		<div style="margin-left: 12%;margin-top: -5%;">                        
		<input class="input-validation-error form-control" id="DisplayName" name="adsoyad" type="text" value="" autocomplete="off" data-val="true" required="" >
		
		</div>                
		</div>     

		<div class="form-group">                    
		<label class="control-label">E-Posta</label>                    
		<div class="" style="margin-left: 12%;margin-top: -6%;">     
		<input class="form-control valid" id="Email" name="email" type="email" value="" required="" autocomplete="off" >
		
		</div>                
		</div>       

		<div class="form-group">                    
		<label class="control-label">Şifre</label>
		<div class="" style="margin-left: 12%;margin-top: -6%;">
		<input class="form-control valid" id="Password" name="sifre" type="password" value="" required="" autocomplete="off" >
		
		
		</div>
		</div>

		<div class="form-group">
		<label  class="control-label" style="margin-left: -15px;">Kullanıcı Adı</label>
		<div class="" style="margin-left: 12%;margin-top: -6%;">
		<input class="input-validation-error form-control" id="UserName" name="kullaniciAdi" type="text" value="" required="" autocomplete="off" >
		
		</div>
		</div>


		<div class="form-group submit">
			<div class="text-center">
		 
			<button type="submit" name="kaydol" class="btn btn-default btn-primary">Kaydol</button>                        
			<a href="index.php" class="btn btn-link">iptal</a>
			</div>                
		</div>            
</form>  

</div>    
</div>
</div>

</div>    
</body>
</html>