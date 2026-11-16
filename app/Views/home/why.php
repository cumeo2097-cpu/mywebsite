<!-- WHY RescuePro: OUR HISTORY, PRESS RELEASES SHOWCASE & COMMUNITY V-CARDS (Video 15:06, 17:08, 17:39) -->
<section id="history" class="sp-subhero">
  <div class="sp-container">
    <div class="sp-subhero-grid">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Founded in 1967 &bull; Gallatin, Tennessee HQ</span>
        <h1>Our History &amp; Over 50 Years of Restoration Leadership</h1>
        <p class="sp-subhero-lead">
          What began when Ted and Doris Isaacson launched a painting business in Sacramento, California in 1967 has grown into North America’s premier cleanup, restoration, and construction network spanning over 2,410 locations.
        </p>
        <div style="display:flex; gap:14px; flex-wrap:wrap;">
          <a href="#press" class="sp-chevron-btn">Latest Press Releases</a>
          <a href="<?= e(url('/franchise-ownership')) ?>" class="sp-btn sp-btn-outline">Own a Franchise</a>
        </div>
      </div>

      <div class="sp-subhero-img-wrap">
        <div class="sp-subhero-dots" aria-hidden="true"></div>
        <img src="<?= sp_img('history_hq') ?>" alt="RescuePro Corporate Headquarters in Gallatin, Tennessee">
      </div>
    </div>
  </div>
</section>

<!-- #233546 OUR STORY MILESTONES -->
<section class="sp-slate-section">
  <div class="sp-container">
    <div style="padding:0 30px;">
      <span class="sp-badge sp-badge-orange">Trusted Since 1969 Franchising Launch</span>
      <h2 style="font-size:32px; font-weight:300; color:#fff; margin:10px 0 6px;">Our Story &amp; National Reach</h2>
      <p style="color:#CBD5E1; margin:0; font-size:15px;">Over half a century building IICRC training standards and 24/7 disaster readiness.</p>
    </div>

    <div class="sp-slate-cols">
      <div class="sp-slate-step">
        <div class="sp-slate-num">1967</div>
        <h3>Built on Entrepreneurial Grit</h3>
        <p>Founded by Ted and Doris Isaacson in Sacramento, California before launching our franchise model in 1969 to serve local neighborhoods directly.</p>
      </div>
      <div class="sp-slate-step">
        <div class="sp-slate-num">2,410+</div>
        <h3>Coast-to-Coast Franchise Coverage</h3>
        <p>Strategically positioned franchises across the U.S. and Canada plus National Storm Teams respond faster when catastrophes strike multiple states.</p>
      </div>
      <div class="sp-slate-step">
        <div class="sp-slate-num">24/7</div>
        <h3>RescuePro University Training HQ</h3>
        <p>Every franchise owner and crew completes real-world hands-on flood-house drying, smoke remediation, and large-loss protocols in Gallatin, TN.</p>
      </div>
    </div>
  </div>
</section>

<!-- #press: 2-COLUMN PRESS RELEASES SHOWCASE (Matches Video 17:08) -->
<section id="press" class="sp-section sp-section-alt">
  <div class="sp-container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:16px; margin-bottom:28px;">
      <div>
        <span class="sp-badge sp-badge-orange">Official Newsroom</span>
        <h2 style="font-size:32px; font-weight:400; color:#2B333C; margin:8px 0 0;">Press Releases</h2>
      </div>
      <a href="<?= e(url('/resources')) ?>" class="sp-chevron-btn">See All Articles</a>
    </div>

    <div class="sp-grid-2" style="gap:28px; align-items:start;">
      <!-- Left Column: 2 Elevated Featured Stories -->
      <div style="display:grid; gap:20px;">
        <?php foreach ($pressReleases['featured'] as $feat): ?>
          <div class="sp-form-card" style="border-left:4px solid var(--sp-orange);">
            <span class="sp-badge sp-badge-orange" style="margin-bottom:8px;">Featured Announcement</span>
            <h3 style="margin:0 0 8px; font-size:19px; color:#22262A; line-height:1.35;"><?= e($feat['title']) ?></h3>
            <p style="margin:0 0 10px; font-size:14px; color:var(--sp-muted);"><?= e($feat['summary']) ?></p>
            <div style="font-size:12.5px; font-weight:700; color:var(--sp-slate);"><?= e($feat['location']) ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Right Column: Stacked Headlines List -->
      <div class="sp-form-card">
        <h3 style="margin:0 0 14px; font-size:17px; color:#22262A; border-bottom:1px solid var(--sp-border); padding-bottom:10px;">Recent National Releases</h3>
        <div style="display:grid; gap:16px;">
          <?php foreach ($pressReleases['list'] as $pr): ?>
            <div style="padding-bottom:14px; border-bottom:1px solid #EEF1F4;">
              <strong style="display:block; color:var(--sp-orange); font-size:15.5px; margin-bottom:5px;"><?= e($pr['title']) ?></strong>
              <span style="font-size:13.5px; color:var(--sp-muted); line-height:1.55;"><?= e($pr['meta']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- #community: 3-COLUMN V-CHEVRON COMMUNITY CARDS (Matches Video 17:39) -->
<section id="community" class="sp-section">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-orange">In the Community</span>
      <h2>Supporting Families, First Responders &amp; Civic Events</h2>
      <p>Real stories showing how local RescuePro&reg; franchises and national sponsorship initiatives show up where communities need help most.</p>
    </div>

    <div class="sp-v-grid">
      <?php foreach ($communityStories as $story): ?>
        <article class="sp-v-card">
          <div class="sp-v-card-img-box">
            <img src="<?= $story['image'] ?>" alt="<?= e($story['title']) ?>">
          </div>
          <div class="sp-v-card-body">
            <h3><?= e($story['title']) ?></h3>
            <p class="sp-v-excerpt"><?= e($story['subtitle']) ?></p>
            <div class="sp-v-loc"><?= e($story['location']) ?></div>
            <a href="<?= e(url('/locations')) ?>" class="sp-read-more">Connect Locally <span>&rsaquo;</span></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
