<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload images</title>
</head>
<body>
<?php
    if (isset($_GET['error'])) {
        echo "<h1>". $_GET['error']."</h1>";
    }
    
    
    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="my_image">
        <input type="submit" name="submit" value="upload">

    </form>

</body>
</html>