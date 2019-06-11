{var $key = $table ~ $delimeter ~ $filter}
<label for="mse2_{$key}_{$idx}" class="{$disabled}">
    <input type="checkbox" name="{$filter_key}" id="mse2_{$key}_{$idx}" value="{$value}" {$checked} {$disabled}/>
    <span>{$title}</span>&nbsp;<sup>{$num}</sup>
</label><br/>