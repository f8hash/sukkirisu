<?php

namespace Sukkirisu;

require_once('ViewerInterface.php');
require_once('CrawlerInterface.php');

class ConsoleViewer implements ViewerInterface
{
    private $crawler;

    public function __construct(CrawlerInterface $crawler)
    {
        $this->crawler = $crawler;
    }

    public function show(): void
    {
      $array = $this->crawler->get();
      
      echo $array['label'].'！'.$array['month'].'月生まれは'.$array['rank'].'。'.$array['result'].'。ラッキーカラーは'.$array['color'];
    }
}
