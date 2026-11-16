<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CatalogData;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home/index', [
            'title' => 'Commercial & Residential Restoration Services Near You | RescuePro®',
            'services' => CatalogData::services(),
            'franchises' => CatalogData::franchises(),
            'industries' => CatalogData::industries(),
            'communityStories' => CatalogData::communityStories(),
            'articles' => array_slice(CatalogData::articles(), 0, 6),
            'globalFaqs' => array_slice(CatalogData::globalFaqs(), 0, 6),
        ]);
    }

    public function why(): void
    {
        $this->view('home/why', [
            'title' => 'Why Choose RescuePro®? — History, First Responders & Community',
            'franchises' => CatalogData::franchises(),
            'pressReleases' => CatalogData::pressReleases(),
            'communityStories' => CatalogData::communityStories(),
        ]);
    }

    public function locations(): void
    {
        $this->view('home/locations', [
            'title' => 'Find a Local RescuePro® Location Near You',
            'franchises' => CatalogData::franchises(),
        ]);
    }

    public function preferredVendor(): void
    {
        $this->view('home/preferred_vendor', [
            'title' => 'Insurance Carrier Preferred Vendor Program | RescuePro®',
            'courses' => CatalogData::ceCourses(),
            'claims' => CatalogData::insuranceClaims(),
        ]);
    }

    public function contact(): void
    {
        $this->view('home/contact', [
            'title' => 'Contact RescuePro® — 24/7 Dispatch & National Headquarters',
            'franchises' => CatalogData::franchises(),
        ]);
    }

    public function terms(): void
    {
        $this->view('legal/terms', [
            'title' => 'Terms of Service & Service Authorization Terms | RescuePro®',
        ]);
    }

    public function privacy(): void
    {
        $this->view('legal/privacy', [
            'title' => 'Privacy Policy & Data Protection | RescuePro®',
        ]);
    }

    public function accessibility(): void
    {
        $this->view('legal/accessibility', [
            'title' => 'Digital Accessibility Commitment (WCAG 2.1 AA) | RescuePro®',
        ]);
    }

    public function sitemap(): void
    {
        $this->view('legal/sitemap', [
            'title' => 'Complete Website Sitemap & Service Directory | RescuePro®',
            'services' => CatalogData::services(),
            'articles' => CatalogData::articles(),
        ]);
    }

    public function notFound(): void
    {
        $this->view('errors/404', [
            'title' => '404 — Page Not Found | RescuePro®',
            'services' => CatalogData::services(),
        ]);
    }
}
