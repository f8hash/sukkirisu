<?php

require_once('vendor/autoload.php');
require_once('Sukkirisu.php');
require_once('SukkirisuCrawler.php');
require_once('SukkirisuSite.php');
require_once('ConsoleViewer.php');

// webサイトからhtmlを取得
$teller = new Sukkirisu(new SukkirisuSite, new SukkirisuCrawler);

// 表示
$viewer = new ConsoleViewer;
$viewer->show($teller->tell());
