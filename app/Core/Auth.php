<?php
declare(strict_types=1);

namespace App\Core;

class Auth
{
    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function isAdmin(): bool
    {
        return self::check() && (self::user()['role'] ?? '') === 'admin';
    }

    public static function requireLogin(): void
    {
        if (!self::check()) {
            flash('error', 'Please sign in to access the RescuePro Customer Portal.');
            header('Location: ' . url('/login'));
            exit;
        }
    }

    public static function requireAdmin(): void
    {
        self::requireLogin();
        if (!self::isAdmin()) {
            http_response_code(403);
            exit('403 Forbidden — RescuePro Administrator dispatch privileges required.');
        }
    }
}
