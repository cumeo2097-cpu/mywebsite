<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\CatalogData;
use App\Models\ServiceRequest;

class RequestController extends Controller
{
    public function store(): void
    {
        verify_csrf();
        $user = Auth::user();
        $data = [
            'user_id' => $user['id'] ?? null,
            'full_name' => trim($_POST['full_name'] ?? ($user['name'] ?? '')),
            'email' => trim($_POST['email'] ?? ($user['email'] ?? '')),
            'phone' => trim($_POST['phone'] ?? ''),
            'service_type' => trim($_POST['service_type'] ?? ''),
            'property_type' => trim($_POST['property_type'] ?? 'Residential'),
            'zip_code' => trim($_POST['zip_code'] ?? '37066'),
            'address' => trim($_POST['address'] ?? ''),
            'water_category' => trim($_POST['water_category'] ?? 'N/A'),
            'details' => trim($_POST['details'] ?? ''),
        ];

        if (
            strlen($data['full_name']) < 2
            || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
            || strlen($data['phone']) < 7
            || $data['service_type'] === ''
            || strlen($data['address']) < 5
        ) {
            flash('error', 'Please complete all required emergency dispatch fields (Name, Email, Phone, Service, and Address).');
            $this->redirect('/#request');
        }

        $ticket = ServiceRequest::create($data);
        flash('success', 'Emergency Dispatch Ticket #' . $ticket . ' created! Our local 24/7 RescuePro® franchise team will contact you within 15 minutes.');
        $this->redirect($user ? '/portal' : '/#request');
    }

    public function storeContactInquiry(): void
    {
        verify_csrf();
        $name = trim($_POST['full_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $topic = trim($_POST['topic'] ?? 'General Inquiry');
        $message = trim($_POST['message'] ?? '');

        if (strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($message) < 6) {
            flash('error', 'Please enter your name, valid email address, and message.');
            $this->redirect('/contact');
        }

        ServiceRequest::saveContactInquiry([
            'full_name' => $name,
            'email' => $email,
            'topic' => $topic,
            'message' => $message,
        ]);
        flash('success', 'Thank you, ' . $name . '. Your message regarding "' . $topic . '" has been routed to RescuePro® National Support.');
        $this->redirect('/contact');
    }

    public function storeFranchiseInquiry(): void
    {
        verify_csrf();
        $data = [
            'full_name' => trim($_POST['full_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'territory_state' => trim($_POST['territory_state'] ?? ''),
            'liquid_capital' => trim($_POST['liquid_capital'] ?? ''),
            'notes' => trim($_POST['notes'] ?? ''),
        ];

        if (strlen($data['full_name']) < 2 || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) || strlen($data['phone']) < 7) {
            flash('error', 'Please provide a valid name, email, and phone number for the Franchise Development Team.');
            $this->redirect('/franchise#inquiry');
        }

        ServiceRequest::saveFranchiseInquiry($data);
        flash('success', 'Franchise Inquiry submitted! Our Franchise Sales Team (' . FRANCHISE_PHONE . ') will deliver your FDD information packet.');
        $this->redirect('/franchise-ownership');
    }

    public function storeCeRegistration(): void
    {
        verify_csrf();
        $data = [
            'full_name' => trim($_POST['full_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'agency_name' => trim($_POST['agency_name'] ?? ''),
            'license_number' => trim($_POST['license_number'] ?? ''),
            'course_title' => trim($_POST['course_title'] ?? ''),
        ];

        if (strlen($data['full_name']) < 2 || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) || $data['course_title'] === '') {
            flash('error', 'Please complete your name, valid email, and select a Continuing Education course.');
            $this->redirect('/insurance#ce-register');
        }

        ServiceRequest::saveCeRegistration($data);
        flash('success', 'Seat reserved for "' . $data['course_title'] . '"! Calendar invite & CE credit instructions sent to ' . $data['email'] . '.');
        $this->redirect('/insurance');
    }

    public function storeErpProfile(): void
    {
        verify_csrf();
        $user = Auth::user();
        $data = [
            'user_id' => $user['id'] ?? null,
            'facility_name' => trim($_POST['facility_name'] ?? ''),
            'facility_type' => trim($_POST['facility_type'] ?? 'Commercial Office'),
            'address' => trim($_POST['address'] ?? ''),
            'water_shutoff' => trim($_POST['water_shutoff'] ?? ''),
            'electric_panel' => trim($_POST['electric_panel'] ?? ''),
            'gas_shutoff' => trim($_POST['gas_shutoff'] ?? ''),
            'emergency_contact' => trim($_POST['emergency_contact'] ?? ''),
        ];

        if (strlen($data['facility_name']) < 2 || strlen($data['address']) < 5) {
            flash('error', 'Please enter your facility name and street address to save an Emergency Ready Profile.');
            $this->redirect('/commercial/erp');
        }

        ServiceRequest::saveErpProfile($data);
        flash('success', 'Emergency Ready Plan (ERP) for "' . $data['facility_name'] . '" saved and synced to your mobile readiness profile!');
        $this->redirect($user ? '/portal' : '/commercial/erp');
    }

    public function locationsJson(): void
    {
        $q = strtolower(trim($_GET['q'] ?? ''));
        $franchises = CatalogData::franchises();
        if ($q !== '') {
            $franchises = array_values(array_filter($franchises, static function (array $f) use ($q): bool {
                return str_contains(strtolower($f['zip'] . ' ' . $f['city'] . ' ' . $f['state'] . ' ' . $f['name']), $q);
            }));
        }
        $this->json(['ok' => true, 'results' => $franchises]);
    }
}
