{var $lang = $_modx->config.cultureKey}
{if $code?}
    {if $lang == 'en'}
        You registered on {'site_name' | config}{if $password?}, your password: {$password}{/if}. Your activation code: {$code}.
    {else}
        Вы зарегистрировались на {'site_name' | config}{if $password?}, ваш пароль: {$password}{/if}. Ваш код активации: {$code}.
    {/if}
{else}
    {if $lang == 'en'}
        <p>You have successfully registered at {'site_name' | config} using email {$email}.</p>
        <p>Now you need <a href="{$link}">follow the link</a> to activate your account.
            {if $password?}
                Your password is: <strong>{$password}</strong>. Do not forget to change it for your own!
            {/if}
        </p>
    {else}
        <p>Вы успешно зарегистрировались на сайте {'site_name' | config}, указав email {$email}.</p>
        <p>Теперь вам нужно <a href="{$link}">пройти по ссылке</a>, чтобы активировать учётную запись.<br/>
            {if $password?}
                <br/>Ваш пароль: <strong>{$password}</strong>. Не забудьте поменять его на свой!
            {/if}
        </p>
    {/if}
{/if}