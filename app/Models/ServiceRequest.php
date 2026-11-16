<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use Throwable;

class ServiceRequest
{
    private static function initFallback(): void
    {
        if (!isset($_SESSION['_fallback_requests'])) {
            $_SESSION['_fallback_requests'] = [
                [
                    'id' => 1,
                    'user_id' => 2,
                    'ticket_code' => 'RP-2026-1001',
                    'full_name' => 'Demo Homeowner Customer',
                    'email' => 'customer@rescuepro.test',
                    'phone' => '(615) 555-0192',
                    'service_type' => 'Water Damage Restoration',
                    'property_type' => 'Residential',
                    'zip_code' => '37066',
                    'address' => '412 Maplewood Drive, Gallatin, TN 37066',
                    'water_category' => 'Category 1 - Clean Water',
                    'details' => 'Burst copper supply line behind upstairs guest bathroom vanity causing ceiling drywall saturation across hallway and master closet.',
                    'status' => 'On-Site Drying',
                    'admin_notes' => 'Crew Chief M. Davis on site with 4 air movers, 2 LGR dehumidifiers, and daily pinless psychrometric tracking.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
                    'account_email' => 'customer@rescuepro.test',
                ],
                [
                    'id' => 2,
                    'user_id' => 2,
                    'ticket_code' => 'RP-2026-1002',
                    'full_name' => 'Demo Homeowner Customer',
                    'email' => 'customer@rescuepro.test',
                    'phone' => '(615) 555-0192',
                    'service_type' => 'Mold Remediation',
                    'property_type' => 'Residential',
                    'zip_code' => '37201',
                    'address' => '815 Cumberland Ave, Nashville, TN 37201',
                    'water_category' => 'N/A',
                    'details' => 'Musty odor and visible dark spotting along basement concrete block wall after spring rains; air quality clearance requested.',
                    'status' => 'Dispatched',
                    'admin_notes' => 'HEPA negative-air containment barrier and air scrubber unit scheduled for 14:00 inspection.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-5 hours')),
                    'account_email' => 'customer@rescuepro.test',
                ],
                [
                    'id' => 3,
                    'user_id' => null,
                    'ticket_code' => 'RP-2026-1003',
                    'full_name' => 'Elena Vance - Summit Hotel',
                    'email' => 'evance@summithotel.com',
                    'phone' => '(214) 555-0148',
                    'service_type' => 'Commercial Large Loss',
                    'property_type' => 'Commercial',
                    'zip_code' => '75201',
                    'address' => '1200 Commerce St, Dallas, TX 75201',
                    'water_category' => 'Category 2 - Grey Water',
                    'details' => 'Sprinkler head malfunction on 4th floor east wing affecting 8 guest suites and elevator lobby corridor.',
                    'status' => 'New',
                    'admin_notes' => 'Priority Large Loss CAT crew notified; Xactimate preliminary estimate queued.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-40 minutes')),
                    'account_email' => null,
                ],
                [
                    'id' => 4,
                    'user_id' => 2,
                    'ticket_code' => 'RP-2026-1004',
                    'full_name' => 'Demo Homeowner Customer',
                    'email' => 'customer@rescuepro.test',
                    'phone' => '(615) 555-0192',
                    'service_type' => 'Fire & Smoke Restoration',
                    'property_type' => 'Residential',
                    'zip_code' => '37066',
                    'address' => '412 Maplewood Drive, Gallatin, TN 37066',
                    'water_category' => 'Fire / Soot / Odor',
                    'details' => 'Kitchen range grease flare-up left protein soot residue on upper cabinetry and HVAC return grill; odor removal completed.',
                    'status' => 'Completed',
                    'admin_notes' => 'Dry-chemical sponge cleaning, thermal hydroxyl treatment, and final air clearance passed.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-9 days')),
                    'account_email' => 'customer@rescuepro.test',
                ],
            ];
        }
        if (!isset($_SESSION['_fallback_erp'])) {
            $_SESSION['_fallback_erp'] = [
                [
                    'id' => 1,
                    'user_id' => 2,
                    'facility_name' => 'Maplewood Residence & Home Office',
                    'facility_type' => 'Residential',
                    'address' => '412 Maplewood Drive, Gallatin, TN 37066',
                    'water_shutoff' => 'Front Foundation Perimeter Box — Copper Ball Valve #1',
                    'electric_panel' => 'Garage West Wall — 200A Main Breaker Box',
                    'gas_shutoff' => 'South Exterior Meter — Crescent Wrench Shutoff',
                    'emergency_contact' => 'Demo Homeowner Customer — (615) 555-0192',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
                ],
            ];
        }
    }

    public static function create(array $d): string
    {
        $ticket = 'RP-' . date('Y') . '-' . random_int(1100, 9999);
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $sql = 'INSERT INTO service_requests (user_id, ticket_code, full_name, email, phone, service_type, property_type, zip_code, address, water_category, details, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                $q = $pdo->prepare($sql);
                $q->execute([
                    $d['user_id'],
                    $ticket,
                    $d['full_name'],
                    $d['email'],
                    $d['phone'],
                    $d['service_type'],
                    $d['property_type'],
                    $d['zip_code'] ?? '37066',
                    $d['address'],
                    $d['water_category'] ?? 'N/A',
                    $d['details'],
                    'New',
                ]);
                return $ticket;
            } catch (Throwable $e) {
                // Fall back to session
            }
        }

        self::initFallback();
        array_unshift($_SESSION['_fallback_requests'], [
            'id' => count($_SESSION['_fallback_requests']) + 1,
            'user_id' => $d['user_id'],
            'ticket_code' => $ticket,
            'full_name' => $d['full_name'],
            'email' => $d['email'],
            'phone' => $d['phone'],
            'service_type' => $d['service_type'],
            'property_type' => $d['property_type'],
            'zip_code' => $d['zip_code'] ?? '37066',
            'address' => $d['address'],
            'water_category' => $d['water_category'] ?? 'N/A',
            'details' => $d['details'],
            'status' => 'New',
            'admin_notes' => 'Awaiting dispatcher review.',
            'created_at' => date('Y-m-d H:i:s'),
            'account_email' => $d['email'],
        ]);
        return $ticket;
    }

    public static function forUser(int $userId, string $email = ''): array
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $q = $pdo->prepare('SELECT * FROM service_requests WHERE user_id = ? OR email = ? ORDER BY created_at DESC');
                $q->execute([$userId, $email]);
                return $q->fetchAll();
            } catch (Throwable $e) {
            }
        }

        self::initFallback();
        return array_values(array_filter($_SESSION['_fallback_requests'], static function ($r) use ($userId, $email) {
            return ((int)($r['user_id'] ?? 0) === $userId) || ($email !== '' && strcasecmp($r['email'], $email) === 0);
        }));
    }

    public static function all(): array
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                return $pdo->query('SELECT r.*, u.email AS account_email FROM service_requests r LEFT JOIN users u ON u.id = r.user_id ORDER BY r.created_at DESC')->fetchAll();
            } catch (Throwable $e) {
            }
        }

        self::initFallback();
        return $_SESSION['_fallback_requests'];
    }

    public static function updateStatus(int $id, string $status, string $notes = ''): void
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $q = $pdo->prepare('UPDATE service_requests SET status = ?, admin_notes = ? WHERE id = ?');
                $q->execute([$status, $notes, $id]);
                return;
            } catch (Throwable $e) {
            }
        }

        self::initFallback();
        foreach ($_SESSION['_fallback_requests'] as &$r) {
            if ((int)$r['id'] === $id) {
                $r['status'] = $status;
                if ($notes !== '') {
                    $r['admin_notes'] = $notes;
                }
            }
        }
    }

    public static function saveFranchiseInquiry(array $d): void
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $q = $pdo->prepare('INSERT INTO franchise_inquiries (full_name, email, phone, territory_state, liquid_capital, notes) VALUES (?, ?, ?, ?, ?, ?)');
                $q->execute([$d['full_name'], $d['email'], $d['phone'], $d['territory_state'], $d['liquid_capital'], $d['notes']]);
                return;
            } catch (Throwable $e) {
            }
        }
        $d['created_at'] = date('Y-m-d H:i:s');
        $_SESSION['_fallback_franchise_inquiries'][] = $d;
    }

    public static function allFranchiseInquiries(): array
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                return $pdo->query('SELECT * FROM franchise_inquiries ORDER BY created_at DESC LIMIT 20')->fetchAll();
            } catch (Throwable $e) {
            }
        }
        return $_SESSION['_fallback_franchise_inquiries'] ?? [
            [
                'full_name' => 'Morgan Hayes',
                'email' => 'mhayes@capitalgroup.com',
                'phone' => '(615) 555-0188',
                'territory_state' => 'Middle Tennessee / Williamson County',
                'liquid_capital' => '$250K – $450K Liquid Capital',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
        ];
    }

    public static function saveCeRegistration(array $d): void
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $q = $pdo->prepare('INSERT INTO ce_registrations (full_name, email, agency_name, license_number, course_title) VALUES (?, ?, ?, ?, ?)');
                $q->execute([$d['full_name'], $d['email'], $d['agency_name'], $d['license_number'], $d['course_title']]);
                return;
            } catch (Throwable $e) {
            }
        }
        $d['created_at'] = date('Y-m-d H:i:s');
        $_SESSION['_fallback_ce'][] = $d;
    }

    public static function allCeRegistrations(): array
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                return $pdo->query('SELECT * FROM ce_registrations ORDER BY created_at DESC LIMIT 20')->fetchAll();
            } catch (Throwable $e) {
            }
        }
        return $_SESSION['_fallback_ce'] ?? [
            [
                'full_name' => 'Taylor Brooks',
                'email' => 't.brooks@carrierclaims.com',
                'agency_name' => 'National Property Claims Group',
                'license_number' => 'TN-884120',
                'course_title' => 'Restorative Drying for Adjusters (IICRC S500)',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
        ];
    }

    public static function saveErpProfile(array $d): void
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                $q = $pdo->prepare('INSERT INTO erp_profiles (user_id, facility_name, facility_type, address, water_shutoff, electric_panel, gas_shutoff, emergency_contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                $q->execute([
                    $d['user_id'] ?? null,
                    $d['facility_name'],
                    $d['facility_type'],
                    $d['address'],
                    $d['water_shutoff'],
                    $d['electric_panel'],
                    $d['gas_shutoff'],
                    $d['emergency_contact'],
                ]);
                return;
            } catch (Throwable $e) {
            }
        }
        self::initFallback();
        $d['id'] = count($_SESSION['_fallback_erp']) + 1;
        $d['created_at'] = date('Y-m-d H:i:s');
        $_SESSION['_fallback_erp'][] = $d;
    }

    public static function erpForUser(?int $userId): array
    {
        $pdo = Database::connect();
        if ($pdo && $userId) {
            try {
                $q = $pdo->prepare('SELECT * FROM erp_profiles WHERE user_id = ? ORDER BY created_at DESC');
                $q->execute([$userId]);
                return $q->fetchAll();
            } catch (Throwable $e) {
            }
        }
        self::initFallback();
        return $_SESSION['_fallback_erp'] ?? [];
    }

    public static function allErp(): array
    {
        $pdo = Database::connect();
        if ($pdo) {
            try {
                return $pdo->query('SELECT * FROM erp_profiles ORDER BY created_at DESC LIMIT 20')->fetchAll();
            } catch (Throwable $e) {
            }
        }
        self::initFallback();
        return $_SESSION['_fallback_erp'] ?? [];
    }

    public static function saveContactInquiry(array $d): void
    {
        $d['created_at'] = date('Y-m-d H:i:s');
        $_SESSION['_fallback_contacts'][] = $d;
    }
}
