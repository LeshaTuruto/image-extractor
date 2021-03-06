<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Extract images from url pattern.
 */
class ImageExtractionService
{
    public function extract(string $url): array
    {
        $extractingClient = HttpClient::create();
        $extractedPage = $extractingClient->request('GET', $url);
        $crawler = new Crawler($extractedPage->getContent());
        $crawler = $crawler->filterXPath('descendant-or-self::img');
        $imageList = [];

        foreach ($crawler as $domElement) {
            $imageList[] = $domElement;
        }

        return $imageList;
    }

    public function getExtractedImagesSrc(array $images): array
    {
        $ExtractedImagesSrc = [];

        foreach ($images as $image) {
            if ($image->hasAttribute('src')) {
                $ExtractedImagesSrc[] = $image->getAttribute('src');
            }
        }

        return $ExtractedImagesSrc;
    }
}
