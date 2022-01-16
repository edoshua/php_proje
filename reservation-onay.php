<html>
    <body>
        <form method="POST" action="reservation-onay.php" enctype="multipart/form-data">
            <input type="file" name="resim"></input>
            <input type="submit" name="gonder" value="gonder">
        </form>
    </body>
</html>

<?php 
    if(isset($_POST['gonder']))
    {
        echo $_FILES['resim']['name'];
    }
?>