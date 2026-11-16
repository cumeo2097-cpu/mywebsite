<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CatalogData;

class CommercialController extends Controller
{
    public function index(): void
    {
        $this->view('commercial/index', [
            'title' => 'Commercial Restoration, Large Loss & Specialty Cleaning',
            'industries' => CatalogData::industries(),
            'services' => CatalogData::services(),
        ]);
    }

    public function erp(): void
    {
        $this->view('commercial/erp', [
            'title' => 'Emergency Ready Plan (ERP) — Business Continuity',
            'industries' => CatalogData::industries(),
        ]);
    }
}
