<div class="ec-stars" title="{$rating_wilson}" itemscope itemtype="http://schema.org/AggregateRating">
    <meta itemprop="itemReviewed" content="{($itemReviewed ?: $_modx->resource['pagetitle']) | e}" />
    <meta itemprop="ratingValue" content="{$rating_wilson}" />
    <meta itemprop="bestRating" content="{$rating_max}" />
    <meta itemprop="worstRating" content="1" />
    <meta itemprop="ratingCount" content="{$count}" />
    <span style="width: {$rating_wilson_percent}%"></span>
</div>