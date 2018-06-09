<?php session_start();
include('baglanti.php'); 
if(($_SESSION['yetki']==2)){

$kullanici_id=$_SESSION['kullanici_id'];


$bilgiler_sorgu=mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id='$kullanici_id' ");
$bilgiler=mysqli_fetch_array($bilgiler_sorgu);

$sorgu=mysqli_query($baglanti,"SELECT COUNT(kullanici_id) AS toplamkullanici FROM kullanicilar" );

$kullanici_idler=mysqli_fetch_array($sorgu)['toplamkullanici'];

if($_GET['kullanici']){

	$profil_id = $_GET['kullanici'];
	$kullanici_getir_sorgu = mysqli_query($baglanti,"SELECT * FROM kullanicilar WHERE kullanici_id = '$profil_id' ");
	$kullanici_getir = mysqli_fetch_array($kullanici_getir_sorgu);

}

if(isset($_GET['takip'])){

	//takip kayit
$takip_durumu = $_GET['takip'];
$takip_edilen = $_GET['kullanici'];

if($takip_durumu == 'et'){

	$takip_kayit = mysqli_query($baglanti,"INSERT INTO takip(takipeden_id,takipedilen_id,bildirim) VALUES('$kullanici_id','$takip_edilen','1') ");
	if($takip_kayit){
		echo "takip gerçekleşti";
	}else{
		echo "takip edilemedi";
	}
}
else{

	$takip_sil = mysqli_query($baglanti,"DELETE FROM takip WHERE takipeden_id='$kullanici_id' AND takipedilen_id='$takip_edilen' ");
	if($takip_sil){
		echo "takip silindi";
	}else{
		echo "takip silinemedi";
	}
}

}



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/profil.css">
<style type="text/css">
	 .form-group {
    margin-left: 60px;
 }
 .kamera{
    margin-left: 40%;
 }
 .center2{
            margin-left: 84%;
        }
</style>
</head>
<body>
<?php include 'header.php' ?>

<section id="rw-layout" class="rw-layout" style="margin-top: 100px;">
<div class="rw-container rw-section">
	<div class="rw-inner clearfix">
		<div class="rw-column rw-content rw-main-content">

	
			<div class="cover-image" style="background: white no-repeat;">
			
			<?php if(isset($_GET['kullanici'])){ ?>
			
				<img style="width: 100%;height:180%;margin:0px 0px 0px 0px;" src="<?php echo $kullanici_getir['kapak_foto']; ?>">
			 ?>">
			<?php	} ?>
			
		
			</div>
			 <div class="rw-row subtle subtle-profile">
			  <div class="grid-container">
			  
			   <div class="grid" style=" width: 25%;">            
			    <div class="profile-avatar" style="">
          
          <?php if(isset($_GET['kullanici'])){ ?>
			  <img src="<?php echo $kullanici_getir['profil_foto']; ?>" alt=""> 
				<?php }?>
			  
			    </div>
			    <!-- .profile-avatar -->
			    </div>        
			  <div class="grid" style="width: 75%;">    
				<?php if($_GET['kullanici'] == $_SESSION['kullanici_id']){ ?>
						<div class="cover-action"><a href="Ayarlar_Profil_kapak.php" class="button green right hidden-xs">Kapağı Güncelle</a></div>  
				<?php }?>
			             

			    <div class="row">
			     <div class=""><h4 class="user-name"><?php 
			     if(isset($_GET['kullanici'])){ 
			
				  echo $kullanici_getir['ad_soyad']; 
				}else{ 
				echo $bilgiler['ad_soyad']; 
				} 
				?>
			
					<small> @<?php 
			     if(isset($_GET['kullanici'])){ 
						echo $kullanici_getir['kullanici_adi']; 
				}else{ 
				echo $bilgiler['kullanici_adi']; 
				} 
				?></small></h4>
			      <ul class="member-tags profile list-unstyled"></ul><p class="description"></p>
			     </div>    



			        <?php if(isset($_SESSION['kullanici_id'])){

			        		$takip_edilen = $_GET['kullanici'];
			        		$takip_getir = mysqli_query($baglanti,"SELECT * FROM takip WHERE takipeden_id='$kullanici_id' AND  takipedilen_id='$takip_edilen' ");
			        		$takip_kontrol = mysqli_fetch_array($takip_getir);
			        
			        	if($_GET['kullanici'] != $_SESSION['kullanici_id']){

			        		if($takip_kontrol > 0){ ?>
			        			<div class="cover-action" ><a href="profil.php?kullanici=<?php echo $kullanici_getir['kullanici_id']; ?>&takip=etme" class="button green right hidden-xs">Takibi Bırak </a></div>  
			        		<?php }else{ ?>
								
								<div class="cover-action" ><a href="profil.php?kullanici=<?php echo $kullanici_getir['kullanici_id']; ?>&takip=et" class="button green right hidden-xs">Takip Et</a></div> 

			        		<?php }
			        	}
			        		
			        	}

			        
			        	?>
					
					
					<?php 

					$_GET['kullanici'];
						
					$takipci_sorgu = mysqli_query($baglanti,"SELECT COUNT(takipeden_id) as toplamtakipci FROM takip WHERE takipedilen_id = '".$_GET['kullanici']."' ");
					$takipci = mysqli_fetch_array($takipci_sorgu)['toplamtakipci'];

					$takip_edilen_sorgu = mysqli_query($baglanti,"SELECT COUNT(takipedilen_id) as toplamtakipedilen FROM takip WHERE takipeden_id = '".$_GET['kullanici']."' ");
					$takipedilen=mysqli_fetch_array($takip_edilen_sorgu)['toplamtakipedilen'];

					$paylasim_sayi_sorgu = mysqli_query($baglanti,"SELECT COUNT(paylasim_id) as toplampaylasim FROM paylasimlar WHERE kullanici_id ='".$_GET['kullanici']."'  ");
					$paylasim_sayisi=mysqli_fetch_array($paylasim_sayi_sorgu)['toplampaylasim'];

					?>
		
                   <div class="center" style="margin-left: 67%;margin-top: -5%;">                    
			        
                      <div class="following-block clearfix text-center">    

			           <div class="follow reputation">                            
			            <div class="follow-in"><a href=""><span class="count"><?php echo $paylasim_sayisi; ?></span><span class="title">gönderiler</span></a></div>            
			           </div>  

			           <div class="follow followers">                            
			            <div class="follow-in"><a href="profil_takip_ettikleri.php?kullanici=<?php echo $kullanici_getir['kullanici_id']; ?>"><span class="count"><?php echo $takipedilen;?></span><span class="title">takip edilen</span></a></div>
			           </div>   
			                        
			           <div class="follow following">                            
			            <div class="follow-in"><a href="#"><span class="count"><?php echo $takipci; ?></span><span class="title">takipçi</span></a></div>       
			           </div> 
				
			          
			         </div>    

			      </div>           


			   </div>        
			  </div>        
			            <div class="clear"></div>    
			            </div>    
			            <!-- .-container --> </div>

	         <div class="rw-row subtle border-bottom profile-main-menu-block hidden-xs">
	         <div class="grid-container" >
	         <div class="grid"  style="margin-top: -3.2%;width: 100%;">
	         <div class="profile-main-menu">
						
					
	         <ul>
	         <li ><a href="profil.php?kullanici=<?php echo $kullanici_getir['kullanici_id']; ?>"><span class="title">Paylaşımlar</span></a></li>
	         <li name="yorum_"><a href="profil_yorumlar.php?kullanici=<?php  echo $kullanici_getir['kullanici_id']; ?>" ><span class="title">Yorumlar</span></a></li>                    
	         <li><a href="profil_begeniler.php?kullanici=<?php  echo $kullanici_getir['kullanici_id']; ?>"><span class="title">Beğeniler</span></a></li>                    
	         <li><a href="profil_takip_ettikleri.php?kullanici=<?php  echo $kullanici_getir['kullanici_id']; ?>"><span class="title">Takip Ettikleri</span></a></li>                    
	         <li><a href="profil_takipciler.php?kullanici=<?php  echo $kullanici_getir['kullanici_id']; ?>"><span class="title">Takipçiler</span></a></li>                   
	         <li class="active"><a href="profil_fotograflar.php?kullanici=<?php  echo $kullanici_getir['kullanici_id']; ?>"><span class="title">Fotoğraflar</span></a></li> 
	         </ul>            
	         </div>        
	         </div>    
	         </div>    
	         <!-- .container- -->
	         </div>



	<!-- /////////////////////////////////////////////-->
	        <div class="rw-section rw-container right-sidebar">
	        	<div class="rw-inner clearfix">
	        		<div class="rw-column rw-sidebar side-collapse">
	        			<div class="the-sidebar">
	        		<!-- /////////////////////////////////////////////-->

	        			 <aside class="widget widget-posts widget-posts-theme">    
	        			 <div class="widget-title"><h3><a href="/social/group">Gruplar</a></h3></div>    
	        			 <div class="widget-posts-list">
	        			 </div>
	        			 </aside>


	        			 <aside class="widget widget-authors" style="height: 300px;">    
	        			 <div class="widget-title"><h3><a href="/social/whoisarround">Etrafımda Kimler Var</a></h3></div>    
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
                  if($sorgu5['kullanici_adi']!=""){ ?>
                      
                
	        			 <li class="active"  style="margin-top: 10px;"><a mid="5qtl83i5mo0" href="profil.php?kullanici=<?php echo $sorgu5['kullanici_id']; ?>" class="m-link"><img src="<?php echo $sorgu5['profil_foto'];?>"></a> 
	        			 <div class="author-name active" style="float: right;margin-top: -25%;"><a href="profil.php?kullanici=<?php echo $sorgu5['kullanici_id']; ?>" class="m-link" ><?php echo $sorgu5['kullanici_adi']; ?></a></div></li>         
                
						 <?php }

						 }?>
	        			 </ul>
	        			 </aside>
	        			</div>
	        		</div>

				<div class="rw-column rw-content" style="margin-top: 90%;" >
				 <div class="rw-row" >
				 	
	<!--/////////////////////////////////////////////////////////////////////////////////////////////////////// -->


	        	</div>

	        </div><!--///////////////// -->

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