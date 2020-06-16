<?php

require_once('SiteInterface.php');

require_once('SukkirisuCrawler.php');

use DOMWrap\Document;

class SukkirisuSite implements SiteInterface
{
    private $url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';

    private $selector = 'div.ntv-article-contents-main > div > div';

    private $html;

    private function crawling(): void
    {
        $crawler = new SukkirisuCrawler;
        $this->html = $crawler->get($this->url);
    }

    public function scraping(): array
    {
        $parser = new Document;

        $this->crawling();
        $html = $parser->html($this->html);
        
        $rows = [];
        $html->find($this->selector)->each(function ($node) use (&$rows) {
            $rows[] = explode(' ', $node->text());
        });

        return $rows;
    }
}
