<?php

    include "../dbconnection.php";
    if(isset($_POST['longsubmit']))
    {
        $id = 1;
        $long = $_POST['long'];
        $qry = "UPDATE `aboutus` SET `long_desc` = '$long' WHERE `aboutus`.`id` = 1;";
        echo $qry;
        $updatequery = mysqli_query($connection, $qry) or die("Hata!");
        $Message = urlencode("Düzenleme başarılı.");
        header("Location: aboutus.php?Message=".$Message);
    }

?>