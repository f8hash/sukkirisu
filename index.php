<?php

require_once('vendor/autoload.php');
require_once('SukkirisuSite.php');
require_once('SukkirisuParser.php');
require_once('SukkirisuScraper.php');
require_once('ConsoleViewer.php');

$viewer = new ConsoleViewer;
$scraper = new SukkirisuScraper(new SukkirisuSite, new SukkirisuParser);
$viewer->show($scraper, '7月');
$viewer->show($scraper, '10月');
