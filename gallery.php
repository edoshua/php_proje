<?php 
if(!isset($_SESSION)) {  
   session_start(); 
} 
ob_start();
include "dbconnection.php"
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>keto</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php">ANA SAYFA</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.php">HAKKIMIZDA</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="room.php">ODALARIMIZ</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="gallery.php">GALERİ</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.php">İLETİŞİM</a>
                              </li>
                              <?php 
                              if((isset($_SESSION["mail"])&&isset($_SESSION["password"])))
                              {
                                 $namesurname = $_SESSION["name"]." ".$_SESSION["surname"];
                                 echo "
                                       <li class='user'>
                                          <img src='images/user.png' class='user_img'>
                                          <a class='user_info' href='index.php'>$namesurname</a>
                                       </li>
                                       <li class='user'>
                                          <form method='POST' action='index.php'>
                                          <a href='logout.php'><img src='images/logout.png' class='user_img'></a>
                                          </form>
                                       </li>
                                 ";
                              }
                              else
                              {
                                 echo "<div style='padding-right: 5px;'><li class='nav-item' style='margin-right: 3px;'>
                                       <a class='uye_btn' href='userlogin.php'>ÜYE GİRİŞİ</a>
                                    </li></div>
                                    <li class='nav-item' style='margin-right: 3px;'>
                                       <a class='uye_btn' href='user_signup.php'>ÜYE OL</a>
                                    </li>";
                              }
                              ?> 
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                    <h2>Galeri</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- gallery -->
      <div  class="gallery">
         <div class="container">
           
            <div class="row">
               <?php 
                  $img_query = mysqli_query($connection, "SELECT * FROM gallery");
                  while($img = mysqli_fetch_assoc($img_query))
                  {
                     echo "
                     <div class='col-md-3 col-sm-6'>
                     <div class='gallery_img'>
                        <figure><img src='data:image/jpg;charset=utf8;base64,".base64_encode($img['img'])."' style='height: 217.15px; width: 351px;'/></figure>
                     </div>
                  </div>
                     ";
                  }
               ?>
            
            
            
               
            </div>
         </div>
      </div>
      <!-- end gallery -->
    
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row2">
                  <div class=" col-md-4">
                     <h3>Bize Ulaşın</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Adres</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menü</h3>
                     <ul class="link_menu">
                        <li><a href="index.php">Ana Sayfa</a></li>
                        <li><a href="about.php">Hakkımızda</a></li>
                        <li class="active"><a href="#">Odalarımız</a></li>
                        <li><a href="gallery.php">Galeri</a></li>
                        <li><a href="contact.php">Bize Ulaşın</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
<?php 
ob_end_flush();
?>