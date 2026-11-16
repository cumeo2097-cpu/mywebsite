<?php
declare(strict_types=1);
/** @var string $title */
?>
<section class="sp-page-hero">
  <div class="sp-container">
    <nav class="sp-breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a><span>/</span><span>Account Sign In</span>
    </nav>
    <h1>Sign In to <?= e(APP_NAME) ?>® Command &amp; Client Portal</h1>
    <p class="sp-lead">Access real-time structural drying logs, insurance documentation, Emergency Ready Plan (ERP) facility profiles, and 24/7 dispatch controls.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container sp-grid-2" style="align-items:start;">
    <div class="sp-card sp-card-accent">
      <h2>Portal Account Sign In</h2>
      <p class="sp-muted">Enter your registered email and password below, or load a pre-configured demonstration profile to inspect the Customer Portal or Operations Console.</p>

      <form action="<?= e(url('/login')) ?>" method="POST" class="sp-form sp-mt-md" id="rescuepro-login-form">
        <?= csrf_field() ?>
        <div class="sp-form-row">
          <label for="login_email">Email Address *</label>
          <input id="login_email" name="email" type="email" required autocomplete="email" value="<?= old('email') ?>" placeholder="name@company.com">
        </div>

        <div class="sp-form-row">
          <label for="login_password">Password *</label>
          <input id="login_password" name="password" type="password" required autocomplete="current-password" placeholder="Enter your password">
        </div>

        <button type="submit" class="sp-chevron-btn sp-btn-block" style="justify-content:center;border:none;cursor:pointer;">
          Sign In to Portal <span class="sp-chev-arrow">&rarr;</span>
        </button>
      </form>

      <div class="sp-mt-md" style="padding:16px;background:var(--sp-bg-soft);border:1px solid var(--sp-border);border-radius:8px;">
        <strong style="display:block;margin-bottom:8px;font-size:0.9rem;">Quick-Fill Verified Portal Accounts:</strong>
        <div class="sp-btn-row">
          <button type="button" class="sp-btn sp-btn-green" style="padding:8px 14px;font-size:0.84rem;" onclick="document.getElementById('login_email').value='customer@rescuepro.test';document.getElementById('login_password').value='Customer123!';">
            Fill Property Owner Account
          </button>
          <button type="button" class="sp-btn sp-btn-outline" style="padding:8px 14px;font-size:0.84rem;" onclick="document.getElementById('login_email').value='admin@rescuepro.test';document.getElementById('login_password').value='Admin123!';">
            Fill Dispatch Operations Admin
          </button>
        </div>
        <div class="sp-muted sp-mt-xs" style="font-size:0.82rem;">
          Customer: <code>customer@rescuepro.test</code> / <code>Customer123!</code> &bull;
          Operations Admin: <code>admin@rescuepro.test</code> / <code>Admin123!</code>
        </div>
      </div>

      <p class="sp-muted sp-mt-md" style="margin-bottom:0;">
        New homeowner or commercial facility manager?
        <a href="<?= e(url('/register')) ?>" style="font-weight:700;">Create a Customer Portal Account &rarr;</a>
      </p>
    </div>

    <div style="display:grid;gap:20px;">
      <div class="sp-card">
        <h3>What Your Portal Unlocks</h3>
        <ul class="sp-check-list sp-mt-sm">
          <li><strong>6-Stage Live Restoration Progress Bar:</strong> Track intake, stabilization, extraction, active drying, clearance testing, and reconstruction handoff.</li>
          <li><strong>Room-by-Room Psychrometric Logs:</strong> Inspect daily GPP, relative humidity, and wood moisture content (%) readings verified against <?= e('ANSI/IICRC S500') ?> goals.</li>
          <li><strong>Xactimate® Carrier Claim Synchronization:</strong> View adjuster assignment, photo verification upload status, and deductible milestones.</li>
          <li><strong>Commercial ERP Profiles:</strong> Download pre-mapped shutoff valve schematics and priority disaster response agreements.</li>
        </ul>
      </div>

      <div class="sp-card" style="background:linear-gradient(145deg, var(--sp-green), #072F1C);color:#FFFFFF;">
        <h3 style="color:#FFFFFF;">Facing an Active Emergency Right Now?</h3>
        <p style="color:#D1FAE5;">You do not need an account to request immediate crew dispatch. Submit an unauthenticated emergency ticket or call our 24/7 dispatch line.</p>
        <div class="sp-btn-row">
          <a href="<?= e(url('/#request')) ?>" class="sp-btn sp-btn-orange">Submit 24/7 Dispatch Ticket</a>
          <a href="tel:+18005550199" class="sp-btn sp-btn-outline-light">Call <?= e(HOTLINE_PHONE) ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
