<?php

    include "../dbconnection.php";
    if(isset($_GET['id']))
    {
        $deleteid = $_GET['id'];
        $deletequery = mysqli_query($connection, "DELETE FROM users WHERE ID=$deleteid");
        $Message = urlencode("Silme işlemi başarılı.");
        header("Location: user.php?Message=".$Message);
    }

?>