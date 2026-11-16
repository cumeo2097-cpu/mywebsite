<?php
declare(strict_types=1);

function e(mixed $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function url(string $path = ''): string
{
    $clean = ltrim($path, '/');
    return rtrim(BASE_URL, '/') . ($clean === '' ? '/' : '/' . $clean);
}

function sp_url(string $path = ''): string
{
    return url($path);
}

function flash(string $type, ?string $message = null): ?string
{
    if ($message !== null) {
        $_SESSION['_flash'][$type] = $message;
        return null;
    }
    $value = $_SESSION['_flash'][$type] ?? null;
    unset($_SESSION['_flash'][$type]);
    return $value;
}

function csrf_token(): string
{
    if (empty($_SESSION['_csrf'])) {
        $_SESSION['_csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['_csrf'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(): void
{
    $token = $_POST['_token'] ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
    if (!is_string($token) || !hash_equals($_SESSION['_csrf'] ?? '', $token)) {
        http_response_code(419);
        exit('Session expired or invalid security token. Please reload and try again.');
    }
}

function old(string $key, string $default = ''): string
{
    return e($_POST[$key] ?? $default);
}

function is_active_path(string $prefix): bool
{
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $base = rtrim(BASE_URL, '/');
    if ($base !== '' && str_starts_with($uri, $base)) {
        $uri = substr($uri, strlen($base)) ?: '/';
    }
    $uri = '/' . trim($uri, '/');
    if ($prefix === '/') {
        return $uri === '/';
    }
    return $uri === $prefix || str_starts_with($uri, $prefix . '/');
}

function sp_img(string $key): string
{
    static $cache = [];
    if ($key === '') {
        return '';
    }
    if (str_starts_with($key, 'data:')) {
        return $key;
    }
    if ($key === 'mold_removal') {
        $key = 'mold_hazmat';
    }
    if (isset($cache[$key])) {
        return $cache[$key];
    }
    $dirs = [
        dirname(__DIR__, 2) . '/assets/images/rescuepro_v4/',
        dirname(__DIR__, 2) . '/assets/images/rescuepro_v3/',
        dirname(__DIR__, 2) . '/assets/images/rescuepro_v2/',
        dirname(__DIR__, 2) . '/assets/images/rescuepro/',
        dirname(__DIR__, 2) . '/assets/images/servpro/',
    ];
    foreach ($dirs as $root) {
        $jpg = $root . $key . '.jpg';
        $png = $root . $key . '.png';
        if (is_file($png) && (str_contains($key, 'logo') || str_contains($key, 'bowl'))) {
            $data = file_get_contents($png);
            if ($data !== false) {
                return $cache[$key] = 'data:image/png;base64,' . base64_encode($data);
            }
        }
        if (is_file($jpg)) {
            $data = file_get_contents($jpg);
            if ($data !== false) {
                return $cache[$key] = 'data:image/jpeg;base64,' . base64_encode($data);
            }
        }
        if (is_file($png)) {
            $data = file_get_contents($png);
            if ($data !== false) {
                return $cache[$key] = 'data:image/png;base64,' . base64_encode($data);
            }
        }
    }
    return '';
}

function sp_roof_svg(string $label = 'RESCUEPRO', string $id = 'main', bool $mini = false): string
{
    if ($label === 'SERVPRO') {
        $label = 'RESCUEPRO';
    }
    if ($mini) {
        return '<svg class="sp-mini-roof" viewBox="0 0 36 16" width="22" height="10" aria-hidden="true">'
             . '<polygon points="18,1 35,8 31,9 31,15 5,15 5,9 1,8" fill="#FF5A00"/>'
             . '<rect x="26" y="2" width="3" height="5" fill="#FF5A00"/>'
             . '</svg>';
    }
    return '<svg class="sp-logo-svg" viewBox="0 0 280 54" width="206" height="40" role="img" aria-label="' . e($label) . ' Logo">'
         . '<path d="M4,33 L140,3 L224,20.5 L224,12 L238,12 L238,23.5 L276,33 L272,38 L258,36 L258,49 L22,49 L22,36 L8,38 Z" fill="#FF5A00"/>'
         . '<text x="140" y="40" text-anchor="middle" fill="#FFFFFF" font-family="Inter,Segoe UI,Arial,sans-serif" font-weight="900" font-size="22.5" letter-spacing="1.1">' . e($label) . '<tspan font-size="10" dy="-9">®</tspan></text>'
         . '</svg>';
}

function sp_fcl_emblem_svg(): string
{
    return '<svg viewBox="0 0 260 120" width="220" height="102" role="img" aria-label="Firefighter Challenge League Official Shield">'
         . '<rect x="4" y="4" width="252" height="112" rx="14" fill="#0F2744" stroke="#E2E8F0" stroke-width="3"/>'
         . '<rect x="10" y="10" width="240" height="72" rx="9" fill="#FFFFFF"/>'
         . '<path d="M12,12 L94,12 L52,80 L12,80 Z" fill="#C41E3A"/>'
         . '<path d="M148,12 L248,12 L248,80 L102,80 Z" fill="#1D4ED8"/>'
         . '<path d="M98,20 C114,20 128,31 128,44 L128,62 L144,62 L144,76 L112,76 L112,50 C112,42 106,36 98,36 C90,36 84,42 84,50 L84,76 L68,76 L68,48 C68,32 82,20 98,20 Z" fill="#0F2744"/>'
         . '<circle cx="176" cy="38" r="14" fill="#FF5A00" opacity="0.92"/>'
         . '<path d="M170,44 L176,28 L182,44 L176,40 Z" fill="#FFFFFF"/>'
         . '<rect x="10" y="84" width="240" height="26" rx="4" fill="#0F2744"/>'
         . '<text x="130" y="101" text-anchor="middle" fill="#FFFFFF" font-family="Inter,Arial,sans-serif" font-weight="800" font-size="11.5" letter-spacing="1.2">FIREFIGHTER CHALLENGE LEAGUE</text>'
         . '</svg>';
}

function sp_bowl_emblem_svg(): string
{
    return '<svg viewBox="0 0 260 156" width="220" height="132" role="img" aria-label="RescuePro First Responder Bowl Logo">'
         . '<rect x="2" y="2" width="256" height="152" rx="10" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="2"/>'
         . '<path d="M22,36 L130,8 L206,24 L206,15 L218,15 L218,27 L238,36 L224,44 L36,44 Z" fill="#FF5A00"/>'
         . '<text x="130" y="37" text-anchor="middle" fill="#FFFFFF" font-family="Inter,Arial,sans-serif" font-weight="900" font-size="14" letter-spacing="0.9">RESCUEPRO®</text>'
         . '<text x="130" y="92" text-anchor="middle" fill="#181C22" font-family="Inter,Arial,sans-serif" font-weight="900" font-size="50" letter-spacing="1">F1RST</text>'
         . '<text x="130" y="116" text-anchor="middle" fill="#181C22" font-family="Inter,Arial,sans-serif" font-weight="800" font-size="17" letter-spacing="3.2">RESPONDER</text>'
         . '<rect x="24" y="126" width="60" height="14" rx="2" fill="#1D4ED8"/>'
         . '<text x="130" y="139" text-anchor="middle" fill="#181C22" font-family="Inter,Arial,sans-serif" font-weight="800" font-size="15" letter-spacing="2.5">BOWL</text>'
         . '<rect x="176" y="126" width="60" height="14" rx="2" fill="#DC2626"/>'
         . '</svg>';
}
