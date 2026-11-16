<!-- RescuePro EMERGENCY READY PLAN (ERP) INTERACTIVE BUILDER -->
<section class="sp-subhero">
  <div class="sp-container">
    <div class="sp-subhero-grid">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Zero-Cost Business Preparedness</span>
        <h1>RescuePro&reg; Emergency Ready Plan (ERP)</h1>
        <p class="sp-subhero-lead">
          Up to 50% of businesses never recover following a catastrophic property event simply because response teams lack valve locations, electrical panel maps, and immediate dispatch contacts. Build your free mobile ERP below.
        </p>
        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <button type="button" class="sp-chip" :class="{ active: erpForm.facility_type === 'Healthcare Facility' }" @click="applyErpPreset('medical')">Load Medical Preset</button>
          <button type="button" class="sp-chip" :class="{ active: erpForm.facility_type === 'Hospitality / Hotel' }" @click="applyErpPreset('hotel')">Load Hotel Preset</button>
          <button type="button" class="sp-chip" :class="{ active: erpForm.facility_type === 'Education / Campus' }" @click="applyErpPreset('school')">Load Campus Preset</button>
        </div>
      </div>

      <div class="sp-subhero-img-wrap">
        <div class="sp-subhero-dots" aria-hidden="true"></div>
        <img src="<?= sp_img('packout_warehouse') ?>" alt="RescuePro Commercial Emergency Preparedness & Vault Storage">
      </div>
    </div>
  </div>
</section>

<section class="sp-section sp-section-alt">
  <div class="sp-container">
    <div class="sp-grid-2" style="gap:40px; align-items:start;">
      <!-- LEFT: PERSISTENT MYSQL ERP FORM -->
      <div class="sp-form-card">
        <span class="sp-badge sp-badge-green">Real-Time Facility Sync</span>
        <h2 style="margin:10px 0 6px; font-size:24px; color:#22262A;">Configure Your Emergency Ready Profile</h2>
        <p style="margin:0 0 18px; font-size:13.5px; color:var(--sp-muted);">Edits update your mobile response card live on the right and save directly to your RescuePro portal record.</p>

        <form method="POST" action="<?= e(url('/erp-save')) ?>">
          <?= csrf_field() ?>
          <div class="sp-form-group">
            <label class="sp-label">Facility Name *</label>
            <input type="text" name="facility_name" class="sp-input" v-model="erpForm.facility_name" required>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Facility Sector</label>
            <select name="facility_type" class="sp-select" v-model="erpForm.facility_type">
              <option value="Healthcare Facility">Healthcare Facility</option>
              <option value="Hospitality / Hotel">Hospitality / Hotel</option>
              <option value="Education / Campus">Education / Campus</option>
              <option value="Commercial Office">Commercial Office</option>
              <option value="Industrial / Manufacturing">Industrial / Manufacturing</option>
            </select>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Facility Street Address *</label>
            <input type="text" name="address" class="sp-input" v-model="erpForm.address" required>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Primary Water Main Shut-Off Location *</label>
            <input type="text" name="water_shutoff" class="sp-input" v-model="erpForm.water_shutoff" required>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Main Electrical Panel &amp; Breaker Room *</label>
            <input type="text" name="electric_panel" class="sp-input" v-model="erpForm.electric_panel" required>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Natural Gas Shut-Off Valve *</label>
            <input type="text" name="gas_shutoff" class="sp-input" v-model="erpForm.gas_shutoff" required>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">24/7 Priority Decision-Maker Contact *</label>
            <input type="text" name="emergency_contact" class="sp-input" v-model="erpForm.emergency_contact" required>
          </div>

          <button type="submit" class="sp-chevron-btn sp-chevron-lg" style="width:100%; justify-content:center;">
            Save Facility Emergency Plan
          </button>
        </form>
      </div>

      <!-- RIGHT: LIVE VUE MOBILE PHONE ERP SIMULATOR -->
      <div>
        <div class="sp-phone-frame">
          <div class="sp-phone-screen">
            <div class="sp-phone-topbar">
              <span>RescuePro&reg; READY PLAN</span>
              <span>24/7 PRIORITY</span>
            </div>
            <div class="sp-phone-content">
              <div style="margin-bottom:12px;">
                <span class="sp-badge sp-badge-orange" style="font-size:10px;">{{ erpForm.facility_type }}</span>
                <h3 style="margin:6px 0 2px; font-size:17px; color:#22262A;">{{ erpForm.facility_name }}</h3>
                <div style="font-size:12px; color:var(--sp-muted);">{{ erpForm.address }}</div>
              </div>

              <div class="sp-phone-row">
                <small>Main Water Shut-Off Valve</small>
                <strong>{{ erpForm.water_shutoff }}</strong>
              </div>
              <div class="sp-phone-row">
                <small>Main Electrical Disconnect</small>
                <strong>{{ erpForm.electric_panel }}</strong>
              </div>
              <div class="sp-phone-row">
                <small>Natural Gas Meter Shut-Off</small>
                <strong>{{ erpForm.gas_shutoff }}</strong>
              </div>
              <div class="sp-phone-row" style="border-left:3px solid var(--sp-orange);">
                <small>Authorized Work-Order Contact</small>
                <strong>{{ erpForm.emergency_contact }}</strong>
              </div>

              <a href="tel:<?= e(COMMERCIAL_PHONE_TEL) ?>" class="sp-chevron-btn" style="width:100%; justify-content:center; margin-top:8px;">
                Call <?= e(COMMERCIAL_PHONE) ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
