<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use Throwable;

class User
{
    private static function initFallbackUsers(): void
    {
        if (!isset($_SESSION['_fallback_users'])) {
            $_SESSION['_fallback_users'] = [
                [
                    'id' => 1,
                    'name' => 'RescuePro National Admin',
                    'email' => 'admin@rescuepro.test',
                    'password' => password_hash('Admin123!', PASSWORD_DEFAULT),
                    'role' => 'admin',
                ],
                [
                    'id' => 2,
                    'name' => 'Demo Homeowner Customer',
                    'email' => 'customer@rescuepro.test',
                    'password' => password_hash('Customer123!', PASSWORD_DEFAULT),
                    'role' => 'customer',
                ],
            ];
        }
    }

    public static function findByEmail(string $email): ?array
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $q = $pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
                $q->execute([$email]);
                $row = $q->fetch();
                if ($row) {
                    return $row;
                }
            } catch (Throwable $e) {
                // Fall through to session fallback if table does not exist yet
            }
        }

        self::initFallbackUsers();
        foreach ($_SESSION['_fallback_users'] as $u) {
            if (strcasecmp($u['email'], $email) === 0) {
                return $u;
            }
        }
        return null;
    }

    public static function create(string $name, string $email, string $password): int
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $q = $pdo->prepare('INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)');
                $q->execute([$name, $email, $hash, 'customer']);
                return (int)$pdo->lastInsertId();
            } catch (Throwable $e) {
                // Fall back to session store if DB not imported
            }
        }

        self::initFallbackUsers();
        $nextId = count($_SESSION['_fallback_users']) + 1;
        $_SESSION['_fallback_users'][] = [
            'id' => $nextId,
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'role' => 'customer',
        ];
        return $nextId;
    }
}
