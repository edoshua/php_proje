<!DOCTYPE html>
<?php 
if(!isset($_SESSION)) {  
   session_start(); 
} 
ob_start();
//require('index.php');
?>
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
   <body class="main-layout inner_page">
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
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.php">ANA SAYFA</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.php">HAKKIMIZDA</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="room.php">ODALARIMIZ</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gallery.php">GALERİ</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="blog.php">İLETİŞİM</a>
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
      </header>
      <!-- end header inner -->
      <!-- end header -->
        <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                      <h2>GİRİŞ YAP</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- blog -->
      <div class="blog2">
         <div class="container">
            <div class="row">
               <div class="colmd4">
                  <div class="blog_box2">
                     <div>
                        <form  class="uye_tablo" action="userlogin.php" method="POST">
                           Mail Adresi:    
                           <div class="uye_t">
                                    <input class="online_book" type="text" name="mail">
                           </div>
                           Parola:    
                           <div class="uye_t">
                                    <input class="online_book" type="password" name="password">
                           </div>
                           <div class="uye_t" style="padding-top: 15px">
                                    <input type="submit" class="signup_btn" name="gonder" value="Giriş Yap"></input>
                           </div>
                        </form>
                        <div class='hata'>Henüz kayıt olmadınız mı? <a href='user_signup.php'>Üye Ol</a></div>

                     <?php
                         include "dbconnection.php";
                         
                         if(isset($_POST['gonder']))
                         {
                              $mail = $_POST['mail'];
                              $password = $_POST['password'];

                              //admin control
                              $admin = mysqli_query($connection, "SELECT * FROM admin");
                              while($str=mysqli_fetch_assoc($admin))
                              {
                                 if($password == $str['password'] && $mail == $str['username'])
                                    header("Location: admin/dashboard.php");
                              }

                              $control = 0;
                              $users = mysqli_query($connection, "SELECT * FROM users");
                              while($str=mysqli_fetch_assoc($users))
                              {
                                 if($password == $str['password'] && $mail == $str['mail'])
                                 {
                                    $_SESSION['ID'] = $str['ID'];
                                    $_SESSION['name'] = $str['name'];
                                    $_SESSION['surname'] = $str['surname'];
                                    $_SESSION['phone'] = $str['phone'];
                                    $_SESSION['mail'] = $str['mail'];
                                    $_SESSION['password'] = $str['password'];
                                    $_SESSION['credit'] = $str['credit'];
                                    $_SESSION['resnum'] = $str['resnum'];
                                    $control = 1;
                                    header("Location: index.php");
                                 }
                              }
                              
                              if($control == 1)
                                echo "giris yapıldı";
                              else
                                  echo "<div class='hata'> Girilen bilgiler ile kayıtlı bir kullanıcı bulunamadı. </div>";
                           }
                      
                     ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end blog -->
     
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="about.html"> about</a></li>
                        <li><a href="room.html">Our Room</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li class="active"><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
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