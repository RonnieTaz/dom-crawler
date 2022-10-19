<?php

use Cocur\Slugify\Slugify;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\DomCrawler\Crawler;

require_once __DIR__ . '/vendor/autoload.php';

$url = $_GET['url'] ?? "https://www.google.com/";

$response = Browsershot::url($url)->bodyHtml();
$crawler = new Crawler($response);
$slugify = new Slugify();

$details = [
    'company_name' => $crawler->filter('section#inv > div.row > div.invoice-header > center')->text(),
    'company_details' => $crawler->filter('section#inv > div.invoice-info > center > div.invoice-col')->children()
];

dump($details);
