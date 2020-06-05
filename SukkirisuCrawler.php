<?php

use HeadlessChromium\BrowserFactory;
use DOMWrap\Document;

require_once('CrawlerInterface.php');

// TODO 外部ライブラリを自作のクラスに隠蔽
class SukkirisuCrawler implements CrawlerInterface
{
    public function __construct(BrowserFactory $browserFactory, Document $doc)
    {
        $this->browserFactory = $browserFactory;

        $this->doc = $doc;
    }

    public function get(): array
    {
        $browser = $this->browserFactory->createBrowser();
        $page = $browser->createPage();
        // TODO URLをベタにしない
        $page->navigate('http://www.ntv.co.jp/sukkiri/sukkirisu/index.html')->waitForNavigation();
        $evaluation = $page->evaluate('document.documentElement.innerHTML');
        $value = $evaluation->getReturnValue();
        $browser->close();

        $node = $this->doc->html($value);

        // TODO 各月の結果を解析
        $text = $node->find('article')->text();

        var_dump($text);exit;

        return $ret;
    }
}
