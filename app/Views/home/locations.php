<!-- FIND A LOCAL RescuePro FRANCHISE DIRECTORY -->
<section class="sp-subhero">
  <div class="sp-container">
    <div class="sp-subhero-grid">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Over 2,410+ Locations Nationwide</span>
        <h1>Find a Local RescuePro&reg; Franchise Near You</h1>
        <p class="sp-subhero-lead">
          Each RescuePro&reg; franchise is independently owned and operated within your community—backed by our National Call Center and Large Loss storm task force 24 hours a day.
        </p>
        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <input type="text" class="sp-input" style="max-width:300px;" v-model="zipInput" @keyup.enter="lookupFranchise()" placeholder="Enter ZIP or city (e.g. 37066, Dallas)...">
          <button type="button" class="sp-chevron-btn" @click="lookupFranchise()">Find Location</button>
        </div>
      </div>

      <div class="sp-subhero-img-wrap">
        <div class="sp-subhero-dots" aria-hidden="true"></div>
        <img src="<?= sp_img('hero_van_techs_clean') ?>" alt="Local RescuePro Technicians and Emergency Van Fleet">
      </div>
    </div>
  </div>
</section>

<!-- FLOATING SELECTED LOCATION CARD -->
<div class="sp-floating-loc-wrap" v-if="activeFranchise">
  <div class="sp-container">
    <div class="sp-floating-loc-card">
      <div>
        <div class="sp-loc-eyebrow">Active Dispatch Territory &bull; {{ activeFranchise.badge }}</div>
        <h2>{{ activeFranchise.name }}</h2>
        <p>{{ activeFranchise.address }} &bull; ZIP {{ activeFranchise.zip }} &bull; Est. Arrival {{ activeFranchise.eta }} ({{ activeFranchise.radius }})</p>
      </div>
      <div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
        <a :href="'tel:' + activeFranchise.phone.replace(/\D/g, '')" class="sp-chevron-btn">Call {{ activeFranchise.phone }}</a>
      </div>
    </div>
  </div>
</div>

<!-- FRANCHISE GRID -->
<section class="sp-section" style="padding-top:18px;">
  <div class="sp-container">
    <div v-if="zipNotice" class="sp-alert sp-alert-success" style="margin-bottom:22px;">{{ zipNotice }}</div>

    <div class="sp-grid-3">
      <div v-for="fr in filteredFranchises" :key="fr.code" class="sp-card"
           :style="{ borderColor: activeFranchise && activeFranchise.code === fr.code ? 'var(--sp-orange)' : 'var(--sp-border)' }">
        <div class="sp-card-body">
          <span class="sp-badge sp-badge-orange" style="align-self:flex-start;">{{ fr.badge }}</span>
          <h3>{{ fr.name }}</h3>
          <p style="font-size:13.5px; line-height:1.65;">
            <strong>Territory Code:</strong> {{ fr.code }}<br>
            <strong>Address:</strong> {{ fr.address }} (ZIP {{ fr.zip }})<br>
            <strong>Avg. Dispatch ETA:</strong> {{ fr.eta }} &bull; {{ fr.radius }} radius<br>
            <strong>Customer Rating:</strong> &#9733; {{ fr.rating }} ({{ fr.reviews }} reviews)
          </p>
          <div style="display:flex; gap:10px; align-items:center; justify-content:space-between; flex-wrap:wrap;">
            <button type="button" class="sp-btn sp-btn-outline sp-btn-sm" @click="activeFranchise = fr">Set Active Location</button>
            <a :href="'tel:' + fr.phone.replace(/\D/g, '')" class="sp-read-more">{{ fr.phone }} <span>&rsaquo;</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
