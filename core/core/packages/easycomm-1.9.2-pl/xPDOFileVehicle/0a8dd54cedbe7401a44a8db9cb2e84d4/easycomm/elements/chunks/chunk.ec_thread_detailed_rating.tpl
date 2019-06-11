<div class="ec-d-rating">
    <div class="ec-d-rating__col-info">
        <div class="ec-d-rating__value">
            {$rating_wilson | number : 2 : ',' : ' '}
        </div>
        <div class="ec-d-rating__stars">
            <div class="ec-stars" title="{$rating_wilson}" itemscope itemtype="http://schema.org/AggregateRating">
                <meta itemprop="itemReviewed" content="{($itemReviewed ?: $_modx->resource['pagetitle']) | e}" />
                <meta itemprop="ratingValue" content="{$rating_wilson}" />
                <meta itemprop="bestRating" content="{$rating_max}" />
                <meta itemprop="worstRating" content="1" />
                <meta itemprop="ratingCount" content="{$count}" />
                <span style="width: {$rating_wilson_percent}%"></span>
            </div>
        </div>
        <div class="ec-d-rating__desc">
            {'ec_fe_detailed_rating_desc' | lexicon} &ndash; <strong>{$count}</strong>
        </div>
    </div>
    <div class="ec-d-rating__col-lines">
        <div class="ec-d-rating__lines">
            {foreach $rating_votes as $rate => $line}
                <div class="ec-d-rating__line">
                    <div class="ec-d-rating__line-rate">{$rate}</div>
                    <div class="ec-d-rating__line-progress"><span style="width:{$line['volume']}%"></span></div>
                    <div class="ec-d-rating__line-volume">{$line['volume'] | number}%</div>
                </div>
            {/foreach}
        </div>
    </div>
</div>
