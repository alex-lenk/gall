{var $lang = $_modx->config.cultureKey}
{if $code?}
    {if $lang == 'en'}
        Your confirmation code: {$code}.
    {else}
        Ваш код подтверждения нового номера: {$code}.
    {/if}
{else}
    {if $lang == 'en'}
        <p>You have changed email in yours profile on the website {'site_name' | config}.</p>
        <p>To confirm the new address you need <a href="{$link}">follow the link</a>.</p>
    {else}
        <p>Вы изменили email в своём профиле на сайте {'site_name' | config}.</p>
        <p>Для подтверждения нового адреса вам нужно <a href="{$link}">пройти по ссылке</a>.</p>
    {/if}
{/if}