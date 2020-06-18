<?php

require_once('Interface/SiteInterface.php');

require_once('SukkirisuCrawler.php');
require_once('SukkirisuParser.php');

class SukkirisuSite implements SiteInterface
{
    private $url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';

    private $selector = 'div.ntv-article-contents-main > div > div';

    private $html = '';

    private function html(): string
    {
        if (empty($this->html)) {
            $this->crawling();
        }
        return $this->html;
    }

    private function crawling(): void
    {
        $crawler = new SukkirisuCrawler;
        $this->html = $crawler->get($this->url);
    }

    public function scraping(): array
    {
        $parser = new SukkirisuParser;
        return $parser->find($this->html(), $this->selector);
    }
}
