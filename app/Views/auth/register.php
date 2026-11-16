<?php
declare(strict_types=1);
/** @var string $title */
?>
<section class="sp-page-hero">
  <div class="sp-container">
    <nav class="sp-breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a><span>/</span><span>Create Portal Account</span>
    </nav>
    <h1>Create Your <?= e(APP_NAME) ?>® Customer &amp; ERP Portal Account</h1>
    <p class="sp-lead">Register in seconds to monitor active mitigation jobs, download psychrometric drying certificates, or pre-build Commercial Emergency Ready Plans.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container sp-grid-2" style="align-items:start;">
    <div class="sp-card sp-card-accent">
      <h2>Account Registration</h2>
      <p class="sp-muted">Use the same email address entered on your dispatch ticket to link active restoration projects automatically.</p>

      <form action="<?= e(url('/register')) ?>" method="POST" class="sp-form sp-mt-md">
        <?= csrf_field() ?>
        <div class="sp-form-row">
          <label for="reg_name">Full Name or Facility Manager *</label>
          <input id="reg_name" name="name" type="text" required minlength="2" autocomplete="name" value="<?= old('name') ?>" placeholder="Jordan Mercer">
        </div>

        <div class="sp-form-row">
          <label for="reg_email">Work or Personal Email *</label>
          <input id="reg_email" name="email" type="email" required autocomplete="email" value="<?= old('email') ?>" placeholder="jordan@propertygroup.com">
        </div>

        <div class="sp-grid-2" style="gap:12px;">
          <div class="sp-form-row">
            <label for="reg_password">Password (min 8 chars) *</label>
            <input id="reg_password" name="password" type="password" required minlength="8" autocomplete="new-password" placeholder="At least 8 characters">
          </div>
          <div class="sp-form-row">
            <label for="reg_password_confirm">Confirm Password *</label>
            <input id="reg_password_confirm" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password" placeholder="Repeat password">
          </div>
        </div>

        <button type="submit" class="sp-chevron-btn sp-btn-block" style="justify-content:center;border:none;cursor:pointer;">
          Create Account &amp; Open Portal <span class="sp-chev-arrow">&rarr;</span>
        </button>
      </form>

      <p class="sp-muted sp-mt-md" style="margin-bottom:0;">
        Already registered with <?= e(APP_NAME) ?>®?
        <a href="<?= e(url('/login')) ?>" style="font-weight:700;">Sign In to Existing Account &rarr;</a>
      </p>
    </div>

    <div style="display:grid;gap:20px;">
      <div class="sp-card">
        <h3>Why Register Before a Loss Occurs?</h3>
        <ul class="sp-check-list sp-mt-sm">
          <li><strong>No-Cost Facility Pre-Planning:</strong> Store main water shutoffs, electrical panels, riser rooms, and insurance broker contacts securely.</li>
          <li><strong>Real-Time Crew ETA &amp; Job Notes:</strong> Receive transparent updates from arrival through post-remediation clearance.</li>
          <li><strong>Direct Carrier Compliance Packet:</strong> Export time-stamped thermal scans, daily dehumidifier psychrometric records, and line-item Xactimate® scopes.</li>
          <li><strong>Encrypted Account Controls:</strong> Protected with bcrypt credential hashing and server-validated CSRF session tokens.</li>
        </ul>
      </div>

      <div class="sp-card sp-card-do">
        <h3>Need Immediate Property Stabilization?</h3>
        <p class="sp-muted">Our Gallatin Operations Command Center dispatches crews 24 hours a day across more than 2,410 franchised hubs.</p>
        <div class="sp-btn-row">
          <a href="<?= e(url('/#request')) ?>" class="sp-btn sp-btn-green">Request 24/7 Emergency Crew</a>
          <a href="<?= e(url('/commercial/erp')) ?>" class="sp-btn sp-btn-outline">Explore Commercial ERP</a>
        </div>
      </div>
    </div>
  </div>
</section>
