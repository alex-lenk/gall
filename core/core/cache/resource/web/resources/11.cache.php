<?php  return array (
  'resourceClass' => 'CollectionContainer',
  'resource' => 
  array (
    'id' => 11,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'Портфолио',
    'longtitle' => 'Портфолио',
    'description' => '',
    'alias' => 'portfolio',
    'alias_visible' => 1,
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 1,
    'introtext' => '',
    'content' => '<h2>Работы по верстке, программированию и дизайну</h2>
',
    'richtext' => 0,
    'template' => 2,
    'menuindex' => 2,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1559317126,
    'editedby' => 1,
    'editedon' => 1560263992,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1559317080,
    'publishedby' => 1,
    'menutitle' => 'Портфолио',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'CollectionContainer',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'portfolio/',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => '{"ms2gallery":{"media_source":"2"}}',
    'img' => 
    array (
      0 => 'img',
      1 => '',
      2 => 'default',
      3 => NULL,
      4 => 'fastuploadtv',
    ),
    '_content' => '{include \'head\'}

{include \'top_panel\'}

{if $_modx->resource.id == 1}
    {include \'slider\'}
{else}
    {include \'header\'}
{/if}

<div id="content" class="container">
  <div class="row">
    <div class="col-xs-12">
    {include \'breadCrumbs\'}
    
    {if $_modx->resource.id == 1}
        <h1>{$_modx->resource.longtitle}</h1>
    {/if}
    
    {if $_modx->resource.id == 31}
        {include \'catList\'}
    {/if}
    {$_modx->resource.content}
    
    {if $_modx->resource.id == 1}
        {include \'forHome\'}
    {/if}
    
    {if $_modx->resource.id == 5}
        {include \'forID5\'}
    {/if}
    
    {if $_modx->resource.id == 11}
<ul id="filter" class="row">
    <li class="col-sm-4 col-xs-12"><a href="" class="current button" data-filter="*">Все</a></li>
    <li class="col-sm-4 col-xs-12"><a href="" class="button" data-filter=".layout">работы по верстке сайтов</a></li>
    <li class="col-sm-4 col-xs-12"><a href="" class="button" data-filter=".design">работы по дизайну сайтов</a></li>
</ul>
{\'ms2Gallery\' | snippet : [
    \'getTags\' => \'1\',
    \'parents\' => \'11\',
    \'tags\' => \'верстка,дизайн сайта\',
    \'tplOuter\' => \'pf.outer\',
    \'tplRow\' => \'pf.row\',
    \'tplEmpty\' => \'empty\'
]}
    {/if}
    
    {if $_modx->resource.id == 15}
        {include \'review\'}
    {/if}
    
    {if $_modx->resource.id == 16}
        {include \'news\'}
    {/if}
    
    {if $_modx->resource.id == 19}
        {include \'site_map_html\'}
    {/if}
    </div>
  </div>
</div>

{if $_modx->resource.id != 11}
    {include \'our_portfolio\' }
{/if}

{if $_modx->resource.id != 5}
    {include \'services\'}
{/if}

{if $_modx->resource.id != 15}
    {include \'our_reviews\'}
{/if}

{if $_modx->resource.id != 19}
    {include \'our_news\'}
{/if}

{include \'our_parners\'}

{include \'footer\'}',
    '_isForward' => false,
    '_sjscripts' => 
    array (
      0 => '<link rel="stylesheet" href="/assets/components/ms2gallery/css/web/default.css" type="text/css" />',
    ),
    '_jscripts' => 
    array (
      0 => '<script type="text/javascript" src="/assets/components/ms2gallery/js/web/default.js"></script>',
    ),
    '_loadedjscripts' => 
    array (
      '/assets/components/ms2gallery/css/web/default.css' => true,
      '/assets/components/ms2gallery/js/web/default.js' => true,
    ),
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'elementCache' => 
  array (
    '[[pdoMenu?showLog=``&fastMode=``&level=`2`&parents=``&displayStart=``&resources=``&templates=``&context=``&cache=``&cacheTime=`3600`&cacheAnonymous=``&plPrefix=`wf.`&showHidden=``&showUnpublished=``&showDeleted=``&previewUnpublished=``&hideSubMenus=``&useWeblinkUrl=`1`&sortdir=`ASC`&sortby=`menuindex`&limit=`0`&offset=`0`&rowIdPrefix=``&firstClass=``&lastClass=``&hereClass=`active`&parentClass=`menu-parent`&rowClass=``&outerClass=`menu`&innerClass=``&levelClass=``&selfClass=``&webLinkClass=``&tplOuter=`tplOuter`&tpl=`tpl`&tplParentRow=``&tplParentRowHere=``&tplHere=`tplHere`&tplInner=`tplInner`&tplInnerRow=``&tplInnerHere=``&tplParentRowActive=``&tplCategoryFolder=``&tplStart=`@INLINE <h2[[+classes]]>[[+menutitle]]</h2>[[+wrapper]]`&checkPermissions=``&hereId=``&where=``&select=``&scheme=``&toPlaceholder=``&countChildren=``&startId=`0`&class_inner=`wer`]]' => '<ul class="menu"><li >
<a href="/">Главная</a>
</li><li  class="menu-parent">
<a href="services-and-prices/">Услуги и цены</a>
<ul class="menu-dropdown"><li >
<a href="services-and-prices/layout-site.html">Верстка сайтов</a>
</li><li >
<a href="services-and-prices/programming-cms-modx-revolution.html">Программирование</a>
</li><li >
<a href="services-and-prices/correct-errors-site.html">Исправление ошибок</a>
</li></ul></li><li class="active">
<span>Портфолио</span>
</li><li >
<a href="about-us.html">О нас</a>
</li><li >
<a href="otzyivyi-klientov.html">Отзывы</a>
</li><li >
<a href="news/">Новости</a>
</li><li >
<a href="contacts.html">Контакты</a>
</li></ul>',
    '[[pdoCrumbs?showLog=``&fastMode=``&from=`0`&to=``&customParents=``&limit=`10`&exclude=``&outputSeparator=``&toPlaceholder=``&includeTVs=``&prepareTVs=`1`&processTVs=``&tvPrefix=`tv.`&where=``&showUnpublished=``&showDeleted=``&showHidden=`1`&hideContainers=``&tpl=`@INLINE <li><a href="{$link}">{$menutitle}</a></li>`&tplCurrent=`@INLINE <li class="active">{$menutitle}</li>`&tplMax=`@INLINE <span>&nbsp;...&nbsp;</span>`&tplHome=`@INLINE <li><a href="{$link}"><i class="fa fa-home"></i></a></li>`&tplWrapper=`@INLINE <ol class="breadcrumb">{$output}</ol>`&wrapIfEmpty=``&showCurrent=`1`&showHome=`1`&showAtHome=`0`&hideSingle=``&direction=`ltr`&scheme=``&useWeblinkUrl=`1`]]' => '<ol class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i></a></li><li class="active">Портфолио</li></ol>',
    '[[ms2Gallery?parents=`11`&resources=``&showLog=``&toPlaceholder=``&tplRow=`pf.row`&tplOuter=`pf.outer`&tplEmpty=`empty`&tplSingle=``&limit=`0`&offset=`0`&where=``&filetype=``&showInactive=``&sortby=`rank`&sortdir=`ASC`&frontend_css=`[[+cssUrl]]web/default.css`&frontend_js=`[[+jsUrl]]web/default.js`&tags=`верстка,дизайн сайта`&tagsVar=``&getTags=`1`&tagsSeparator=`,`]]' => '<ul class="portfolio row">
	<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/stroygrandservis.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/stroygrandservis.jpg" alt="Дизайн для сайта stroygrandservis.ru">
	</div>
	<span><a href="http://stroygrandservis.ru/" target="_blank" rel="nofollow">Дизайн для сайта stroygrandservis.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 layout">
	<div data-fancybox-href="/assets/images/resources/12/narcoblockpost.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/narcoblockpost.jpg" alt="Верстка сайта narcoblockpost.ru">
	</div>
	<span><a href="http://narcoblockpost.ru/" target="_blank" rel="nofollow">Верстка сайта narcoblockpost.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/freki.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/freki.jpg" alt="Дизайн для сайта freki.ru">
	</div>
	<span><a href="http://freki.ru/" target="_blank" rel="nofollow">Дизайн для сайта freki.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 layout">
	<div data-fancybox-href="/assets/images/resources/12/2.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/2.jpg" alt="Верстка srochnaya-narkologiya.ru">
	</div>
	<span><a href="http://srochnaya-narkologiya.ru/" target="_blank" rel="nofollow">Верстка srochnaya-narkologiya.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/svetliachok.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/svetliachok.jpg" alt="Дизайн для сайта svetlyachoc.ru">
	</div>
	<span><a href="http://svetlyachoc.ru/" target="_blank" rel="nofollow">Дизайн для сайта svetlyachoc.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 layout">
	<div data-fancybox-href="/assets/images/resources/12/ongun.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/ongun.jpg" alt="Верстка ongun.ru">
	</div>
	<span><a href="http://ongun.ru/" target="_blank" rel="nofollow">Верстка ongun.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/hiphop.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/hiphop.jpg" alt="Дизайн для сайта hiphop">
	</div>
	<span><a href="" target="_blank" rel="nofollow">Дизайн для сайта hiphop</a></span>
</li>
<li class="col-sm-4 col-xs-12 layout">
	<div data-fancybox-href="/assets/images/resources/12/freki.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/freki.jpg" alt="Верстка freki.ru">
	</div>
	<span><a href="http://freki.ru/" target="_blank" rel="nofollow">Верстка freki.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/lozhki-povorechkiru.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/lozhki-povorechkiru.jpg" alt="Дизайн для сайта lozhki-povorechki.ru">
	</div>
	<span><a href="http://lozhki-povorechki.ru/" target="_blank" rel="nofollow">Дизайн для сайта lozhki-povorechki.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 layout">
	<div data-fancybox-href="/assets/images/resources/12/svetliachok.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/svetliachok.jpg" alt="Верстка svetlyachoc.ru">
	</div>
	<span><a href="http://svetlyachoc.ru/" target="_blank" rel="nofollow">Верстка svetlyachoc.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/razvitie.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/razvitie.jpg" alt="Дизайн для сайта more-experience.net">
	</div>
	<span><a href="http://more-experience.net/" target="_blank" rel="nofollow">Дизайн для сайта more-experience.net</a></span>
</li>
<li class="col-sm-4 col-xs-12 ">
	<div data-fancybox-href="/assets/images/resources/12/4.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/4.jpg" alt="Верстка chastnaya-narkologicheskaya-klinika.ru">
	</div>
	<span><a href="" target="_blank" rel="nofollow">Верстка chastnaya-narkologicheskaya-klinika.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/uslugi-wordpressru.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/uslugi-wordpressru.jpg" alt="">
	</div>
	<span><a href="" target="_blank" rel="nofollow">uslugi-wordpressru</a></span>
</li>
<li class="col-sm-4 col-xs-12 layout">
	<div data-fancybox-href="/assets/images/resources/12/3.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/3.jpg" alt="Верстка pansionat-lozhki.ru">
	</div>
	<span><a href="http://pansionat-lozhki.ru/" target="_blank" rel="nofollow">Верстка pansionat-lozhki.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 layout">
	<div data-fancybox-href="/assets/images/resources/12/stroygrandservis.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/12/stroygrandservis.jpg" alt="Верстка stroygrandservis.ru">
	</div>
	<span><a href="http://stroygrandservis.ru/" target="_blank" rel="nofollow">Верстка stroygrandservis.ru</a></span>
</li>
<li class="col-sm-4 col-xs-12 design">
	<div data-fancybox-href="/assets/images/resources/13/1works-full.jpg" data-fancybox-group="chapter" class="fancybox-thumb" >
		<img src="/assets/images/resources/13/1works-full.jpg" alt="">
	</div>
	<span><a href="" target="_blank" rel="nofollow">1works-full</a></span>
</li></ul>',
    '[[pdoResources?tpl=`tpl_services_home`&returnIds=``&showLog=``&fastMode=``&sortby=`publishedon`&sortbyTV=``&sortbyTVType=``&sortdir=`ASC`&sortdirTV=`ASC`&limit=`8`&offset=`0`&depth=`10`&outputSeparator=`
`&toPlaceholder=``&parents=`5`&includeContent=`1`&includeTVs=`img`&prepareTVs=`1`&processTVs=``&tvPrefix=`tv.`&tvFilters=``&tvFiltersAndDelimiter=`,`&tvFiltersOrDelimiter=`||`&where=``&showUnpublished=``&showDeleted=``&showHidden=`1`&hideContainers=``&context=``&idx=``&first=``&last=``&tplFirst=``&tplLast=``&tplOdd=``&tplWrapper=``&wrapIfEmpty=``&totalVar=`total`&resources=``&tplCondition=``&tplOperator=`==`&conditionalTpls=``&select=``&toSeparatePlaceholders=``&loadModels=``&scheme=``&useWeblinkUrl=``]]' => '<div class="col-md-4">
  <h4><a href="services-and-prices/layout-site.html"><span class="fa fa-code"></span> Верстка сайтов</a></h4>
  <p>Верстка макетов, кроссбраузерная и адаптивная, при помощи HTML5 и BootStrap3.
        <br>
        Делаем переверстку сайтов, переводя старый код на современный.
      </p>  <a href="services-and-prices/layout-site.html" class="button" rel="nofollow">цена и детали</a>
  <span class="bg fa fa-code"></span> 
</div>
<div class="col-md-4">
  <h4><a href="services-and-prices/design-site.html"><span class="fa fa-paint-brush"></span> Дизайн сайта</a></h4>
  <p>Создаем красочные и компактные дизайны, под ваш вкус и стиль!</p>  <a href="services-and-prices/design-site.html" class="button" rel="nofollow">цена и детали</a>
  <span class="bg fa fa-paint-brush"></span> 
</div>
<div class="col-md-4">
  <h4><a href="services-and-prices/programming-cms-modx-revolution.html"><span class="fa fa-file-code-o"></span> Программирование</a></h4>
  <p>Программируем сайты, качественно натягиваем на движки MODX REVOLUTION, WordPress, пишем сниппеты и плагины, а так же создаем шаблоны из уже готовой верстки!</p>  <a href="services-and-prices/programming-cms-modx-revolution.html" class="button" rel="nofollow">цена и детали</a>
  <span class="bg fa fa-file-code-o"></span> 
</div>
<div class="col-md-4">
  <h4><a href="services-and-prices/correct-errors-site.html"><span class="fa fa-bug"></span> Исправление ошибок</a></h4>
  <ul class="dt-sc-fancy-list orange arrow">
        <li>Сдвинуты блоки, кривой вид</li>
        <li>Плохо отображается в браузерах и мобильных</li>
        <li>Исправляем не рабочие скрипты</li>
        <li>Настраиваем функционал сайта</li>
      </ul>  <a href="services-and-prices/correct-errors-site.html" class="button" rel="nofollow">цена и детали</a>
  <span class="bg fa fa-bug"></span> 
</div>
<div class="col-md-4">
  <h4><a href="services-and-prices/support-administration.html"><span class="fa fa-cogs"></span> Администрирование сайтов</a></h4>
  <ul class="dt-sc-fancy-list orange arrow">
        <li>Настройка хостинга</li>
        <li>Настройка домена</li>
        <li>Настройка SSL сертификата и многое другое.</li>
 </ul>  <a href="services-and-prices/support-administration.html" class="button" rel="nofollow">цена и детали</a>
  <span class="bg fa fa-cogs"></span> 
</div>',
    '[[ecMessages?thread=``&threads=`resource-15`&messages=``&subject=``&tpl=`tpl.ecMessages.Row3`&tplWrapper=``&tplEmpty=``&sortby=`date`&sortdir=`DESC`&limit=`10`&showUnpublished=``&showDeleted=``&resourceFields=``&outputSeparator=`
`&toPlaceholder=``&toSeparatePlaceholders=``&showLog=``]]' => '<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Интернет-магазин стройматериалов, исполнительный директор.

Заказывали верстку для интернет-магазина со сложными деталями. Магазин работает в обычной мобильной версиях. В процессе было сделано очень м...</q>
      <cite><a href="contacts.html#ec-resource-15-message-10">Михаил Алексеевич Г.</a></cite>
      <span class="date-time">2015-11-10 21:55:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Салон перманентного макияжа &laquo;Клео&raquo;

Мне нужен был сайт для салона перманентного макияжа, чтобы клиенты могли записаться на консультацию в онлайне. Все было реализовано, включая дизайн, кот...</q>
      <cite><a href="contacts.html#ec-resource-15-message-4">Савина Елена</a></cite>
      <span class="date-time">2015-10-14 23:34:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Верстка лендинга была выполнена в очень короткие сроки &ndash; т.к. проект у меня горел. Что поразило, скорость выполнения совершенно не сказалась на качестве. Сайт прекрасно выглядит во всех браузера...</q>
      <cite><a href="contacts.html#ec-resource-15-message-8">Сергей</a></cite>
      <span class="date-time">2015-10-09 19:03:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Найти хорошего верстальщика очень сложно, и мы рады, что нам это удалось! Компания ArtLenk выполнила все на высоте &ndash; было сверстано несколько макетов в полном соответствии с ТЗ. Рекомендуем к со...</q>
      <cite><a href="contacts.html#ec-resource-15-message-9">Игорь</a></cite>
      <span class="date-time">2015-09-19 19:35:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Идеальный результат был получен за счет того, что в команде ArtLenk мы нашли не только верстальщика, но и дизайнера. В результате была выполнена сложнейшая верстка со множеством дополнительных элемент...</q>
      <cite><a href="contacts.html#ec-resource-15-message-7">Зубарев А.Н.</a></cite>
      <span class="date-time">2015-08-25 19:02:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Я программист и получил именно то, что заказывал. Все сделали точно, логично, можно сказать &ndash; безупречно. Можно в дальнейшем легко вносить изменения в код.</q>
      <cite><a href="contacts.html#ec-resource-15-message-6">Денис А</a></cite>
      <span class="date-time">2015-07-01 20:22:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>До этого много с кем сотрудничали по верстке сайтов. В артленк мы нашли не только верстальщика-профи своего дела, но и JS программиста. В команде работают очень слажено, сроки соблюдаются, можно смело...</q>
      <cite><a href="contacts.html#ec-resource-15-message-5">Светлана</a></cite>
      <span class="date-time">2015-06-25 19:00:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Очень понравилась работа дизайнера в Artlenk. Мы были из таких клиентов, которые сами не до конца понимали, как должен выглядеть итоговый вариант. В процессе обсуждения с дизайнером родился дизайн наш...</q>
      <cite><a href="contacts.html#ec-resource-15-message-3">Рената М.</a></cite>
      <span class="date-time">2015-06-05 15:59:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>С дизайнером ArtLenk у нас почти сразу же возникло взаимопонимание. Уже первые предложения по дизайну были очень близки к тому, как мы видели наш сайт. Потом после небольших дополнений с нашей стороны...</q>
      <cite><a href="contacts.html#ec-resource-15-message-2">Ирина</a></cite>
      <span class="date-time">2015-05-19 23:40:00</span>
    </blockquote>
<blockquote class="item ec-message">
    <div class="ec-stars">
        <span class="rating-5"></span>
    </div>
      <q>Полученный дизайн сайта очень порадовал &ndash; вроде бы и по шаблону, но с добавлением всех нужных нам элементов. Сайт сразу же приобрел индивидуальность, большое спасибо дизайнеру, что сумел так точ...</q>
      <cite><a href="contacts.html#ec-resource-15-message-1">Аркадий</a></cite>
      <span class="date-time">2015-05-11 18:56:00</span>
    </blockquote>',
    '[[pdoResources?tpl=`tpl_mini_news`&returnIds=``&showLog=``&fastMode=``&sortby=`publishedon`&sortbyTV=``&sortbyTVType=``&sortdir=`DESC`&sortdirTV=`ASC`&limit=`3`&offset=`0`&depth=`10`&outputSeparator=`
`&toPlaceholder=``&parents=`16`&includeContent=`1`&includeTVs=``&prepareTVs=`1`&processTVs=``&tvPrefix=`tv.`&tvFilters=``&tvFiltersAndDelimiter=`,`&tvFiltersOrDelimiter=`||`&where=``&showUnpublished=``&showDeleted=``&showHidden=`1`&hideContainers=``&context=``&idx=``&first=``&last=``&tplFirst=``&tplLast=``&tplOdd=``&tplWrapper=``&wrapIfEmpty=``&totalVar=`total`&resources=``&tplCondition=``&tplOperator=`==`&conditionalTpls=``&select=``&toSeparatePlaceholders=``&loadModels=``&scheme=``&useWeblinkUrl=``]]' => '<div class="col-sm-4">
    <div class="wrap">
        <i class="fa fa-newspaper-o"></i>
        <h5><a href="news/4-oktyabrya.html" class="pre-title">Особенный день для нашей команды</a></h5>
        <p>4 октября — особенный день для нашей команды — День рождения руководителя вебстудии artlenlk.ru! А е...</p>
    </div>
</div>
<div class="col-sm-4">
    <div class="wrap">
        <i class="fa fa-newspaper-o"></i>
        <h5><a href="news/den-narodnogo-edinstva.html" class="pre-title">День народного единства</a></h5>
        <p>За последнее столетие наш народ пережил множество перемен, потрясений, общих побед и достижений. Эта...</p>
    </div>
</div>
<div class="col-sm-4">
    <div class="wrap">
        <i class="fa fa-newspaper-o"></i>
        <h5><a href="news/den-interneta-rossii.html" class="pre-title">День Интернета России</a></h5>
        <p>Примечательно, что у российского интернета есть свой день. А у нас есть возможность остановиться и п...</p>
    </div>
</div>',
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
    ),
    'modSnippet' => 
    array (
    ),
    'modTemplateVar' => 
    array (
      'img' => 
      array (
        'fields' => 
        array (
          'id' => 2,
          'source' => 1,
          'property_preprocess' => false,
          'type' => 'fastuploadtv',
          'name' => 'img',
          'caption' => 'Изображение',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'locked' => false,
          'elements' => '',
          'rank' => 0,
          'display' => 'default',
          'default_text' => '',
          'properties' => 
          array (
          ),
          'input_properties' => 
          array (
            'path' => 'assets/images/{d}-{m}-{y}/',
            'prefix' => '{rand}-',
            'MIME' => '',
            'showValue' => 'Нет',
            'showPreview' => 'Да',
            'prefixFilename' => 'Нет',
          ),
          'output_properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
    ),
  ),
);