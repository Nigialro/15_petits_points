<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ReduceTextExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('reduceText', [$this, 'reduceText'], ['is_safe' => ['html']]),
        ];
    }

    public function reduceText($text, $maxLength, $ellipsis = '...')
    {
        // Check if the text length exceeds the maximum length
        if (mb_strlen($text) > $maxLength) {
            // Reduce the text to the maximum length
            $reducedText = mb_substr($text, 0, $maxLength);
            // Trim any trailing punctuation characters
            $reducedText = rtrim($reducedText, "!,.-");
            // Find the last space in the reduced text
            $lastSpacePos = strrpos($reducedText, ' ');
            // Reduce the text at the last space position
            $reducedText = substr($reducedText, 0, $lastSpacePos);
            // Append the ellipsis
            $reducedText .= $ellipsis;
            return $reducedText;
        }

        return $text;
    }
}