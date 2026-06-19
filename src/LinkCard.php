<?php

/**
 * Renders an HTML link card with safe output escaping.
 *
 * @param string $url       The target URL of the link.
 * @param string $title     The display title of the card.
 * @param string $summary   A short description shown below the title.
 * @param string $imageUrl  Optional image URL for the card thumbnail.
 * @return string           Escaped and structured HTML string.
 */
function renderLinkCard(string $url, string $title, string $summary = '', string $imageUrl = ''): string
{
    $escapedUrl     = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedTitle   = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedSummary = htmlspecialchars($summary, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedImage   = htmlspecialchars($imageUrl, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $imageBlock = '';
    if ($escapedImage !== '') {
        $imageBlock = sprintf(
            '<div class="link-card-image"><img src="%s" alt="%s" loading="lazy" /></div>',
            $escapedImage,
            $escapedTitle
        );
    }

    $html = <<<HTML
<div class="link-card">
    <a href="{$escapedUrl}" target="_blank" rel="noopener noreferrer" class="link-card-anchor">
        {$imageBlock}
        <div class="link-card-body">
            <h3 class="link-card-title">{$escapedTitle}</h3>
            <p class="link-card-summary">{$escapedSummary}</p>
        </div>
    </a>
</div>
HTML;

    return $html;
}

// ---------------------------------------------------------------------------
// Example usage with provided URL and keyword
// ---------------------------------------------------------------------------
$demoUrl     = 'https://cnwebs-igysports.com';
$demoTitle   = '爱游戏体育';
$demoSummary = '探索爱游戏体育的精彩世界，获取最新赛事资讯与互动体验。';

echo renderLinkCard($demoUrl, $demoTitle, $demoSummary);