<?php
    $connection = mysqli_connect("localhost", "root", "", "proje");

    if(mysqli_connect_errno())
    {
        echo "Failed to connect mySQL: ".mysqli_connect_error();
    }


?>