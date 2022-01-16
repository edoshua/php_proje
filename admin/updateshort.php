<?php

    include "../dbconnection.php";
    if(isset($_POST['shortsubmit']))
    {
        $id = 1;
        $short = $_POST['short'];
        $updatequery = mysqli_query($connection, "UPDATE `aboutus` SET `short_desc` = '".$short."' WHERE `aboutus`.`id` = 1;") or die("Hata!");
        $Message = urlencode("Düzenleme başarılı.");
        header("Location: aboutus.php?Message=".$Message);
    }

?>