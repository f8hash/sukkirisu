<?php

use HeadlessChromium\BrowserFactory;
use DOMWrap\Document;

require_once('CrawlerInterface.php');
require_once('SiteInterface.php');

// TODO 外部ライブラリを自作のクラスに隠蔽
class SukkirisuCrawler implements CrawlerInterface
{
    public function __construct(BrowserFactory $browserFactory, Document $doc, Site $site)
    {
        $this->browserFactory = $browserFactory;

        $this->doc = $doc;

        $this->site = $site;
    }

    public function get(): array
    {
        $browser = $this->browserFactory->createBrowser();
        $page = $browser->createPage();

        // TODO 依存の解消
        $page->navigate($this->site->url())->waitForNavigation();

        $evaluation = $page->evaluate('document.documentElement.innerHTML');
        $value = $evaluation->getReturnValue();
        $browser->close();

        $node = $this->doc->html($value);

        // TODO 各月の結果を解析
        $text = $node->find('article')->text();

        $text = explode(' ', $node->find($site->selector())->text());
        $text = explode(' ', $node->find($this->site->selector())->text());
        var_dump($text);exit;

        return $ret;
    }
}
