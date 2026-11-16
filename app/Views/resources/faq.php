<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <a href="<?= e(url('/resources')) ?>">Resources</a> <span>/</span> <span>FAQ</span>
    </nav>
    <h1>Frequently Asked Questions — Water, Fire, Mold &amp; Claims</h1>
    <p class="sp-lead">Direct answers grounded in ANSI/IICRC S500, S520, and S700 restoration engineering standards, insurance claim workflows, and 24/7 dispatch SLAs.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container">
    <div class="sp-faq-controls sp-card">
      <div class="sp-faq-search-row">
        <input type="text" v-model="faqQuery" class="sp-input" placeholder="Search 32+ questions (e.g., Category 3, Xactimate, hardwood cupping, negative air, ERP)..." aria-label="Search FAQs">
        <button type="button" class="sp-btn sp-btn-outline" @click="expandAllFaqs()">Expand All</button>
        <button type="button" class="sp-btn sp-btn-outline" @click="collapseAllFaqs()">Collapse All</button>
      </div>
      <div class="sp-chip-row sp-mt-sm">
        <button type="button" class="sp-chip" :class="{active: activeFaqCat === 'All'}" @click="activeFaqCat = 'All'">All Topics ({{ globalFaqs.length }})</button>
        <button type="button" class="sp-chip" v-for="cat in faqCategories" :key="cat" :class="{active: activeFaqCat === cat}" @click="activeFaqCat = cat">{{ cat }}</button>
      </div>
    </div>

    <div class="sp-faq-layout sp-mt-lg">
      <div class="sp-faq-main">
        <div v-if="filteredGlobalFaqs.length === 0" class="sp-card">
          <h3>No matching questions found</h3>
          <p class="sp-muted">Try clearing your keyword filter or <a href="<?= e(url('/contact')) ?>">ask our 24/7 National Dispatch Support Desk directly</a>.</p>
        </div>

        <div class="sp-accordion-list">
          <div class="sp-acc-item" v-for="(item, idx) in filteredGlobalFaqs" :key="item.q">
            <button type="button" class="sp-acc-trigger" @click="toggleFaqKey(item.q)" :aria-expanded="isFaqOpen(item.q)">
              <div>
                <span class="sp-tag-inline">{{ item.cat }}</span>
                <span class="sp-acc-q">{{ item.q }}</span>
              </div>
              <span class="sp-acc-icon">{{ isFaqOpen(item.q) ? '−' : '+' }}</span>
            </button>
            <div class="sp-acc-body" v-show="isFaqOpen(item.q)">
              <p>{{ item.a }}</p>
            </div>
          </div>
        </div>
      </div>

      <aside class="sp-faq-aside">
        <div class="sp-card sp-card-accent">
          <h3>Need Immediate Crew Advice?</h3>
          <p class="sp-muted">Property water losses double interior humidity every 6 hours. Speak directly with an IICRC-certified coordinator at no obligation.</p>
          <a href="tel:+18005550199" class="sp-btn sp-btn-orange sp-btn-block sp-mt-sm">Call <?= e(HOTLINE_PHONE) ?> (24/7)</a>
          <a href="<?= e(url('/#request')) ?>" class="sp-btn sp-btn-outline sp-btn-block sp-mt-sm">Request Dispatch Online</a>
        </div>

        <?php if (!empty($articles)): ?>
        <div class="sp-card sp-mt-md">
          <h3>Recommended Technical Manuals</h3>
          <div class="sp-aside-links">
            <?php foreach ($articles as $art): ?>
            <a href="<?= e(url('/resources/article?id=' . (int)$art['id'])) ?>" class="sp-aside-link">
              <strong><?= e($art['title']) ?></strong>
              <span><?= e($art['category']) ?> &middot; <?= e($art['read_time'] ?? '6 min read') ?></span>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </aside>
    </div>
  </div>
</section>
