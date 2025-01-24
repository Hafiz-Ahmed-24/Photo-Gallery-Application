<?php

include './db.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    // echo "<pre>";
    // print_r($_FILES['image']);
    // echo "</pre>";
    $image = $_FILES['image'];

    // Check if the file is an image upload

    if(isset($image) && $image['tmp_name'] !== ""){
        $uploadDir = 'uploads/';
        $filePath = $uploadDir . basename($image['name']);

        // Upload the file
        if(move_uploaded_file($image['tmp_name'], $filePath)){
            // Insert the file into the database
            $conn->query("INSERT INTO photos (title, image_path) VALUES ('$title','$filePath')");
            header('Location: index.php');
            exit;
    }else{
        echo "Failed to upload the file";
    }

}else{
    echo "Please select an image to upload";
}

}



?>