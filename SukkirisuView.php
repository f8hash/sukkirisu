<?php

class SukkirisuView
{
    public function array($crawlerFilterText) :array
    {
      $array = explode(' ', $crawlerFilterText);
      return [
        'rank' => $array[1],
        'text' => $array[2],
        'color' => $array[3],
      ];
    }
}