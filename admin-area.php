<?php
    session_start();
    if (empty($_SESSION['legit']) || $_SESSION['legit'] === '') {
        header('location: admin.php');
        die();
    }

    require_once 'includes/head.inc.php';
?>
<title>Anthony Church Photography | Upload photo</title>
</head>
<body>
    <div class="upload-page">
        <div class="upload-photo-wrapper">
            <h2>
                <?php
                    $uploadH2 = '';

                    if (isset($_SESSION['file-upload'])) {
                        $uploadH2 = $_SESSION['file-upload'];
                    }

                    echo $uploadH2;
                ?>
            </h2>

            <form action="includes/upload-photo.inc.php" method="post" enctype="multipart/form-data" class="upload-photo" autocomplete="off">
                <input type="text" class="upload-input" name="photo-name" placeholder="Photos name...">
                <label for="img-btn" class="custom-input-label">
                    Choose img
                    <input type="file" class="img-btn" name="photo-src" id="img-btn" accept=".jpg, .jpeg, .png" required>
                </label>
                <textarea name="photo-desc" class="upload-input" cols="20" rows="5" placeholder="Description..."></textarea>
                <button type="submit" class="upload-btn" name="upload-btn">Upload</button>
            </form>

            <a href="gallery.php" class="go-to-gallery">Go to gallery</a>
        </div>
    </div>
</body>
</html>

<!-- 
    name
    img
    desc
    date - automatically sets as the date the img was uploaded (when sending things to db just get the date and send it) date('d-m-y');
-->


<!-- photos get uploaded to db through here then when gallery page is loaded it grabs all photos and just places them in a grid like pattern -->
