<?php include './db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './css.php'; ?>
    <title>Photo Gallery App</title>
</head>

<body>

    <div class="container">
        <!-- PHOTO UPLODING SECTION START -->
        <h1>Photo Gallery</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Photo Title" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
        <!-- PHOTO UPLODING SECTION END -->
        <hr>

        <!-- PHOTO GALLERY SECTION START -->
        <div class="gallery">
            <!-- Photo Details -->
             <?php
                $result = $conn->query("SELECT * FROM photos ORDER BY created_at DESC");
                if($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
             ?>
            <div class="">
                <h2><?php echo $row['title']; ?></h2>
                <img src="<?= $row['image_path'] ?>" alt="image" width="200px">
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </div>
            <?php
            endwhile;
        else:
            echo "No photos found";
        endif;
        ?>
        </div>
        <!-- PHOTO GALLERY SECTION END -->
    </div>







</body>

</html>