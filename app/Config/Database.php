<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private static ?PDO $conn = null;

    public static function getConnection(): PDO {
        if (self::$conn) return self::$conn;

        // Ler variáveis de ambiente primeiro (útil para CI)
        $host = getenv('DB_HOST') ?: "127.0.0.1:3307";
        $dbname = getenv('DB_DATABASE') ?: "sistema_av_iii";
        $user = getenv('DB_USER') ?: "root";
        $pass = getenv('DB_PASSWORD') ?: "";
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        try {
            self::$conn = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return self::$conn;
        } catch (PDOException $e) {
            echo "Erro ao conectar no banco: " . $e->getMessage();
            exit;
        }
    }
}
?>
