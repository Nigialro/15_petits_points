<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TruncateTextExtension extends AbstractExtension
{
  public function getFilters()
  {
    return [
      new TwigFilter('truncateText', [$this, 'truncateText']),
    ];
  }

  public function truncateText($text, $maxLength, $ellipsis = '...')
  {
    $text = strip_tags($text);

    if (mb_strlen($text) > $maxLength) {
      $truncatedText = mb_substr($text, 0, $maxLength);
      $truncatedText = rtrim($truncatedText, "!,.-");
      $truncatedText = substr($truncatedText, 0, strrpos($truncatedText, ' '));
      $truncatedText .= $ellipsis;
      return $truncatedText;
    }

    return $text;
  }
}
