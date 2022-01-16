<!DOCTYPE html>
<html lang="en">

<?php
include "dbconnection.php";

if(!isset($_SESSION)) {  
    session_start(); 
 } 
 ob_start();
?>

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
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">ANA SAYFA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">HAKKIMIZDA</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="room.php">ODALARIMIZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="gallery.php">GALERİ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog.php">İLETİŞİM</a>
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
                                          <form method='POST' action='index.php'>
                                          <a href='logout.php'><img src='images/logout.png' class='user_img'></a>
                                          </form>
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
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Rezervasyon Yap</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if (!(isset($_SESSION["mail"]) && isset($_SESSION["password"]))) {
            header("Location: userlogin.php");
        }
    ?>

<!--    <div class="rescol">
        <div class="roomrow"> -->
            <?php

            if (isset($_POST['reserve'])) {
                $giris = $_POST['giris'];
                $cikis = $_POST['cikis'];
                $yetiskin = $_POST['yetiskin'];
                $cocuk = $_POST['cocuk'];
                $currentdate = date('Y-m-d');

                if ($giris < $currentdate || $giris > $cikis || $cikis < $currentdate) {
                    //$_REQUEST['Message'] = "Geçersiz tarih girdiniz.";
                    $Message = urlencode("Geçersiz tarih girdiniz.");
                    header("Location:index.php?Message=".$Message);
                } else {
                    $girisint = strtotime($giris);
                    $cikisint = strtotime($cikis);
                    $diff = $cikisint - $girisint;
                    $numberofdays = round($diff / (60 * 60 * 24));
                
                    echo "<div class='rescol'>
                            <div class='roomrow'>";

                    $nan_rooms = 0;
                    $numofrooms = 0;
                    $query1 = mysqli_query($connection, "SELECT * FROM `rooms-peoplenum` WHERE yetiskin=$yetiskin AND cocuk=$cocuk");
                    while ($room = mysqli_fetch_assoc($query1)) {
                        $roomid = $room['roomid'];
                        //echo $roomname;

                        $numofrooms += 1;
                        $available = 1;
                        $available_query = mysqli_query($connection, "SELECT * FROM reservation WHERE room_id=$roomid");
                        while($is_available = mysqli_fetch_assoc($available_query))
                        {
                            if(($giris >= $is_available['arrival'] && $giris <= $is_available['departure']) || (($cikis >= $is_available['arrival'] && $cikis <= $is_available['departure'])))
                            {
                                if($is_available['status'] == 'active')
                                {
                                    $available = 0;
                                    $nan_rooms +=1;
                                }
                            }
                        }

                        $query2 = mysqli_query($connection, "SELECT * FROM rooms WHERE id=$roomid");
                        while($roominfo = mysqli_fetch_assoc($query2))
                        {
                            echo "<div class='resroom'>
                                    <div class='resroom_row'>
                                        <div class='resroom_img'>
                                            <div id='".$roominfo['id']."Carousel"."' class='carousel slide banner' data-ride='carousel'>
                                                <ol class='carousel-indicators'>
                                                <li data-target='#".$roominfo['id']."Carousel"."' data-slide-to='0' class='active'></li>
                                                <li data-target='#".$roominfo['id']."Carousel"."' data-slide-to='1'></li>
                                                <li data-target='#".$roominfo['id']."Carousel"."' data-slide-to='2'></li>
                                                </ol>
                                                <div class='carousel-inner'>
                                                <div class='carousel-item active'>
                                                    <img class='first-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($roominfo['image1'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                                                </div>
                                                <div class='carousel-item'>
                                                    <img class='second-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($roominfo['image2'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                                                </div>
                                                <div class='carousel-item'>
                                                    <img class='third-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($roominfo['image3'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                                                </div>
                                                </div>
                                                <a class='carousel-control-prev' href='#".$roominfo['id']."Carousel"."' role='button' data-slide='prev'>
                                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Previous</span>
                                                </a>
                                                <a class='carousel-control-next' href='#".$roominfo['id']."Carousel"."' role='button' data-slide='next'>
                                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='resroom_info'>
                                            <div>
                                                <h2>".$roominfo['name']."</h2>
                                                <p class='resroom_desc'>".$roominfo['description']."</p>
                                            </div>
                                            <div class='info-panel'>
                                                <div class='bed-info'>
                                                    <img src='images/double-bed2.png' class='db_img'>
                                                    <p>".$roominfo['doubleBedNum']."</p>
                                                    <img src='images/single-bed.png' class='sb_img'>
                                                    <p>".$roominfo['singleBedNum']."</p>
                                                </div>
                                                <div class='price'>
                                                    <b class='price-font'> Gecelik Fiyat: </b>
                                                    <p class='price-font'>".$roominfo['price']."</p>
                                                    <b class='price-font'> TL</b>
                                                </div>
                                                <div class='select'>";
                                                    if($available == 0)
                                                    {
                                                    echo "
                                                        <button class='nan_btn' name='nanbutton'>DOLU</button>
                                                    ";    
                                                    }
                                                    else{
                                                        echo "<form  method='POST' action='reservation.php'>
                                                        <input type='hidden' name='id' value='".$roominfo['id']."' />
                                                        <input type='hidden' name='giris' value='".$giris."' />
                                                        <input type='hidden' name='cikis' value='".$cikis."' />
                                                        <input type='hidden' name='yetiskin' value='".$yetiskin."' />
                                                        <input type='hidden' name='cocuk' value='".$cocuk."' />
                                                        <input class='select_btn' type='submit' name='selected' value='SEÇ'>    
                                                    </form>";    
                                                    }
                                    echo "          </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                        }

                    }

                    echo "</div>
                            <div class='resinfo'>
                                <h2>HOŞGELDİNİZ ".$namesurname."</h2>
                                <h3>Ayrıntılı bilgi için lütfen size uygun odalardan birini seçiniz.</h3>
                            </div>
                
                        </div>";
                }
                if($nan_rooms == $numofrooms)
                {
                    $Message = urlencode("Girdiğiniz tarihlerde tüm odalarımız doludur.");
                    header("Location:index.php?Message=".$Message);
                }
            }

            else if (isset($_POST['selected']))
            {
                $giris = $_POST['giris'];
                $cikis = $_POST['cikis'];
                $yetiskin = $_POST['yetiskin'];
                $cocuk = $_POST['cocuk'];
                $selected_id = $_POST['id'];
                $currentdate = date('Y-m-d');

                if ($giris < $currentdate || $giris > $cikis || $cikis < $currentdate) {
                    //$_REQUEST['Message'] = "Geçersiz tarih girdiniz.";
                    $Message = urlencode("Geçersiz tarih girdiniz.");
                    header("Location:index.php?Message=".$Message);
                } else {
                    $girisint = strtotime($giris);
                    $cikisint = strtotime($cikis);
                    $diff = $cikisint - $girisint;
                    $numberofdays = round($diff / (60 * 60 * 24));
                
                    echo "<div class='rescol'>
                            <div class='roomrow'>";

                    $query1 = mysqli_query($connection, "SELECT * FROM `rooms-peoplenum` WHERE yetiskin=$yetiskin AND cocuk=$cocuk");
                    while ($room = mysqli_fetch_assoc($query1)) {
                        $roomid = $room['roomid'];
                        
                        $available = 1;
                        $available_query = mysqli_query($connection, "SELECT * FROM reservation WHERE room_id=$roomid");
                        while($is_available = mysqli_fetch_assoc($available_query))
                        {
                            if($giris > $is_available['arrival'] || $cikis < $is_available['departure'])
                            {
                                $available=0;
                            }
                        }

                        //echo $roomname;
                        $query2 = mysqli_query($connection, "SELECT * FROM rooms WHERE id=$roomid");
                        while($roominfo = mysqli_fetch_assoc($query2))
                        {
                            echo "<div class='resroom'>
                                    <div class='resroom_row'>
                                        <div class='resroom_img'>
                                            <div id='".$roominfo['id']."Carousel"."' class='carousel slide banner' data-ride='carousel'>
                                                <ol class='carousel-indicators'>
                                                <li data-target='#".$roominfo['id']."Carousel"."' data-slide-to='0' class='active'></li>
                                                <li data-target='#".$roominfo['id']."Carousel"."' data-slide-to='1'></li>
                                                <li data-target='#".$roominfo['id']."Carousel"."' data-slide-to='2'></li>
                                                </ol>
                                                <div class='carousel-inner'>
                                                <div class='carousel-item active'>
                                                    <img class='first-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($roominfo['image1'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                                                </div>
                                                <div class='carousel-item'>
                                                    <img class='second-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($roominfo['image2'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                                                </div>
                                                <div class='carousel-item'>
                                                    <img class='third-slide' src='data:image/jpg;charset=utf8;base64,".base64_encode($roominfo['image3'])."' alt='First slide' style='height: 217.15px; width: 351px;'>
                                                </div>
                                                </div>
                                                <a class='carousel-control-prev' href='#".$roominfo['id']."Carousel"."' role='button' data-slide='prev'>
                                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Previous</span>
                                                </a>
                                                <a class='carousel-control-next' href='#".$roominfo['id']."Carousel"."' role='button' data-slide='next'>
                                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='resroom_info'>
                                            <div>
                                                <h2>".$roominfo['name']."</h2>
                                                <p class='resroom_desc'>".$roominfo['description']."</p>
                                            </div>
                                            <div class='info-panel'>
                                                <div class='bed-info'>
                                                    <img src='images/double-bed2.png' class='db_img'>
                                                    <p>".$roominfo['doubleBedNum']."</p>
                                                    <img src='images/single-bed.png' class='sb_img'>
                                                    <p>".$roominfo['singleBedNum']."</p>
                                                </div>
                                                <div class='price'>
                                                    <b class='price-font'> Gecelik Fiyat: </b>
                                                    <p class='price-font'>".$roominfo['price']."</p>
                                                    <b class='price-font'> TL</b>
                                                </div>
                                                <div class='select'>";
                                                if($roominfo['id'] != $selected_id ){ 
                                                echo "<form  method='POST' action='reservation.php'>
                                                        <input type='hidden' name='id' value='".$roominfo['id']."' />
                                                        <input type='hidden' name='giris' value='".$giris."' />
                                                        <input type='hidden' name='cikis' value='".$cikis."' />
                                                        <input type='hidden' name='yetiskin' value='".$yetiskin."' />
                                                        <input type='hidden' name='cocuk' value='".$cocuk."' />
                                                        <input class='select_btn' type='submit' name='selected' value='SEÇ'>    
                                                    </form>";
                                                }
                                                else if($available == 0)
                                                {
                                                echo "
                                                    <button class='nan_btn' name='nanbutton'>DOLU</button>
                                                ";    
                                                }
                                                else{
                                                echo "
                                                    <button class='selected_btn' name='selectedbutton'>SEÇİLDİ</button>
                                                ";    
                                                }
                                echo "          </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }

                    }
                    $query3 = mysqli_query($connection, "SELECT * FROM `rooms` WHERE id=$selected_id");
                    $selectedroom = mysqli_fetch_assoc($query3);
                    $toplamfiyat = $numberofdays * $selectedroom['price'];
                    $indirimlifiyat = $toplamfiyat - ($toplamfiyat / 10);
                    echo "</div>
                            <div class='resinfo'>
                                
                                        <b>Seçtiğiniz oda: <p>".$selectedroom['name']."</p></b>
                                        <b>".$numberofdays." Gece İçin Toplam Fiyat: <p>".$toplamfiyat." TL</p></b>";
                                    if($cocuk > 0)
                                    {
                                    echo "<b>".$cocuk." Çocuk İndiriminden Sonra Ödeyeceğiniz Fiyat: <p>".$indirimlifiyat." TL</p></b>";
                                    }
                                    echo "<form method='POST' action='reservation-check.php'> 
                                            <input type='hidden' name='giris' value='".$giris."' />
                                            <input type='hidden' name='cikis' value='".$cikis."' />
                                            <input type='hidden' name='roomname' value='".$selectedroom['name']."' />
                                            <input type='hidden' name='selected_id' value='".$selected_id."' />
                                            <input class='select_btn' type='submit' name='res_onay' value='REZERVASYONU ONAYLA'>
                                        </form>";
                                
                    echo "      
                            </div>
                        </div>";
                }
            }


            ?>



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