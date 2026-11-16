<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\CatalogData;
use App\Models\ServiceRequest;

class AdminController extends Controller
{
    public function index(): void
    {
        Auth::requireAdmin();
        $this->view('admin/index', [
            'title' => 'National Dispatch Command & Enterprise Operations | RescuePro®',
            'requests' => ServiceRequest::all(),
            'erpProfiles' => ServiceRequest::allErp(),
            'franchiseInquiries' => ServiceRequest::allFranchiseInquiries(),
            'ceRegistrations' => ServiceRequest::allCeRegistrations(),
            'fleetInventory' => CatalogData::fleetInventory(),
            'psychrometricLogs' => CatalogData::psychrometricLogs(),
            'insuranceClaims' => CatalogData::insuranceClaims(),
            'franchises' => CatalogData::franchises(),
        ]);
    }

    public function update(): void
    {
        Auth::requireAdmin();
        verify_csrf();
        $id = (int)($_POST['id'] ?? 0);
        $status = $_POST['status'] ?? 'New';
        $notes = trim($_POST['admin_notes'] ?? '');
        $allowed = ['New', 'Dispatched', 'On-Site Drying', 'Completed', 'Cancelled'];

        if ($id > 0 && in_array($status, $allowed, true)) {
            ServiceRequest::updateStatus($id, $status, $notes);
            flash('success', 'Dispatch ticket #' . $id . ' updated to "' . $status . '" and synced across customer notifications.');
        } else {
            flash('error', 'Invalid request ID or status.');
        }

        $this->redirect('/admin');
    }
}
