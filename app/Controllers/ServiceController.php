<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CatalogData;

class ServiceController extends Controller
{
    private function renderService(string $key): void
    {
        $aliases = [
            'water-damage' => 'water',
            'fire-damage' => 'fire',
            'mold-remediation' => 'mold',
            'storm-damage' => 'storm',
            'biohazard-cleaning' => 'biohazard',
            'specialty-cleaning' => 'specialty',
            'general-cleaning' => 'cleaning',
        ];
        $resolvedKey = $aliases[$key] ?? $key;
        $services = CatalogData::services();
        $service = $services[$resolvedKey] ?? $services['water'];
        $this->view('services/detail', [
            'title' => $service['title'],
            'service' => $service,
            'allServices' => $services,
            'articles' => CatalogData::articles(),
        ]);
    }

    public function water(): void { $this->renderService('water'); }
    public function fire(): void { $this->renderService('fire'); }
    public function mold(): void { $this->renderService('mold'); }
    public function storm(): void { $this->renderService('storm'); }
    public function construction(): void { $this->renderService('construction'); }
    public function biohazard(): void { $this->renderService('biohazard'); }
    public function cleaning(): void { $this->renderService('cleaning'); }
    public function specialty(): void { $this->renderService('specialty'); }
}