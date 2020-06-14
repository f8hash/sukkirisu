<?php

use HeadlessChromium\BrowserFactory;
use DOMWrap\Document;

require_once('CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    public function get(SiteInterface $site): array
    {
        $browserFactory = new BrowserFactory;
        $browser = $browserFactory->createBrowser();
        $page = $browser->createPage();

        $page->navigate($site->url())->waitForNavigation();

        $evaluation = $page->evaluate('document.documentElement.innerHTML');
        $value = $evaluation->getReturnValue();
        $browser->close();

        $rows = [];
        $this->html($value)->find($site->selector())->each(function ($node) use (&$rows) {
            $rows[] = explode(' ', $node->text());
        });

        return $rows;
    }

    private function html($html): Document
    {
        $document = new Document;
        return $document->html($html);
    }
}
