<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CatalogData;

class CareerController extends Controller
{
    public function index(): void
    {
        $this->view('careers/index', [
            'title' => 'Build Your Career — Corporate HQ & Local Franchise Jobs | RescuePro®',
            'jobs' => CatalogData::jobs(),
        ]);
    }

    public function franchise(): void
    {
        $this->view('careers/franchise', [
            'title' => 'Own a RescuePro® Franchise — #1 Ranked Restoration System',
            'franchises' => CatalogData::franchises(),
        ]);
    }
}
