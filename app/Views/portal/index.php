<?php
$user = App\Core\Auth::user();
$stages = ['1. Ticket Logged', '2. Crew Dispatched', '3. Extraction / Containment', '4. Structural Drying', '5. QA Clearance', '6. Signed Off'];
?>
<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>Customer Restoration Portal</span>
    </nav>
    <h1>Welcome Back, <?= e($user['name'] ?? 'Property Owner') ?></h1>
    <p class="sp-lead">Track active 6-stage mitigation progress, inspect daily moisture dry logs, download Xactimate® claim paperwork, and manage Emergency Ready Profiles.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container">
    <!-- Customer Quick Overview Cards -->
    <div class="sp-kpi-row">
      <div class="sp-kpi-card">
        <div class="sp-kpi-val"><?= count($requests) ?></div>
        <div class="sp-kpi-lbl">My Property Tickets</div>
      </div>
      <div class="sp-kpi-card" style="border-left-color:#16A34A;">
        <div class="sp-kpi-val"><?= count($erpProfiles) ?></div>
        <div class="sp-kpi-lbl">Saved Ready Profiles (ERP)</div>
      </div>
      <div class="sp-kpi-card" style="border-left-color:#2563EB;">
        <div class="sp-kpi-val"><?= count($psychrometricLogs) ?> Logs</div>
        <div class="sp-kpi-lbl">Verified Moisture Readings</div>
      </div>
      <div class="sp-kpi-card" style="border-left-color:#0F172A;">
        <div class="sp-kpi-val">24/7</div>
        <div class="sp-kpi-lbl">Direct Dispatcher Hotline</div>
      </div>
    </div>

    <!-- 6-Tab Portal Workspace -->
    <div class="sp-tab-bar sp-mt-lg" role="tablist">
      <button type="button" class="sp-tab-btn" :class="{active: portalTab === 'tracker'}" @click="portalTab = 'tracker'">1. Project Status Tracker (<?= count($requests) ?>)</button>
      <button type="button" class="sp-tab-btn" :class="{active: portalTab === 'drying'}" @click="portalTab = 'drying'">2. Daily Moisture &amp; Dry Logs</button>
      <button type="button" class="sp-tab-btn" :class="{active: portalTab === 'claims'}" @click="portalTab = 'claims'">3. Insurance &amp; Xactimate®</button>
      <button type="button" class="sp-tab-btn" :class="{active: portalTab === 'erp'}" @click="portalTab = 'erp'">4. Emergency Ready Plans (ERP)</button>
      <button type="button" class="sp-tab-btn" :class="{active: portalTab === 'new_request'}" @click="portalTab = 'new_request'">5. Request New Dispatch</button>
      <button type="button" class="sp-tab-btn" :class="{active: portalTab === 'settings'}" @click="portalTab = 'settings'">6. Account &amp; Alerts</button>
    </div>

    <!-- TAB 1: LIVE 6-STAGE PROGRESS TRACKER -->
    <div v-show="portalTab === 'tracker'">
      <?php if (empty($requests)): ?>
      <div class="sp-card">
        <h3>No active restoration tickets found on your email</h3>
        <p class="sp-muted">Switch to the "Request New Dispatch" tab to open a ticket, or register a property Emergency Ready Profile.</p>
      </div>
      <?php else: foreach ($requests as $req):
        $st = $req['status'] ?? 'New';
        $stageIndex = match ($st) {
            'Dispatched' => 1,
            'On-Site Drying' => 3,
            'Completed' => 5,
            default => 0,
        };
      ?>
      <div class="sp-card sp-mt-md" style="border-left:5px solid <?= $st === 'Completed' ? '#16A34A' : '#FF5A00' ?>;">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:12px;">
          <div>
            <span class="sp-tag-inline"><?= e($req['ticket_code']) ?> &middot; <?= e($req['property_type']) ?></span>
            <h3 style="margin:6px 0 4px;"><?= e($req['service_type']) ?></h3>
            <div class="sp-muted"><?= e($req['address']) ?> &middot; Logged <?= e(substr((string)$req['created_at'], 0, 16)) ?></div>
          </div>
          <span class="sp-pill <?= $st === 'Completed' ? 'sp-pill-green' : 'sp-pill-orange' ?>"><?= e($st) ?></span>
        </div>

        <p style="margin:14px 0 10px;"><strong>Scope Summary:</strong> <?= e($req['details']) ?></p>
        <?php if (!empty($req['admin_notes'])): ?>
        <div style="background:#F0FDF4;border:1px solid #BBF7D0;padding:10px 14px;border-radius:7px;font-size:0.9rem;color:#14532D;">
          <strong>Crew Chief Field Note:</strong> <?= e($req['admin_notes']) ?>
        </div>
        <?php endif; ?>

        <!-- 6-Stage Visual Bar -->
        <div class="sp-stage-bar">
          <?php foreach ($stages as $idx => $label):
            $cls = $idx < $stageIndex ? 'done' : ($idx === $stageIndex ? 'current' : '');
          ?>
          <div class="sp-stage-step <?= $cls ?>"><?= e($label) ?></div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; endif; ?>
    </div>

    <!-- TAB 2: MOISTURE & DRYING LOGS -->
    <div v-show="portalTab === 'drying'" v-cloak>
      <div class="sp-card">
        <h2>Daily Room Psychrometric &amp; Wood Moisture Logs</h2>
        <p class="sp-muted">Transparent ANSI/IICRC S500 moisture readings shared directly with you and your insurance desk adjuster.</p>
        <div class="sp-table-wrap sp-mt-md">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Ticket</th>
                <th>Day &amp; Date</th>
                <th>Room / Assembly</th>
                <th>Psychrometrics</th>
                <th>Moisture Trend vs Dry Target</th>
                <th>Equipment &amp; Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($psychrometricLogs as $log):
                $mc = (float)$log['wood_mc'];
                $goal = (float)$log['dry_goal'];
                $pct = max(8, min(100, (int)round(($goal / max($mc, 1)) * 100)));
              ?>
              <tr>
                <td><strong><?= e($log['ticket_code']) ?></strong></td>
                <td><?= e($log['day']) ?> (<?= e($log['date']) ?>)</td>
                <td><strong><?= e($log['room']) ?></strong></td>
                <td><?= (int)$log['temp_f'] ?>&deg;F &middot; <?= (int)$log['rh_pct'] ?>% RH &middot; <?= (int)$log['gpp'] ?> GPP</td>
                <td style="min-width:170px;">
                  <div><strong><?= e((string)$mc) ?>% MC</strong> &rarr; Target <?= e((string)$goal) ?>%</div>
                  <div class="sp-mc-meter"><div class="sp-mc-fill" style="width:<?= $pct ?>%;"></div></div>
                </td>
                <td><div><?= e($log['equipment']) ?></div><span class="sp-pill sp-pill-blue"><?= e($log['status']) ?></span></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 3: INSURANCE & XACTIMATE -->
    <div v-show="portalTab === 'claims'" v-cloak>
      <div class="sp-card">
        <h2>Insurance Claim Files &amp; Xactimate® Documentation</h2>
        <div class="sp-table-wrap sp-mt-md">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Claim Number</th>
                <th>Ticket</th>
                <th>Carrier &amp; Adjuster</th>
                <th>Scope &amp; Invoice Status</th>
                <th>Audit Score</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($insuranceClaims as $cl): ?>
              <tr>
                <td><strong><?= e($cl['claim_number']) ?></strong></td>
                <td><?= e($cl['ticket_code']) ?></td>
                <td><?= e($cl['carrier']) ?> (Adj: <?= e($cl['adjuster']) ?>)</td>
                <td><?= e($cl['xactimate_status']) ?></td>
                <td><span class="sp-pill sp-pill-green"><?= e($cl['audit_score']) ?> &middot; <?= e($cl['status']) ?></span></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 4: EMERGENCY READY PLANS (ERP) -->
    <div v-show="portalTab === 'erp'" v-cloak>
      <div class="sp-grid-2">
        <div class="sp-card">
          <h3>My Saved Facility Profiles (<?= count($erpProfiles) ?>)</h3>
          <?php if (empty($erpProfiles)): ?>
            <p class="sp-muted">You haven’t mapped a property ERP shutoff profile yet.</p>
          <?php else: foreach ($erpProfiles as $erp): ?>
          <div style="background:var(--sp-bg-soft);border:1px solid var(--sp-border);border-radius:8px;padding:16px;margin-top:12px;">
            <span class="sp-tag-inline"><?= e($erp['facility_type']) ?></span>
            <h4 style="margin:6px 0 4px;"><?= e($erp['facility_name']) ?></h4>
            <div class="sp-muted"><?= e($erp['address']) ?></div>
            <div class="sp-mt-sm" style="font-size:0.86rem;">
              <div><strong>Water Shutoff:</strong> <?= e($erp['water_shutoff']) ?></div>
              <div><strong>Main Breaker:</strong> <?= e($erp['electric_panel']) ?></div>
              <div><strong>Gas Valve:</strong> <?= e($erp['gas_shutoff']) ?></div>
              <div><strong>Primary Contact:</strong> <?= e($erp['emergency_contact']) ?></div>
            </div>
          </div>
          <?php endforeach; endif; ?>
        </div>

        <div class="sp-card sp-card-accent">
          <h3>Register Another Home or Facility ERP (Free)</h3>
          <form action="<?= e(url('/erp-save')) ?>" method="POST" class="sp-form sp-mt-sm">
            <?= csrf_field() ?>
            <div class="sp-form-row">
              <label for="p_erp_name">Facility / Home Name *</label>
              <input id="p_erp_name" name="facility_name" type="text" required placeholder="Oakridge Medical Suite / Residence">
            </div>
            <div class="sp-form-row">
              <label for="p_erp_type">Building Classification</label>
              <select id="p_erp_type" name="facility_type">
                <option value="Residential">Residential Property</option>
                <option value="Commercial Office">Commercial Office / Retail</option>
                <option value="Healthcare Clinic">Healthcare / Medical Facility</option>
                <option value="Multi-Family">Hospitality / Multi-Family</option>
              </select>
            </div>
            <div class="sp-form-row">
              <label for="p_erp_addr">Street Address *</label>
              <input id="p_erp_addr" name="address" type="text" required placeholder="412 Maplewood Drive, Gallatin, TN 37066">
            </div>
            <div class="sp-form-row">
              <label for="p_erp_w">Main Water Shutoff Valve Location</label>
              <input id="p_erp_w" name="water_shutoff" type="text" placeholder="Basement north wall beside water heater">
            </div>
            <div class="sp-form-row">
              <label for="p_erp_e">Electrical Panel Location</label>
              <input id="p_erp_e" name="electric_panel" type="text" placeholder="Garage west wall 200A box">
            </div>
            <div class="sp-form-row">
              <label for="p_erp_g">Gas Meter / Sprinkler Riser Location</label>
              <input id="p_erp_g" name="gas_shutoff" type="text" placeholder="South exterior service meter">
            </div>
            <div class="sp-form-row">
              <label for="p_erp_c">Authorized After-Hours Decision Contact</label>
              <input id="p_erp_c" name="emergency_contact" type="text" value="<?= e(($user['name'] ?? '') . ' — ' . ($user['email'] ?? '')) ?>">
            </div>
            <button type="submit" class="sp-btn sp-btn-green sp-btn-block">Save ERP Profile</button>
          </form>
        </div>
      </div>
    </div>

    <!-- TAB 5: NEW DISPATCH REQUEST -->
    <div v-show="portalTab === 'new_request'" v-cloak>
      <div class="sp-card sp-card-accent" style="max-width:760px;">
        <h2>Trigger Priority Authenticated Crew Dispatch</h2>
        <form action="<?= e(url('/request')) ?>" method="POST" class="sp-form sp-mt-md">
          <?= csrf_field() ?>
          <div class="sp-grid-2" style="gap:12px;">
            <div class="sp-form-row">
              <label>Property Contact *</label>
              <input name="full_name" type="text" required value="<?= e($user['name'] ?? '') ?>">
            </div>
            <div class="sp-form-row">
              <label>Account Email *</label>
              <input name="email" type="email" required value="<?= e($user['email'] ?? '') ?>">
            </div>
          </div>
          <div class="sp-grid-2" style="gap:12px;">
            <div class="sp-form-row">
              <label>Mobile / Direct Phone *</label>
              <input name="phone" type="tel" required placeholder="(615) 555-0192">
            </div>
            <div class="sp-form-row">
              <label>Property ZIP Code *</label>
              <input name="zip_code" type="text" required value="37066">
            </div>
          </div>
          <div class="sp-grid-2" style="gap:12px;">
            <div class="sp-form-row">
              <label>Damage Category *</label>
              <select name="service_type">
                <option value="Water Damage Restoration">Water Damage Restoration</option>
                <option value="Fire & Smoke Restoration">Fire &amp; Smoke Restoration</option>
                <option value="Mold Remediation">Mold Remediation</option>
                <option value="Storm & Flood Damage">Storm &amp; Flood Damage</option>
                <option value="Commercial Large Loss">Commercial Large Loss</option>
              </select>
            </div>
            <div class="sp-form-row">
              <label>Contamination Class</label>
              <select name="water_category">
                <option value="Category 1 - Clean Water">Category 1 — Clean Water</option>
                <option value="Category 2 - Grey Water">Category 2 — Grey Water</option>
                <option value="Category 3 - Sewage/Flood">Category 3 — Blackwater</option>
                <option value="N/A">Other / Fire / Mold</option>
              </select>
            </div>
          </div>
          <div class="sp-form-row">
            <label>Affected Property Street Address *</label>
            <input name="address" type="text" required placeholder="Street address, suite or unit...">
          </div>
          <div class="sp-form-row">
            <label>Incident Details</label>
            <textarea name="details" rows="3" placeholder="Describe location of water/damage, square footage, or insurance carrier info..."></textarea>
          </div>
          <button type="submit" class="sp-btn sp-btn-orange">Dispatch Closest RescuePro® Crew</button>
        </form>
      </div>
    </div>

    <!-- TAB 6: ACCOUNT SETTINGS -->
    <div v-show="portalTab === 'settings'" v-cloak>
      <div class="sp-card" style="max-width:680px;">
        <h2>Account &amp; Emergency Alert Preferences</h2>
        <div class="sp-mt-md" style="display:grid;gap:12px;">
          <div class="sp-channel-row">
            <strong>Authenticated Account Identity</strong>
            <span><?= e($user['name'] ?? '') ?> &middot; <?= e($user['email'] ?? '') ?> (Role: <?= e($user['role'] ?? 'customer') ?>)</span>
          </div>
          <label style="display:flex;align-items:center;gap:10px;padding:12px;background:var(--sp-bg-soft);border-radius:8px;">
            <input type="checkbox" v-model="portalNotifyEmail">
            <span><strong>Daily Psychrometric Dry-Log Emails</strong> — Receive automatic email summaries when crews log new GPP / moisture readings.</span>
          </label>
          <label style="display:flex;align-items:center;gap:10px;padding:12px;background:var(--sp-bg-soft);border-radius:8px;">
            <input type="checkbox" v-model="portalNotifySms">
            <span><strong>Dispatch En-Route SMS</strong> — Alert my mobile number when crew chiefs depart for my address.</span>
          </label>
        </div>
      </div>
    </div>

  </div>
</section>
