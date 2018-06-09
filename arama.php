<?php session_start(); 
if(($_SESSION['yetki']==2)){
?>

<!DOCTYPE>
<html>
<head>
  <title></title>
<link rel="stylesheet" type="text/css" href="css/bildirimler.css">

</head>
<body >
<style>
body{background:url('/picture/1071189876554072064') ;background-repeat:repeat repeat;background-attachment:fixed;background-color:#682261} </style>

<?php include 'header.php' ?>

<section id="rw-layout" class="rw-layout">
  <div class="rw-section rw-container left-sidebar"> 
    <div class="rw-inner clearfix">
     
        <?php include 'anasayfa_sol.php' ?>
        
            <div class="rw-column rw-content rw-main-content">                                                

            <div class="rw-row page-breadcrumb">    
            <strong>Arama</strong>
            </div> 

            <div class="rw-row">                    
            <div class="notification-details">    
            <ul class="reset-list notification-dropdownx" id="notification-history">
          <div class="note" data-detail-type="memberlist">
             
             
             <div class="user-message">
                <a href="#"></a>
                <div class="username" ><a href="#"></a></div>
                <div class="message" style="color:#454757;"></div>
                
            </div>

        

         </div>
     </ul>
     </div>             
     </div>            

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