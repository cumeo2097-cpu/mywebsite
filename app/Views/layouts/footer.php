  <!-- LOCATION PICKER MODAL -->
  <div class="sp-modal-backdrop" v-if="locationModalOpen" @click.self="locationModalOpen = false">
    <div class="sp-modal">
      <button type="button" class="sp-modal-close" @click="locationModalOpen = false" aria-label="Close"><i class="ph-bold ph-x"></i></button>
      <span class="sp-badge sp-badge-orange">24/7 Local Franchise Routing</span>
      <h3 style="margin:10px 0 8px; color:#22262A;">Select Your Local RescuePro® Location</h3>
      <p style="margin:0 0 14px; font-size:13.5px; color:var(--sp-muted);">Enter a ZIP code or city to connect with an independently owned and operated 24/7 emergency response crew.</p>
      <div style="display:flex; gap:10px; margin-bottom:14px;">
        <input type="text" class="sp-input" v-model="zipInput" placeholder="Search ZIP code, city, or state (e.g. 37066, Nashville, Dallas, Miami)...">
        <button type="button" class="sp-btn sp-btn-orange sp-btn-sm" @click="lookupFranchise()">Find</button>
      </div>
      <div v-if="zipNotice" class="sp-alert sp-alert-success" style="font-size:13px; padding:9px 12px;">{{ zipNotice }}</div>
      <div style="display:grid; gap:10px; max-height:320px; overflow-y:auto;">
        <div v-for="fr in filteredFranchises" :key="fr.code"
             @click="selectFranchiseModal(fr)"
             style="cursor:pointer; border:1px solid var(--sp-border); border-radius:6px; padding:13px 16px; display:flex; justify-content:space-between; align-items:center; gap:12px;"
             :style="{ borderColor: activeFranchise && activeFranchise.code === fr.code ? 'var(--sp-orange)' : 'var(--sp-border)', background: activeFranchise && activeFranchise.code === fr.code ? 'var(--sp-orange-soft)' : '#fff' }">
          <div>
            <span style="font-size:11px; font-weight:700; color:var(--sp-orange); text-transform:uppercase;">{{ fr.badge }}</span>
            <strong style="display:block; color:#22262A; font-size:15px;">{{ fr.name }}</strong>
            <span style="font-size:13px; color:var(--sp-muted);">{{ fr.address }} &bull; ZIP {{ fr.zip }} &bull; ETA {{ fr.eta }}</span>
          </div>
          <div style="text-align:right; white-space:nowrap;">
            <strong style="display:block; color:#22262A; font-size:14px;">{{ fr.phone }}</strong>
            <span style="font-size:12px; color:#F59E0B;">&#9733; {{ fr.rating }} ({{ fr.reviews }})</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ORANGE "ALSO OF INTEREST" BAR (Video 17:39 step_200_media_0.jpg) -->
  <div class="sp-also-orange-bar">
    <div class="sp-container sp-also-orange-inner">
      <span class="sp-also-label">Also of Interest:</span>
      <a href="<?= e(url('/services/construction')) ?>">Residential Construction Services</a>
      <a href="<?= e(url('/services/mold-remediation')) ?>">Mold Removal and Remediation</a>
      <a href="<?= e(url('/locations')) ?>">Find Your RescuePro</a>
    </div>
  </div>

  <!-- DARK CHARCOAL #262626 FOOTER (Video 17:39 & 4:09) -->
  <footer class="sp-footer">
    <div class="sp-container">
      <div class="sp-footer-grid">
        <div>
          <a href="<?= e(url('/')) ?>" style="display:inline-block; margin-bottom:14px;">
            <?= sp_roof_svg('RESCUEPRO', 'footer') ?>
          </a>
          <div style="color:#E5E7EB; line-height:1.7; font-size:13px;">
            <div><strong>RescuePro Industries, LLC</strong></div>
            <div>801 Industrial Blvd</div>
            <div>Gallatin, TN 37066</div>
            <div style="margin-top:6px;"><a href="tel:<?= e(EMERGENCY_PHONE_TEL) ?>" style="color:#FF5A00; font-weight:700;"><?= e(EMERGENCY_PHONE) ?></a></div>
          </div>

          <div class="sp-footer-social">
            <a href="<?= e(url('/why')) ?>" aria-label="Facebook"><i class="ph-bold ph-facebook-logo"></i></a>
            <a href="<?= e(url('/why')) ?>" aria-label="X"><i class="ph-bold ph-x-logo"></i></a>
            <a href="<?= e(url('/why')) ?>" aria-label="Instagram"><i class="ph-bold ph-instagram-logo"></i></a>
            <a href="<?= e(url('/why')) ?>" aria-label="YouTube"><i class="ph-bold ph-youtube-logo"></i></a>
            <a href="<?= e(url('/why')) ?>" aria-label="LinkedIn"><i class="ph-bold ph-linkedin-logo"></i></a>
          </div>

          <div style="background:#fff; display:inline-block; padding:8px 12px; border-radius:4px;">
            <img src="<?= sp_img('first_responder_bowl') ?>" alt="RescuePro First Responder Bowl" style="width:128px; height:auto;">
          </div>
        </div>

        <div>
          <h4>Services</h4>
          <ul>
            <li><a href="<?= e(url('/services/water-damage')) ?>">Water Damage</a></li>
            <li><a href="<?= e(url('/services/fire-damage')) ?>">Fire Damage</a></li>
            <li><a href="<?= e(url('/services/mold-remediation')) ?>">Mold Remediation</a></li>
            <li><a href="<?= e(url('/services/storm-damage')) ?>">Storm &amp; Disaster</a></li>
            <li><a href="<?= e(url('/services/construction')) ?>">Construction Services</a></li>
            <li><a href="<?= e(url('/commercial')) ?>">Commercial Large Loss</a></li>
            <li><a href="<?= e(url('/commercial/erp')) ?>">Emergency Ready Plan</a></li>
          </ul>
        </div>

        <div>
          <h4>Cleaning</h4>
          <ul>
            <li><a href="<?= e(url('/service/cleaning')) ?>">Air Ducts &amp; HVAC</a></li>
            <li><a href="<?= e(url('/service/cleaning')) ?>">Carpet &amp; Upholstery</a></li>
            <li><a href="<?= e(url('/services/biohazard-cleaning')) ?>">Biohazard &amp; Trauma</a></li>
            <li><a href="<?= e(url('/services/biohazard-cleaning')) ?>">Hoarding Remediation</a></li>
            <li><a href="<?= e(url('/services/specialty-cleaning')) ?>">Contents Pack-Out</a></li>
            <li><a href="<?= e(url('/services/specialty-cleaning')) ?>">Document Restoration</a></li>
          </ul>
        </div>

        <div>
          <h4>About</h4>
          <ul>
            <li><a href="<?= e(url('/why')) ?>">Why RescuePro?</a></li>
            <li><a href="<?= e(url('/why#history')) ?>">Our History</a></li>
            <li><a href="<?= e(url('/why#press')) ?>">Press Releases</a></li>
            <li><a href="<?= e(url('/why#community')) ?>">In the Community</a></li>
            <li><a href="<?= e(url('/insurance')) ?>">Insurance Professionals</a></li>
            <li><a href="<?= e(url('/franchise-ownership')) ?>">Own a Franchise</a></li>
          </ul>
        </div>

        <div>
          <h4>Resources &amp; Careers</h4>
          <ul>
            <li><a href="<?= e(url('/resources')) ?>">Resources Home</a></li>
            <li><a href="<?= e(url('/resources?tab=faq')) ?>">Frequently Asked Questions</a></li>
            <li><a href="<?= e(url('/resources?tab=glossary')) ?>">Restoration Glossary</a></li>
            <li><a href="<?= e(url('/locations')) ?>">Find Your RescuePro</a></li>
          <li><a href="<?= e(url('/faq')) ?>">32-Question FAQ</a></li>
          <li><a href="<?= e(url('/about/preferred-vendor')) ?>">Carrier Preferred Vendor</a></li>
          <li><a href="<?= e(url('/contact')) ?>">Contact 24/7 Dispatch</a></li>
            <li><a href="<?= e(url('/careers')) ?>">Careers Home</a></li>
            <li><a href="<?= e(url('/careers/headquarters')) ?>">Headquarters Careers</a></li>
            <li><a href="<?= e(url('/portal')) ?>">Customer Account Portal</a></li>
          </ul>
        </div>
      </div>

      <div class="sp-footer-disclaimers">
        <div style="display:flex; flex-wrap:wrap; gap:18px; margin-bottom:14px; font-size:12.5px;">
          <a href="<?= e(url('/terms-of-service')) ?>" style="color:#E5E7EB; text-decoration:underline;">Terms of Service</a>
          <a href="<?= e(url('/privacy-policy')) ?>" style="color:#E5E7EB; text-decoration:underline;">Privacy Policy</a>
          <a href="<?= e(url('/accessibility')) ?>" style="color:#E5E7EB; text-decoration:underline;">Accessibility Statement</a>
          <a href="<?= e(url('/sitemap')) ?>" style="color:#E5E7EB; text-decoration:underline;">Site Map</a>
          <a href="<?= e(url('/faq')) ?>" style="color:#E5E7EB; text-decoration:underline;">32-Question FAQ</a>
          <a href="<?= e(url('/contact')) ?>" style="color:#E5E7EB; text-decoration:underline;">24/7 Dispatch Center</a>
        </div>
        <p style="margin:0 0 8px;">
          ©RescuePro Intellectual Property, Inc. ©RescuePro Industries, LLC All Rights Reserved. Each RescuePro Franchise is Independently Owned and Operated.
        </p>
        <p style="margin:0 0 8px;">
          *#1 Choice in cleanup &amp; restoration based on Commercial and Residential Attitude &amp; Usage Tracking studies. Polling 808 commercial business decision-makers and 1,046 homeowner decision-makers on first choice for future needs related to cleanup &amp; restoration work.
        </p>
        <p style="margin:0 0 8px;">
          <strong>Mold Services:</strong> Disclaimer: Please note that available mold-related services vary by specific State and RescuePro franchise. State and local laws may require a mold remediation license and mold assessments to be performed by a third party. Kindly check with your local RescuePro franchise as to what mold-related services they provide.
        </p>
        <p style="margin:0;">
          <strong>Sanitizing &amp; Disinfecting Services:</strong> Disclaimer: Please note that available Sanitizing, Disinfecting, and Biohazard Cleanup Services vary by Specific State and independently owned and operated RescuePro franchise. State and local laws may require a RescuePro franchise to have and maintain certain approvals/licenses to perform these services.
        </p>
      </div>
    </div>
  </footer>

</div><!-- /#app -->

<?php require __DIR__ . '/scripts.php'; ?>
</body>
</html>

<?php
