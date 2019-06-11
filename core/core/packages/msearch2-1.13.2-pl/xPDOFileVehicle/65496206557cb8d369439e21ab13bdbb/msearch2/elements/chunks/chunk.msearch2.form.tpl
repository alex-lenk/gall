<form action="{$pageId | url}" method="get" class="msearch2" id="mse2_form">
    <div class="input-group">
        <input type="text" class="form-control" name="{$queryVar}" value="{$mse2_query}"
               placeholder="{'mse2_search' | lexicon}"/>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                {'mse2_search_submit' | lexicon}
            </button>
        </div>
    </div>
</form>

