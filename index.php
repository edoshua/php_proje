<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
   session_start();
}
include "dbconnection.php";
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

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
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
                              <a class="nav-link" href="contact.php">İLETİŞİM</a>
                           </li>
                           <?php
                           if ((isset($_SESSION["mail"]) && isset($_SESSION["password"]))) {
                              $namesurname = $_SESSION["name"] . " " . $_SESSION["surname"];
                              echo "
                                       <li class='user'>
                                          <img src='images/user.png' class='user_img'>
                                          <a class='user_info' href='index.php'>$namesurname</a>
                                       </li>
                                       <li class='user'>   
                                          <a href='logout.php'><img src='images/logout.png' class='user_img'></a>
                                       </li>
                                 ";
                           } else {
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
   <!-- banner -->
   <section class="banner_main">
      <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="first-slide" src="images/banner1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
               <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
               <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
            </div>
         </div>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>
      <div class="booking_ocline">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="book_room">
                     <h1>ŞİMDİ REZERVASYON YAP</h1>
                     <form class="book_now" method="POST" action="reservation.php">
                        <div class="row">
                           <div class="col-md-12">
                              <span>Giriş</span>
                              
                              <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="giris" />
                           </div>
                           <div class="col-md-12">
                              <span>Çıkış</span>
                              
                              <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="cikis"></input>
                           </div>
                           <div class="col-md-12" style="display: flex; justify-content: center;">
                              <div class="divv">
                                 <span>Yetişkin Sayısı</span>
                                 <select name="yetiskin" style="height: 30px; width: 50px;">
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                 </select>
                              </div>
                              <div class="divv">
                                 <span>Çocuk Sayısı</span>
                                 <select name="cocuk" style="height: 30px; width: 50px;">
                                    <option value=0>0</option>   
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <input type="submit" name="reserve" value="Rezervasyon Yap" class="book_btn"></input>
                           </div>
                           <div class='error-message'>
                              <?php 
                                 if(isset($_GET['Message'])){
                                    echo $_GET['Message'];
                                }
                              ?>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end banner -->
   <!-- about -->
   <div class="about">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               <div class="titlepage">
                  <h2>HAKKIMIZDA</h2>
                  <p><?php
                     $desc_query = mysqli_query($connection, "SELECT * FROM aboutus");
                     while ($desc = mysqli_fetch_assoc($desc_query)) {
                        echo $desc['short_desc'];
                        //echo "<img src=\"images/" . $desc['desc_image'] . "\" />";
                     
                     echo"</p>
                  <a class='read_more' href='about.php'> Daha Fazla Bilgi...</a>
               </div>
            </div>
            <div class='col-md-7'>
               <div class='about_img2'>
                  <figure><img src='data:image/jpg;charset=utf8;base64,".base64_encode($desc['desc_image'])."'/> "; }?></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end about -->
   <!-- our_room -->
   <div class="our_room">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>ODALARIMIZ</h2>
                  <p>Otelimiz farklı yatak sayılarıyla ve birçok farklı oda çeşiti ile hizmet vermektedir.</p>
               </div>
            </div>
         </div>
         <div class="row3">
            <?php 
               include "dbconnection.php";
               
               $index=1;
               $roomquery = mysqli_query($connection, "SELECT * from rooms WHERE type='general_type'");
               while($room = mysqli_fetch_assoc($roomquery))
               {
                  $roomnum = "room".$index;
                  echo "<div class='room_grid'>
                  <div id='serv_hover' class='room'>
                     <div class='room_img'>
                        <div id='".$roomnum."Carousel"."' class='carousel slide banner' data-ride='carousel'>
                           <ol class='carousel-indicators'>
                              <li data-target='#".$roomnum."Carousel"."' data-slide-to='0' class='active'></li>
                              <li data-target='#".$roomnum."Carousel"."' data-slide-to='1'></li>
                              <li data-target='#".$roomnum."Carousel"."' data-slide-to='2'></li>
                           </ol>
                           <div class='carousel-inner'>
                              <div class='carousel-item active'>
                                 <img class='first-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($room['image1'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                              </div>
                              <div class='carousel-item'>
                                 <img class='second-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($room['image2'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                              </div>
                              <div class='carousel-item'>
                                 <img class='third-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($room['image3'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                              </div>
                           </div>
                           <a class='carousel-control-prev' href='#".$roomnum."Carousel"."' role='button' data-slide='prev'>
                              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                              <span class='sr-only'>Previous</span>
                           </a>
                           <a class='carousel-control-next' href='#".$roomnum."Carousel"."' role='button' data-slide='next'>
                              <span class='carousel-control-next-icon' aria-hidden='true'></span>
                              <span class='sr-only'>Next</span>
                           </a>
                        </div>
                     </div>
                     <div class='bed_room'>
                        <h3>".$room['name']."</h3>
                        <p>".$room['description']."</p>
                     </div>
                  </div>
               </div>";
               $index += 1;
               }
            
            ?>
         </div>
         <div class='hata'>Tüm oda çeşitlerimizi görmek için <a href='room.php'>tıklayın.</a></div>
      </div>
   </div>
   <!-- end our_room -->
   <!-- gallery
   <div class="gallery">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>GALERİ</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery1.jpg" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery2.jpg" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery3.jpg" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery4.jpg" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery5.jpg" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery6.jpg" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery7.jpg" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img src="images/gallery8.jpg" alt="#" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
    end gallery -->
   <!--  contact -->
   <div class="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>BİZE ULAŞIN</h2>
               </div>
            </div>
         </div>
         <div class="row2">
            <div class="col-md-6">
               <form id="request" class="main_form" method="POST" action="index.php">
                  <div class="row">
                     <div class="col-md-12 ">
                        <input class="contactus" placeholder="İsim" type="text" name="name">
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Soyisim" type="text" name="surname">
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Mail" type="text" name="mail">
                     </div>
                     <div class="col-md-12">
                        <textarea class="textarea" placeholder="Mesaj" name="message">Mesajınız</textarea>
                     </div>
                     <div class="col-md-12">
                        <input class="send_btn" type="submit" name="gonder"></button>
                     </div>
                  </div>
               </form>
               <?php
               include "dbconnection.php";

               if (isset($_POST['gonder'])) {
                  $name = $_POST['name'];
                  $surname = $_POST['surname'];
                  $mail = $_POST['mail'];
                  $message = $_POST['message'];


                  $sorgu = mysqli_query($connection, "insert into contactus (msg_id,name,surname,mail,message) values (NULL,'$name','$surname','$mail','$message')") or die("Hata: Kayıt gerçekleştirilemedi.");
               }
               ?>
            </div>
         </div>
      </div>
   </div>
   <!-- end contact -->
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
                     <li class="active"><a href="#">Ana Sayfa</a></li>
                     <li><a href="about.php">Hakkımızda</a></li>
                     <li><a href="room.php">Odalarımız</a></li>
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