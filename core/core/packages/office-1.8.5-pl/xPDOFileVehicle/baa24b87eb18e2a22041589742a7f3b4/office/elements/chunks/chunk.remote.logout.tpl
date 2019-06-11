<div class="row" id="office-auth-form">
    <div class="col-md-6">
        <div class="d-flex align-items-center">
            <div class="mr-3">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" alt="{$fullname}" title="{$fullname}"
                     class="rounded-circle" width="100"/>
            </div>
            <div>
                <div>{'office_auth_welcome' | lexicon} <b>{$fullname}</b> ({$username})</div>
                <a href="{$_modx->resource.id | url : [] : ['action' => 'remote/logout']}" class="btn btn-light">
                    {'office_auth_logout' | lexicon} &rarr;
                </a>
            </div>
        </div>
    </div>
</div>