<?php
if(isset($_POST['submit']) && isset($_FILES['my_image']))
{
    include"db_connection.php";
    echo"<pre>";
    print_r($_FILES['my_image']);
    echo"</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_type = $_FILES['my_image']['type'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    $img_size = $_FILES['my_image']['size'];

    if($error === 0){
        if ($img_size > 1250000) {
            $em = "Large image it must be <=1mb.";
            header("location: user_test.php?error=$em");
        }else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            //echo($img_ex);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "png", "jpeg");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_ing_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_ing_name; //you have to create a 'uploads' folder in the root directory of this project
                move_uploaded_file($tmp_name, $img_upload_path);
                
                //insert into database    
                $sql = "INSERT INTO `images`( `image_url`) VALUES ('$new_ing_name')";
                mysqli_query($conn, $sql);

            }else {
                $em = "File not supported";
                header("location: user_test.php?error=$em");
            }
        }
    }else{
        $em = "Unknown Error occourd";
        header("location: user_test.php?error=$em");
    }
}


?>
