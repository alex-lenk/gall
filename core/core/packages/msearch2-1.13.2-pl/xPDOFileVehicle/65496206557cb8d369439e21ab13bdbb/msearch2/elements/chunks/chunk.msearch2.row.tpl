<div class="mse2-row">
    {$idx}. <a href="{$uri}" class="search-link">{$pagetitle}</a>
    {if $weight}
        ({'mse2_weight' | lexicon}: {$weight})
    {/if}
    {if $intro}
        <p>{$intro}</p>
    {/if}
</div>