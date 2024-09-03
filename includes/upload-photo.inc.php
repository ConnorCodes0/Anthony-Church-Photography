<?php
    session_start();
    if (empty($_SESSION['legit']) || $_SESSION['legit'] === '') {
        header('location: admin.php');
        die();
    }



    // upload image to file

    $targetDir = '../photo-uploads/';
    $targetFile =  $targetDir . basename($_FILES['photo-src']['name']);
    $uploadOk = 1;
    $imgFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // check if file has already been uploaded

    if (file_exists($targetFile)) {
        $uploadOk = 0;
        $uploadFailed = 'File already uploaded!';
    }

    // limit the file size

    if ($_FILES['photo-src']['size'] > 10000000) {
        $uploadOk = 0;
        $uploadFailed = 'File size too big! (maximum size is 10 MB)';
    }

    // limit file type to jpg jpeg png and gif

    if ($imgFileType !== 'jpg' && $imgFileType !== 'jpeg' &&
        $imgFileType !== 'png' && $imgFileType !== 'gif'
        ) {
        $uploadOk = 0;
        $uploadFailed = 'Wrong file type! (only jpg, jpeg, png and gif allowed)';
    }

    // if everything is ok try to upload file and send all the info to the database
    if ($uploadOk === 1) {

        move_uploaded_file($_FILES['photo-src']['tmp_name'], $targetFile);

        try {
            require_once 'dbh.inc.php';
    
            $photoName = $_POST['photo-name'];
            $photoSrc = $_FILES['photo-src']['name'];
            $photoDesc = $_POST['photo-desc'];
            $uploadDate = date('d-m-y');
    
            $sql = 'INSERT INTO photos (photo_name, photo_src, photo_desc, photo_date) VALUES (:photo_name, :photo_src, :photo_desc, :photo_date)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':photo_name' => $photoName,
                ':photo_src' => $photoSrc,
                ':photo_desc' => $photoDesc,
                ':photo_date' => $uploadDate
            ]);
    
            $_SESSION['file-upload'] = 'Image was successfully uploaded!';
            header('location: ../admin-area.php');
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
            $_SESSION['file-upload'] = 'Upload failed: ' . $uploadFailed;
            header('location: ../admin-area.php');
    }