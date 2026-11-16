<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CatalogData;

class ResourceController extends Controller
{
    public function index(): void
    {
        $uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/resources', PHP_URL_PATH) ?: '/resources';
        $initialTab = $_GET['tab'] ?? (str_contains($uriPath, 'glossary') ? 'glossary' : 'articles');
        $initialCat = $_GET['cat'] ?? 'All';

        $this->view('resources/index', [
            'title' => 'Cleaning & Restoration Guides, FAQ & A–Z Glossary | RescuePro®',
            'articles' => CatalogData::articles(),
            'glossary' => CatalogData::glossaryTerms(),
            'globalFaqs' => CatalogData::globalFaqs(),
            'initialTab' => $initialTab,
            'initialCat' => $initialCat,
        ]);
    }

    public function faq(): void
    {
        $this->view('resources/faq', [
            'title' => 'Frequently Asked Questions — Water, Fire, Mold & Insurance | RescuePro®',
            'globalFaqs' => CatalogData::globalFaqs(),
            'articles' => array_slice(CatalogData::articles(), 0, 6),
        ]);
    }

    public function article(): void
    {
        $articles = CatalogData::articles();
        $id = (int)($_GET['id'] ?? 1);
        $slug = trim((string)($_GET['slug'] ?? ''));

        $found = $articles[0];
        foreach ($articles as $a) {
            if ($slug !== '' && ($a['slug'] ?? '') === $slug) {
                $found = $a;
                break;
            }
            if ((int)$a['id'] === $id) {
                $found = $a;
                break;
            }
        }

        $related = array_values(array_filter($articles, static fn($a) => $a['id'] !== $found['id'] && $a['category'] === $found['category']));
        if (count($related) < 3) {
            $related = array_values(array_filter($articles, static fn($a) => $a['id'] !== $found['id']));
        }

        $this->view('resources/article', [
            'title' => $found['title'] . ' | RescuePro® Field Guide',
            'article' => $found,
            'relatedArticles' => array_slice($related, 0, 3),
        ]);
    }

    public function insurance(): void
    {
        $this->view('resources/insurance', [
            'title' => 'Insurance Claim Process & Continuing Education | RescuePro®',
            'courses' => CatalogData::ceCourses(),
            'claims' => CatalogData::insuranceClaims(),
        ]);
    }
}
