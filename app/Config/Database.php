<?php
    namespace App\Config;

    use PDO;
    use PDOException;

    class Database{
        private static ?PDO $conn = null;
        public static function getConnection(): PDO{
            if(self::$conn) return self::$conn;

            $host = "127.0.0.1:3307";
            $dbname = "sistema_av_iii";
            $user = "root";
            $pass = "";
            $charset = "utf8mb4";

            // criar a nossa string de conexão
            $dns = "mysql:host=$host;dbname=$dbname;charset=$charset";

            // estabelecer a conexão
            try {
                self::$conn = new PDO($dns, $user, $pass);
                return self::$conn;
            } catch (PDOException $e) {
                // exibir o erro
                echo $e->getMessage();
            }
        }   
    }
 ?>