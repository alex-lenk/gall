<div class="row" id="office-auth-form">
    <div class="col-md-6">
        <div class="d-flex align-items-center">
            <div class="mr-3">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" alt="{$fullname}" title="{$fullname}"
                     class="rounded-circle" width="100"/>
            </div>
            <div>
                <div>{'office_auth_welcome' | lexicon} <b>{$fullname}</b> ({$username})</div>
                <a href="{$_modx->resource.id | url : [] : ['action' => 'auth/logout']}" class="btn btn-light">
                    {'office_auth_logout' | lexicon} &rarr;
                </a>
            </div>
        </div>
        {if $authorized?}
            <hr/>
            <div class="authorized">
                {foreach $authorized as $id => $user}
                    <div class="d-flex align-items-center mb-2">
                        <img src="{if $user.photo?}{$user.photo}{else}{$user.gravatar}?s=50{/if}"
                             alt="{$user.fullname}" title="{$user.fullname}" class="rounded-circle mr-3" width="50"/>
                        <a href="{$_modx->resource.id | url : [] : ['action' => 'auth/change', 'user_id' => $id]}">
                            <strong>{$user.fullname}</strong> ({$user.username})
                        </a>
                        <a href="{$_modx->resource.id | url : [] : ['action' => 'auth/logout', 'user_id' => $id]}" class="btn btn-light ml-auto">&rarr;</a>
                    </div>
                {/foreach}
            </div>
        {/if}
    </div>
    <div class="col-md-6 mt-3 mt-md-0">
        <form method="post" class="form-horizontal" id="office-auth-login">
            <input type="hidden" name="action" value="auth/formAdd"/>
            <input type="hidden" name="return" value=""/>
            <div class="alert alert-warning">
                <small>{'office_auth_add_desc' | lexicon}</small>
            </div>
            <div class="form-group row">
                <label for="office-auth-login-email" class="col-md-3 col-form-label">
                    {'office_auth_login_username' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-9">
                    <input type="text" name="username" placeholder="" class="form-control" id="office-auth-login-username" value=""/>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-login-password" class="col-md-3 col-form-label">
                    {'office_auth_login_password' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-9">
                    <input type="password" name="password" placeholder="" class="form-control" id="office-login-form-password" value=""/>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{'office_auth_login_btn' | lexicon}</button>
                </div>
            </div>
        </form>
    </div>
</div>