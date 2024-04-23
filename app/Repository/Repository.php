<?php
namespace Repository;

use PDO;

class Repository
{
    protected static PDO $pdo;
    public static function getPdo(): PDO
    {
        if (isset(self::$pdo)) {
            return self::$pdo;
        }

        $pgsql = getenv('DB_CONNECTION');
        $port = getenv('DB_PORT');
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        return  self::$pdo = new PDO("$pgsql:host=$host; port = $port; dbname=$dbname", "$username", "$password");
    }


}