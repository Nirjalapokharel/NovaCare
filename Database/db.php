<?php
require_once __DIR__ . '/../config/config.php';

function getDB(): PDO
{
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    try {
        $dsn = "pgsql:host=" . DB_HOST
             . ";port=" . DB_PORT
             . ";dbname=" . DB_NAME;

        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        return $pdo;

    } catch (PDOException $e) {
        error_log('HMS database connection failed: ' . $e->getMessage());
        die('Database connection failed. Please try again later.');
    }
}   