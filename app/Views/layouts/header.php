<?php
use App\Core\Auth;
$currentUser = Auth::user();
$flashSuccess = flash('success');
$flashError = flash('error');
$uriNow = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$headerCallLabel = str_contains($uriNow, 'franchise') ? 'Franchise Sales Team' : 'National Call Center';
$headerCallPhone = str_contains($uriNow, 'franchise') ? FRANCHISE_PHONE : (str_contains($uriNow, 'commercial') ? COMMERCIAL_PHONE : EMERGENCY_PHONE);
$headerCallTel   = str_contains($uriNow, 'franchise') ? FRANCHISE_PHONE_TEL : (str_contains($uriNow, 'commercial') ? COMMERCIAL_PHONE_TEL : EMERGENCY_PHONE_TEL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($title ?? 'Commercial & Residential Restoration Services | RescuePro') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <?php require __DIR__ . '/styles.php'; ?>
</head>
<body>
<div id="app" v-cloak>

  <!-- TOP ORANGE UTILITY BAR (Video 0:00, step_4, step_10) -->
  <div class="sp-utility-bar">
    <div class="sp-container sp-utility-inner">
      <div class="sp-util-item">
        <a href="<?= e(url('/why')) ?>" class="sp-util-link">
          Why RescuePro? <i class="ph-bold ph-caret-down" style="font-size:11px;"></i>
        </a>
        <div class="sp-util-dropdown">
          <a href="<?= e(url('/why')) ?>">About RescuePro</a>
          <a href="<?= e(url('/why#history')) ?>">Our History</a>
          <a href="<?= e(url('/insurance')) ?>">Insurance Professionals</a>
          <a href="<?= e(url('/why#press')) ?>">Press Releases</a>
          <a href="<?= e(url('/why#community')) ?>">In the Community</a>
            <a href="<?= e(url('/about/preferred-vendor')) ?>">Preferred Vendor Program</a>
            <a href="<?= e(url('/contact')) ?>">Contact Support</a>
        </div>
      </div>

      <div class="sp-util-item">
        <a href="<?= e(url('/careers')) ?>" class="sp-util-link">
          Careers <i class="ph-bold ph-caret-down" style="font-size:11px;"></i>
        </a>
        <div class="sp-util-dropdown">
          <a href="<?= e(url('/careers')) ?>">Careers Home</a>
          <a href="<?= e(url('/careers/headquarters')) ?>">Headquarters Careers</a>
          <a href="<?= e(url('/careers?track=franchise#openings')) ?>">Local Franchise Careers</a>
        </div>
      </div>

      <div class="sp-util-item">
        <a href="<?= e(url('/franchise-ownership')) ?>" class="sp-util-link">Own a Franchise</a>
      </div>

      <div class="sp-util-item">
        <button type="button" class="sp-util-link" @click="openSearchModal()">
          <i class="ph-bold ph-magnifying-glass"></i> Search
        </button>
      </div>
    </div>
  </div>

  <!-- MAIN WHITE HEADER + 3-COLUMN HOVER MEGA MENUS (Video 2:07, 2:49, 4:09) -->
  <header class="sp-header" @mouseleave="activeMenu = null">
    <div class="sp-container sp-header-inner">
      <a href="<?= e(url('/')) ?>" class="sp-brand-lockup" aria-label="RescuePro Home">
        <?= sp_roof_svg('RESCUEPRO') ?>
      </a>

      <nav class="sp-nav" aria-label="Primary Navigation">
        <div class="sp-nav-item" @mouseenter="openMega('residential')">
          <button type="button" class="sp-nav-trigger" :class="{ active: activeMenu === 'residential' }" @click="toggleMenu('residential')">
            Residential <i class="ph-bold ph-caret-down" style="font-size:11px;"></i>
          </button>
        </div>
        <div class="sp-nav-item" @mouseenter="openMega('commercial')">
          <button type="button" class="sp-nav-trigger" :class="{ active: activeMenu === 'commercial' }" @click="toggleMenu('commercial')">
            Commercial <i class="ph-bold ph-caret-down" style="font-size:11px;"></i>
          </button>
        </div>
        <div class="sp-nav-item" @mouseenter="openMega('resources')">
          <button type="button" class="sp-nav-trigger" :class="{ active: activeMenu === 'resources' }" @click="toggleMenu('resources')">
            Resources <i class="ph-bold ph-caret-down" style="font-size:11px;"></i>
          </button>
        </div>
        <div class="sp-nav-item" @mouseenter="activeMenu = null">
          <a href="<?= e(url('/locations')) ?>" class="sp-nav-trigger <?= is_active_path('/locations') ? 'active' : '' ?>">
            Find a Location
          </a>
        </div>
      </nav>

      <div class="sp-header-call-area">
        <div class="sp-header-call-top">Call Today - 24/7 Emergency Services</div>
        <div class="sp-header-call-row">
          <?php if ($currentUser): ?>
            <a href="<?= e(url($currentUser['role'] === 'admin' ? '/admin' : '/portal')) ?>" class="sp-portal-pill">
              <i class="ph-bold ph-user-circle"></i> <?= $currentUser['role'] === 'admin' ? 'Dispatch Console' : 'My Account' ?>
            </a>
          <?php else: ?>
            <a href="<?= e(url('/login')) ?>" class="sp-portal-pill">Account Sign In</a>
          <?php endif; ?>

          <div class="sp-header-phone-block">
            <small><?= e($headerCallLabel) ?></small>
            <a href="tel:<?= e($headerCallTel) ?>"><?= e($headerCallPhone) ?></a>
          </div>

          <button type="button" class="sp-mobile-toggle" @click="mobileNavOpen = !mobileNavOpen" aria-label="Menu">
            <i class="ph-bold" :class="mobileNavOpen ? 'ph-x' : 'ph-list'"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- FLOATING 3-COLUMN INTERACTIVE HOVER MEGA MENU (Matches step_147_media_0.jpg, step_229_media_0.jpg, step_233_media_0.jpg) -->
    <div class="sp-mega-wrap" v-if="activeMenu && currentMegaList.length > 0">
      <div class="sp-mega-3col">
        <!-- Column 1: Hover Categories -->
        <div class="sp-mega-left">
          <a v-for="(cat, idx) in currentMegaList"
             :key="cat.key"
             :href="baseHref(cat.url)"
             class="sp-mega-cat-item"
             :class="{ active: activeMegaCatIdx === idx }"
             @mouseenter="activeMegaCatIdx = idx">
            <span class="sp-cat-label">
              <i class="ph-bold" :class="iconClassFor(cat.icon)" style="font-size:17px;"></i>
              <span>{{ cat.label }}</span>
            </span>
            <span class="sp-cat-arrow">›</span>
          </a>
        </div>

        <!-- Column 2: Dynamic Heading, Description & Bordered Roof-Icon Links -->
        <div class="sp-mega-mid" v-if="currentMegaCat">
          <a :href="baseHref(currentMegaCat.url)" class="sp-mega-mid-title">
            {{ currentMegaCat.title }} <span style="font-size:20px;">›</span>
          </a>
          <p class="sp-mega-mid-desc">{{ currentMegaCat.desc }}</p>
          <div class="sp-mega-subbox">
            <a v-for="lnk in currentMegaCat.links" :key="lnk.label" :href="baseHref(lnk.url)" class="sp-mega-sublink">
              <?= sp_roof_svg('RESCUEPRO', 'mini', true) ?>
              <span>{{ lnk.label }}</span>
            </a>
          </div>
        </div>

        <!-- Column 3: Dynamic High-Res Category Photo -->
        <div class="sp-mega-right" v-if="currentMegaCat">
          <div class="sp-mega-photo-frame">
            <img :src="currentMegaCat.image" :alt="currentMegaCat.title">
          </div>
        </div>
      </div>
    </div>

    <!-- MOBILE DRAWER MENU -->
    <div v-if="mobileNavOpen" style="background:#fff; border-top:1px solid var(--sp-border); padding:16px 24px;">
      <div style="display:grid; gap:10px; font-size:14.5px; font-weight:600;">
        <a href="<?= e(url('/services/water-damage')) ?>">Water Damage Restoration</a>
        <a href="<?= e(url('/services/fire-damage')) ?>">Fire &amp; Smoke Damage</a>
        <a href="<?= e(url('/services/mold-remediation')) ?>">Mold Remediation</a>
        <a href="<?= e(url('/services/storm-damage')) ?>">Storm &amp; Disaster Recovery</a>
        <a href="<?= e(url('/services/construction')) ?>">Construction Services</a>
        <a href="<?= e(url('/services/biohazard-cleaning')) ?>">Biohazard Cleaning</a>
        <a href="<?= e(url('/commercial')) ?>">Commercial Large Loss</a>
        <a href="<?= e(url('/commercial/erp')) ?>">Emergency Ready Plan (ERP)</a>
        <a href="<?= e(url('/resources')) ?>">Resources, FAQ &amp; Glossary</a>
        <a href="<?= e(url('/locations')) ?>">Find a Location</a>
        <a href="<?= e(url('/careers')) ?>">Careers</a>
        <a href="<?= e(url('/franchise-ownership')) ?>">Own a Franchise</a>
      </div>
    </div>
  </header>

  <!-- GLOBAL SITE SEARCH MODAL -->
  <div class="sp-modal-backdrop" v-if="searchModalOpen" @click.self="searchModalOpen = false">
    <div class="sp-modal">
      <button type="button" class="sp-modal-close" @click="searchModalOpen = false"><i class="ph-bold ph-x"></i></button>
      <span class="sp-badge sp-badge-orange">Search RescuePro</span>
      <h3 style="margin:10px 0 12px; color:#22262A;">Search Services, Guides, Glossary Terms &amp; Locations</h3>
      <input type="text" class="sp-input" v-model="globalSearchQuery" placeholder="Type e.g. 'water', 'mold', 'hoarding', 'roof leak', 'Gallatin'..." autofocus>
      <div style="margin-top:16px; display:grid; gap:10px;">
        <div v-if="globalSearchResults.length === 0" style="color:var(--sp-muted); font-size:14px;">No matching topics found. Try "water", "fire", "mold", "construction", or "ERP".</div>
        <a v-for="item in globalSearchResults" :key="item.key" :href="item.href" @click="searchModalOpen = false"
           style="display:flex; justify-content:space-between; align-items:center; padding:12px 14px; border:1px solid var(--sp-border); border-radius:4px;">
          <div>
            <span style="font-size:11px; font-weight:700; color:var(--sp-orange); text-transform:uppercase;">{{ item.kind }}</span>
            <strong style="display:block; color:#22262A; font-size:14.5px;">{{ item.title }}</strong>
            <span style="font-size:12.5px; color:var(--sp-muted);">{{ item.subtitle }}</span>
          </div>
          <i class="ph-bold ph-arrow-right" style="color:var(--sp-orange);"></i>
        </a>
      </div>
    </div>
  </div>

  <?php if ($flashSuccess || $flashError): ?>
    <div class="sp-flash-wrap" v-pre>
      <?php if ($flashSuccess): ?>
        <div class="sp-alert sp-alert-success"><i class="ph-bold ph-check-circle"></i> <?= e($flashSuccess) ?></div>
      <?php endif; ?>
      <?php if ($flashError): ?>
        <div class="sp-alert sp-alert-error"><i class="ph-bold ph-warning-circle"></i> <?= e($flashError) ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

<?php
