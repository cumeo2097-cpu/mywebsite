<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\CatalogData;
use App\Models\ServiceRequest;

class PortalController extends Controller
{
    public function index(): void
    {
        Auth::requireLogin();
        $user = Auth::user();
        if (($user['role'] ?? '') === 'admin') {
            $this->redirect('/admin');
        }

        $this->view('portal/index', [
            'title' => 'Customer Restoration Portal | RescuePro®',
            'requests' => ServiceRequest::forUser((int)$user['id'], (string)$user['email']),
            'erpProfiles' => ServiceRequest::erpForUser((int)$user['id']),
            'psychrometricLogs' => CatalogData::psychrometricLogs(),
            'insuranceClaims' => CatalogData::insuranceClaims(),
        ]);
    }
}
