Здравствуйте, {$user_name}!
<br />
Вы оставляли сообщение на сайте {'site_url' | option}:
<br />
<br />
<div style="white-space:pre;background: #f0f0f0;padding: 10px;border: solid 1px #eee;">{$text}</div>
<br /><br />

{if $published}
    {if $reply_text}
        {if $reply_author}
            <span style="font-weight:bold;">{$reply_author}</span> ответил на ваше сообщение:
        {else}
            На ваше сообщение дан ответ:
        {/if}
        <br />
        <br />
        <div style="white-space:pre;background: #f0f0f0;padding: 10px;border: solid 1px #eee;">{$reply_text}</div>
        <br />
        Ваше сообщение с ответом на него опубликовано <a href="{$resource_id | url : ['scheme' => 'full']}#message-{$id}">здесь</a>.
    {else}
        Ваше сообщение было опубликовано. Вы можете его просмотреть <a href="{$resource_id | url : ['scheme' => 'full']}#message-{$id}">здесь</a>.
    {/if}
{else}
    {if $reply_text}
        {if $reply_author}
            <span style="font-weight:bold;">{$reply_author}</span> ответил на ваше сообщение:
        {else}
            На ваше сообщение дан ответ:
        {/if}
        <br />
        <br />
        <div style="white-space:pre;background: #f0f0f0;padding: 10px;border: solid 1px #eee;">{$reply_text}</div>
    {/if}
{/if}

<br />
<br />
С уважением, {'site_name' | option}.