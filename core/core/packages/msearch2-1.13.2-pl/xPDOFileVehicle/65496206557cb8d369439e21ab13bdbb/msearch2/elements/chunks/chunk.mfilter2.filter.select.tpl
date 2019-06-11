{var $key = $table ~ $delimeter ~ $filter}
<fieldset id="mse2_{$key}">
    <h4 class="filter_title">{('mse2_filter_' ~ $table ~ '_' ~ $filter) | lexicon}</h4>
    <select name="{$filter_key}" id="{$key}_0" class="form-control">
        <option value="" selected>{'mse2_select' | lexicon}</option>
        {$rows}
    </select>
</fieldset>