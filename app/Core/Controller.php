<?php
declare(strict_types=1);

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (!is_file($viewFile)) {
            http_response_code(500);
            exit('View not found: ' . e($view));
        }
        require __DIR__ . '/../Views/layouts/header.php';
        require $viewFile;
        require __DIR__ . '/../Views/layouts/footer.php';
    }

    protected function json(array $payload, int $status = 200): never
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    protected function redirect(string $path): never
    {
        header('Location: ' . url($path));
        exit;
    }
}
