<?php

    include "../dbconnection.php";
    if(isset($_GET['id']))
    {
        $deleteid = $_GET['id'];
        $deletequery = mysqli_query($connection, "DELETE FROM reservation WHERE reservation_id=$deleteid");
        $Message = urlencode("Silme işlemi başarılı.");
        header("Location: dashboard.php?Message=".$Message);
    }

?>