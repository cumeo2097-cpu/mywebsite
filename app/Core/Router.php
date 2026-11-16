<?php
declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    private const ALIASES = [
        '/index.php' => '/',
        '/home' => '/',
        '/water-damage-restoration' => '/services/water-damage',
        '/water-damage' => '/services/water-damage',
        '/fire-damage-restoration' => '/services/fire-damage',
        '/fire-damage' => '/services/fire-damage',
        '/mold-remediation' => '/services/mold-remediation',
        '/storm-damage-restoration' => '/services/storm-damage',
        '/storm-damage' => '/services/storm-damage',
        '/construction-services' => '/services/construction',
        '/construction' => '/services/construction',
        '/commercial-services' => '/commercial',
        '/services/commercial' => '/commercial',
        '/service/commercial' => '/commercial',
        '/commercial/emergency-ready-plan' => '/commercial/erp',
        '/erp' => '/commercial/erp',
        '/cleaning' => '/service/cleaning',
        '/cleaning/specialty' => '/services/specialty-cleaning',
        '/cleaning/biohazard' => '/services/biohazard-cleaning',
        '/resources/general-cleaning' => '/service/cleaning',
        '/resources/for-insurance-professionals' => '/insurance',
        '/resources/insurance' => '/insurance',
        '/faqs' => '/faq',
        '/resources/faq' => '/faq',
        '/terms' => '/terms-of-service',
        '/privacy' => '/privacy-policy',
        '/contact-us' => '/contact',
        '/site-map' => '/sitemap',
        '/about' => '/why-servpro',
        '/why-rescuepro' => '/why-servpro',
        '/preferred-vendor' => '/about/preferred-vendor',
        '/careers/franchise' => '/franchise-ownership',
        '/franchise' => '/franchise-ownership',
        '/request-help' => '/#request',
        '/lookup' => '/locations',
    ];

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$this->normalize($path)] = $handler;
    }

    public function post(string $path, array $handler): void
    {
        $this->routes['POST'][$this->normalize($path)] = $handler;
    }

    private function normalize(string $path): string
    {
        $clean = strtolower(trim(strtok($path, '?#') ?: '/'));
        if ($clean === '' || $clean === '/') {
            return '/';
        }
        return '/' . trim($clean, '/');
    }

    public function dispatch(string $method, string $path): void
    {
        $norm = $this->normalize($path);
        if (isset(self::ALIASES[$norm])) {
            $mapped = self::ALIASES[$norm];
            if ($mapped === '/#request') {
                $norm = '/';
            } else {
                $norm = $this->normalize($mapped);
            }
        }

        $handler = $this->routes[$method][$norm] ?? null;
        if (!$handler) {
            http_response_code(404);
            (new \App\Controllers\HomeController())->notFound();
            return;
        }
        [$class, $action] = $handler;
        (new $class())->$action();
    }
}
