<div class="office-remote-login">
    <a href="{$remote}" class="btn btn-primary" rel="nofollow">{'office_auth_remote_login' | lexicon}</a>
    {if $error?}
        <div class="alert alert-danger">{$error}</div>
    {/if}
</div>