<?php

    include "../dbconnection.php";
    if(isset($_GET['id']))
    {
        $deleteid = $_GET['id'];
        $deletequery = mysqli_query($connection, "DELETE FROM gallery WHERE img_id=$deleteid");
        $Message = urlencode("Silme işlemi başarılı.");
        header("Location: gallery.php?Message=".$Message);
    }

?>