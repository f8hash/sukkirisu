<?php

use HeadlessChromium\BrowserFactory;
use DOMWrap\Document;

require_once('CrawlerInterface.php');

class SukkirisuCrawler implements CrawlerInterface
{
    public function __construct()
    {
        $this->browserFactory = new BrowserFactory;
        $this->document = new Document;
    }

    public function get(SiteInterface $site): Document
    {
        $browser = $this->browserFactory->createBrowser();
        $page = $browser->createPage();

        $page->navigate($site->url())->waitForNavigation();

        $evaluation = $page->evaluate('document.documentElement.innerHTML');
        $value = $evaluation->getReturnValue();
        $browser->close();

        return $this->html($value);
    }

    private function html($html)
    {
        return $this->document->html($html);
    }
}
