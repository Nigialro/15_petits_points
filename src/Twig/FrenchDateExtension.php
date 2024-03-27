<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FrenchDateExtension extends AbstractExtension
{
  public function getFilters()
  {
    return [
      new TwigFilter('frenchDate', [$this, 'frenchDate']),
    ];
  }

  public function frenchDate(\DateTimeInterface $date): string
  {
    $month = [
      'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
      'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
    ];

    $day = $date->format('d');
    $monthIndex = intval($date->format('m')) - 1;
    $year = $date->format('Y');

    $frenchDate = $day . ' ' . $month[$monthIndex] . ' ' . $year;

    return $frenchDate;
  }
}
