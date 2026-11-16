<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span>
      <a href="<?= e(url('/resources')) ?>">Resources &amp; Guides</a> <span>/</span>
      <span><?= e($article['category']) ?></span>
    </nav>
    <h1><?= e($article['title']) ?></h1>
    <div class="sp-article-meta-bar sp-mt-sm">
      <span class="sp-pill sp-pill-orange"><?= e($article['tag'] ?? $article['category']) ?></span>
      <span>Standard: <strong><?= e($article['iicrc_standard'] ?? 'IICRC S500') ?></strong></span>
      <span>Published: <?= e($article['date'] ?? '2026') ?></span>
      <span><?= e($article['read_time'] ?? '7 min technical read') ?></span>
    </div>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container sp-article-reader-grid">
    <article class="sp-article-main">
      <?php $coverSrc = sp_img($article['image'] ?? 'article_laminate'); ?>
      <?php if ($coverSrc !== ''): ?>
      <div class="sp-article-cover-wrap">
        <img src="<?= e($coverSrc) ?>" alt="<?= e($article['title']) ?>" class="sp-article-cover-img">
      </div>
      <?php endif; ?>

      <div class="sp-article-lead-box sp-mt-md">
        <strong>Field Executive Summary:</strong> <?= e($article['excerpt']) ?>
      </div>

      <?php if (!empty($article['equipment_used'])): ?>
      <div class="sp-equipment-strip sp-mt-md">
        <strong>Primary Restoration Instrumentation:</strong>
        <?php foreach ($article['equipment_used'] as $eq): ?>
        <span class="sp-eq-badge"><?= e($eq) ?></span>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <div class="sp-article-prose sp-mt-md">
        <?php
          $paragraphs = is_array($article['body'] ?? null) ? $article['body'] : preg_split("/\r?\n\r?\n/", (string)($article['body'] ?? ''));
          foreach ($paragraphs as $para):
            if (trim((string)$para) === '') continue;
        ?>
        <p><?= e(trim((string)$para)) ?></p>
        <?php endforeach; ?>
      </div>

      <?php if (!empty($article['steps'])): ?>
      <div class="sp-card sp-mt-lg">
        <h2>Certified Field Mitigation Sequence</h2>
        <ol class="sp-numbered-protocol sp-mt-sm">
          <?php foreach ($article['steps'] as $step): ?>
          <li><?= e($step) ?></li>
          <?php endforeach; ?>
        </ol>
      </div>
      <?php endif; ?>

      <?php if (!empty($article['dos']) || !empty($article['donts'])): ?>
      <div class="sp-grid-2 sp-mt-lg">
        <?php if (!empty($article['dos'])): ?>
        <div class="sp-card sp-card-do">
          <h3>Recommended Immediate Actions (Do)</h3>
          <ul class="sp-check-list">
            <?php foreach ($article['dos'] as $doItem): ?>
            <li><?= e($doItem) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

        <?php if (!empty($article['donts'])): ?>
        <div class="sp-card sp-card-dont">
          <h3>Critical Mistakes to Avoid (Don't)</h3>
          <ul class="sp-warn-list">
            <?php foreach ($article['donts'] as $dontItem): ?>
            <li><?= e($dontItem) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <?php if (!empty($article['faq'])): ?>
      <div class="sp-card sp-mt-lg">
        <h2>Common Technical Questions on This Topic</h2>
        <?php foreach ($article['faq'] as $f): ?>
        <div class="sp-inline-qa">
          <h4><?= e($f['q']) ?></h4>
          <p><?= e($f['a']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </article>

    <aside class="sp-article-sidebar">
      <div class="sp-card sp-card-accent">
        <h3>Emergency Help Needed Now?</h3>
        <p class="sp-muted">Certified RescuePro® technicians are positioned across 2,410+ territories with commercial LGR dehumidifiers, HEPA scrubbers, and thermal cameras.</p>
        <a href="tel:+18005550199" class="sp-btn sp-btn-orange sp-btn-block sp-mt-sm">Call <?= e(HOTLINE_PHONE) ?></a>
        <a href="<?= e(url('/#request')) ?>" class="sp-btn sp-btn-outline sp-btn-block sp-mt-sm">Dispatch Local Crew</a>
        <a href="<?= e(url('/resources')) ?>" class="sp-btn sp-btn-ghost sp-btn-block sp-mt-sm">&larr; All 24 Restoration Guides</a>
      </div>

      <?php if (!empty($relatedArticles)): ?>
      <div class="sp-card sp-mt-md">
        <h3>Related Technical Manuals</h3>
        <div class="sp-aside-links">
          <?php foreach ($relatedArticles as $rel): ?>
          <a href="<?= e(url('/resources/article?id=' . (int)$rel['id'])) ?>" class="sp-aside-link">
            <strong><?= e($rel['title']) ?></strong>
            <span><?= e($rel['category']) ?> &middot; <?= e($rel['read_time'] ?? '6 min read') ?></span>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </aside>
  </div>
</section>
