<?php
                         
 if(isset($_POST["submit"])) {
   
   
    include "../dbconnection.php";
  

   if(!empty($_FILES["foto"]["name"])) {
                                   
     $fileName = basename($_FILES["foto"]["name"]);
     $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
     
     $allowTypes = array('jpg','png','jpeg','gif');

     if(in_array($fileType, $allowTypes)) {

       $image = $_FILES['foto']['tmp_name'];
       $imgContent = addslashes(file_get_contents($image));

     }


     $kaydet = mysqli_query($connection,"INSERT into gallery (img_id, img) values 
     (NULL,'".$imgContent."')") or die("Hata: kayıt işlemi gerçekleşemedi.");
    $Message = urlencode("Ekleme başarılı.");
    header("Location: gallery.php?Message=".$Message);
     
   }
   
 }

                        ?>