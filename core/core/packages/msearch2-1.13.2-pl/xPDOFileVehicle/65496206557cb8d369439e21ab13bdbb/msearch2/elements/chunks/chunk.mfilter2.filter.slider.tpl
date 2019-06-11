<fieldset id="mse2_{$table ~ $delimeter ~ $filter}">
    <h4 class="filter_title">{('mse2_filter_' ~ $table ~ '_' ~ $filter) | lexicon}</h4>
    <div class="mse2_number_slider"></div>
    <div class="mse2_number_inputs row">
        {$rows}
    </div>
</fieldset>