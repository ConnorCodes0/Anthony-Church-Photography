<?php
    session_start();

    if (isset($_POST['admin-submit'])) {

        try {
            require_once 'dbh.inc.php';
    
            $username = $_POST['admin-name'];
            $password = $_POST['admin-pass'];
    
            $sql = 'SELECT * FROM `admin`';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $admins = $stmt->fetchAll();
    
            foreach($admins as $admin) {
    
                if ($admin['admin_user'] === $username && $admin['admin_pass'] === $password) {
                    $_SESSION['legit'] = 'legit';
                    header('location: ../admin-area.php');
    
                } else {
                    header('location: ../admin.php');
                }
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    } else {
        header('location: ../admin.php');
    }
