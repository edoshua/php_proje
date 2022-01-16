<?php
    include "dbconnection";

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $mail = $_POST['mail'];
        $message = $_POST['message'];
    }

    $insert = mysqli_query($connection, "INSERT into contactUs (id,name,surname,mail,message) values (NULL,'$name','$surname','$mail','$message')") 
                or die("Hata: Mesaj gönderilemedi.");

?>