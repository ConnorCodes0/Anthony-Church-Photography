<?php

try {

    require_once 'dbh.inc.php';

    $sql = 'INSERT INTO messages (message_name, message_email, message_message) VALUES (:message_name, :message_email, :message_message)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':message_name' => $name, 'message_email' => $email, 'message_message' => $message]);

    $sent = true;

} catch (PDOException $e) {
    echo 'Message couldnt be sent to database: ' . $e;
}