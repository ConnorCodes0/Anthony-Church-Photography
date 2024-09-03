<?php

try {
    $serverName = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'anthonychurchphotography';
    $charset = 'utf8mb4';

    $dsn = 'mysql:host=' . $serverName . ';dbname=' . $dbName . ';charset=' . $charset;
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Connection to the database failed: ' . $e->getMessage();
}