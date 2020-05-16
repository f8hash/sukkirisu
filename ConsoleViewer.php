<?php

namespace Sukkirisu;

require_once('ViewerInterface.php');

class ConsoleViewer implements ViewerInterface
{
    public function show($crawlerFilterText) :void
    {
      $array = explode(' ', $crawlerFilterText);
      echo $array[0].'月生まれは'.$array[1].'。'.$array[2].'。ラッキーカラーは'.$array[3];
    }
}
