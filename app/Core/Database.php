<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use Throwable;

class Database
{
    private static ?PDO $connection = null;
    private static bool $attempted = false;

    public static function connect(): ?PDO
    {
        if (self::$connection !== null) {
            return self::$connection;
        }
        if (self::$attempted) {
            return null;
        }
        self::$attempted = true;

        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            self::$connection = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_TIMEOUT => 2,
            ]);
            return self::$connection;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function isAvailable(): bool
    {
        return self::connect() !== null;
    }
}
