<?php
    require_once 'includes/head.inc.php';
?>
<title>Anthony Church Photography | Gallery</title>
</head>

<body>
    <section class="gallery">
        <div class="gallery-wrapper">
            <?php
                require_once 'includes/navbar.inc.php';
            ?>

            <div class="gallery-container">
                <?php
                    // grab all data from photos table and display them on the gallery page
                    require_once 'includes/dbh.inc.php';

                    $sql = 'SELECT * FROM photos';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $photos = $stmt->fetchAll();

                    foreach ($photos as $photo) {
                        $photoName = $photo['photo_name'];
                        $photoSrc = $photo['photo_src'];
                        $photoDesc = $photo['photo_desc'];
                        $photoDate = $photo['photo_date'];

                        ////// NEED TO VALIDATE THE USER INPUTS

                        $imageBtn = '<div class="image-btn-wrapper"><div class="image-btn" data-name="' . $photoName . '" data-src="' . $photoSrc . '" data-desc="' . $photoDesc . '" data-date="' . $photoDate . '" style="background: url(photo-uploads/' . $photoSrc . '), no-repeat; background-position: center;background-size: cover;"><h2>' . $photoName . '</h2></div></div>';
                        
                        echo $imageBtn;
                    }
                ?>
            </div>

            <div class="popup-wrapper">
                <div class="image-popup-container">
                    <div class="popup-img"></div>
                    <div class="popup-content">
                        <div class="popup-h2-wrapper">
                            <h2 class="popup-name"></h2>
                            <h2 class="popup-date"></h2>
                        </div>
                        <p class="popup-desc"></p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php
        require_once 'includes/contact-section.inc.php';
        require_once 'includes/footer.inc.php';
    ?>
</body>
</html>
