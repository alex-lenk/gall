<?php
/**
 * Properties German Lexicon Entries for mSearch2
 *
 * @package msearch2
 * @subpackage lexicon
 */

$_lang['mse2_prop_tpl'] = 'Chunk tpl f&uuml;r jede Reihe.';
$_lang['mse2_prop_limit'] = 'Limit f&uuml;r die Anzahl Resultate.';
$_lang['mse2_prop_offset'] = 'An offset of resources returned by the criteria to skip.';
$_lang['mse2_prop_outputSeparator'] = 'Optionale Zeichenkette, um jede tpl Instanz zu voneinander zu trennen.';
$_lang['mse2_prop_toPlaceholder'] = 'Falls nicht leer, wird das Snippet das Resultat in Platzhaltern mit diesem Namen speichern und nicht direkt ausgeben.';
$_lang['mse2_prop_toPlaceholders'] = 'Falls nicht leer, speichert mFilter2 die Daten in Platzhaltern: "filters", "results" and "total" mit dem Prefix, der in diesem Setting angegeben wird. Z.B. &toPlaceholders=`my.` ergibt: [[+my.filters]], [[+my.results]] and [[+my.total]]';
$_lang['mse2_prop_toSeparatePlaceholders'] = 'Funktioniert wie "&toPlaceholders" aber der Platzhalter "filters" erzeugt separate Platzhalter mit dem Namen des Filters. Z.B.: &toSeparatePlaceholders=`my.` und &filters=`tv|test,resource|pagetitle` ergibt folgende Platzhalter: [[+my.results]], [[+my.total]], [[+my.tv|test]] and [[+my.resource|pagetitle]].';
//$_lang['mse2_prop_plPrefix'] = 'Used when placeholders set to global context by modX::setPlaceholder(). For example, snippet mSearch2 set placeolders "query" and "parents", that can be renamed by &queryVar=``, &parentsVar=`` and prefixed by &plPrefix. Parameters "&toPlaceholder" and such ignores this parameter, because there you specify its name.';

$_lang['mse2_prop_returnIds'] = 'Gibt eine komma-separierte Liste mit gefundenen Resourcen IDs zur&uuml;ck.';
$_lang['mse2_prop_showLog'] = 'Zeigt zus&auml;tzliche Angaben &uuml;ber die Arbeitsweise des Snippets an. Nur sichtbar f&uuml;r angemeldete Benutzer im Kontext "mgr".';
$_lang['mse2_prop_fastMode'] = 'Falls eingeschaltet, werden nur Resultate aus der Datenbank angezeigt. Alle MODX-Tags wie Filter oder Snippet-Aufrufe werden entfernt.';

$_lang['mse2_prop_parents'] = 'Komma-separierte Liste von Containern in denen gesucht werden soll. Standardm&auml;ssig ist die Suche auf den aktuellen parent beschr&auml;nkt. Falls auf "0" gesetzt, wird &uuml;ber die ganze Seite gesucht.';
$_lang['mse2_prop_depth'] = 'Integer Wert. Tiefe der Suche ab der Eltern-Resource.';

$_lang['mse2_prop_includeTVs'] = 'Optionale, komma-separierte Liste mit Template Variablen, die eingeschlossen werden. Z.B. ergibt "action,time" folgende Platzhalter [[+action]] and [[+time]].';
$_lang['mse2_prop_tvPrefix'] = 'Prefix f&uuml;r die Template Variblen Platzhalter. Z.B. "tv.". Standardm&auml;ssig leer ""';

$_lang['mse2_prop_where'] = 'Kriterien f&uuml;r einen JSON-Ausdruck, um eine zus&auml;tzliche where-Klausel zu generieren.';
$_lang['mse2_prop_showUnpublished'] = 'Unver&ouml;ffentlichte Resourcen anzeigen.';
$_lang['mse2_prop_showDeleted'] = 'Gel&ouml;schte Resourcen anzeigen.';
$_lang['mse2_prop_showHidden'] = '"Nicht im Menu anzeigen"- Resourcen anzeigen.';
$_lang['mse2_prop_hideContainers'] = 'Container verstecken.';

$_lang['mse2_prop_introCutBefore'] = 'Anzahl der Buchstaben, die im Platzhalter [[+intro]] vor dem gefundnen Suchbegriff angezeigt werden. Standard: "50".';
$_lang['mse2_prop_introCutAfter'] = 'Anzahl der Buchstaben, die im Platzhalter [[+intro]] nach dem gefundnen Suchbegriff angezeigt werden. Standard: "250".';

$_lang['mse2_prop_htagOpen'] = 'Highlight Tag, der vor das gefundene Resultat in [[+intro]] geschrieben wird.';
$_lang['mse2_prop_htagClose'] = 'Highlight Tag, der hinter das gefundene Resultat in [[+intro]] geschrieben wird.';

$_lang['mse2_prop_minQuery'] = 'Minimale L&auml;nge der Suchanfrage';
$_lang['mse2_prop_parentsVar'] = 'Der Name der Variable, f&uuml;r das zus&auml;tzliche Filtern nach Parents. Standard ist "parents". Der Parameter kann mit $_REQUEST gesendet werden..';
$_lang['mse2_prop_queryVar'] = 'Name der Variablen f&uuml;r die Suche $_REQUEST. Standard:"query"';

$_lang['mse2_prop_paginator'] = 'Snippet f&uuml;r die Paginierung. Standard: "getPage".';
$_lang['mse2_prop_element'] = 'Snippet, das f&uuml;r die Ausgabe der Suchresultate aufgerufen wird. Standard: "mSearch2".';
$_lang['mse2_prop_resources'] = 'Komma-separierte Liste von Resourcen f&uuml;r die Ausgabe. Kann zus&auml;tzlich noch mit anderen Parametern gefiltert werden, wie "parents", "showDeleted", "showHidden" and "showUnpublished".';
$_lang['mse2_prop_showEmptyFilters'] = 'Filter anzeigen, auch wenn nur ein Resultat vorliegt.';
$_lang['mse2_prop_sort'] = 'Komma-separierte Liste f&uuml;r die Sortierung der Resourcen. Muss in der folgender Form vorliegen: "table|field:direction". Standard: "resource:publisedon:desc".';
$_lang['mse2_prop_filters'] = 'Komma-separierte Liste mit Filtern. Struktur: "table|field:method". Standard "resource|parent:parents".';
$_lang['mse2_prop_aliases'] = 'Komma-separierte Liste mit Aliases f&uuml;r Filter, die in der URL gebraucht werden. Strukture: "table|field==alias". Beispiel: "resource|parent==category".';
$_lang['mse2_prop_suggestions'] = 'Falls false, wird die gesch&auml;tzte Anzahl Suchresultate nicht mehr neben dem Filter angezeigt.';
$_lang['mse2_prop_suggestionsMaxFilters'] = 'The maximum number of filters, which are preliminary results. If the filter would be more suggestions are turned off.';
$_lang['mse2_prop_suggestionsMaxResults'] = 'The maximum number of resources for which preliminary results of the work. If resources will more suggestions are turned off.';
$_lang['mse2_prop_suggestionsRadio'] = 'Komma-separierte Liste mit Radio-Filtern. Vorschl&auml;ge f&uuml;r die Gruppe von Filtern wird nicht zusammengefasst.';
$_lang['mse2_prop_suggestionsSliders'] = 'Aktivieren Sie die Arbeit der Vorschläge für die Schieberegler. Erhöht die Anzahl der Filtrationen.';

$_lang['mse2_prop_filter_delimeter'] = 'Trenner der Code Names Tables und den Filter-Felderns. Standard "|"';
$_lang['mse2_prop_method_delimeter'] = 'Trenner zwischen Filtername und Prozessmethode. Standard ":';
$_lang['mse2_prop_values_delimeter'] = 'Trenner der Filter in der Adresszeile der Seite. Standard: ","';

$_lang['mse2_prop_tplOuter'] = 'Chunk f&uuml;r den gesamten Block von Filtern und Resultaten.';
$_lang['mse2_prop_tplFilter.outer.default'] = 'Standard chunk einer Filtergruppe.';
$_lang['mse2_prop_tplFilter.row.default'] = 'Standard chunk eines Filters in einer Gruppe. Wird standardm&auml;ssig als checkbox ausgegeben.';

$_lang['mse2_prop_tpls'] = 'Komme separierte Liste von Chunks, die als Reihentemplate zur Verf&uuml;gung stehen. Diese Chunks k&ouml;nnen zugewiesen werden, indem der Parameter "tpl" in $_REQUEST mitgegeben wird. "0" ist der Standardchunk; dann geht es Reihe nach, z.B.: "&tpls=`default,chunk1,chunk2`". Um einen Artikel mit dem Chunk "chunk1" auszugeben, braucht es folgenden Aufruf "$_REQUEST[tpl] = 1".';
$_lang['mse2_prop_tplWrapper'] = 'Name des Chunks der als Wrapper Template dient. Platzhalter: [[+output]], [[+total]], [[+query]] and [[+parents]].';
$_lang['mse2_prop_wrapIfEmpty'] = 'Falls true, wird der in &tplWrapper angegebene wrapper aufgerufen. Auch wenn das Resultat leer ist.';
$_lang['mse2_prop_forceSearch'] = 'Falls true werden Suchresultate mit einer leeren Suchanfrage angezeigt.';

$_lang['mse2_prop_tplForm'] = 'Chunk, der das Formular beinhaltet.';
$_lang['mse2_prop_autocomplete'] = 'Konfiguration der Autovervollst&auml;ndigung. Optionen sind: "results" - f&uuml;r die Suche wird das Snippet verwendet, das im Argument "element" angegeben wurde; "queries" - Tabellensuche durch Abfragen; "0" - Autovervollst&auml;ndigung ausschalten.';
$_lang['mse2_prop_pageId'] = 'ID der Zielseite, die durch die Suche aufgerufen wird. Standardm&auml;ssig ist dies die aktuelle Seite.';

$_lang['mse2_prop_fields'] = 'List of indexed fields of the resource to search for. Each field you can specify the search weight through colon.';
$_lang['mse2_prop_onlyIndex'] = 'Suche nach indexierten Worten ohne Zusatz von Bonuspunkten f&uuml;r die exakte Entsprechung. Es ist eine einfache Suche mit "LIKE".';
$_lang['mse2_prop_onlyAllWords'] = 'Zeige nur Resourcen, in denen alle Worte der Suchanfrage vorkommen.';
$_lang['mse2_prop_showSearchLog'] = 'Zeigt detaillierte Angaben zur Suche, falls "&showLog=`1`.';

$_lang['mse2_prop_filterOptions'] = 'JSON Zeichenkette mit Variablen f&uuml;r den javascript Filter. Z.B. {"pagination":"#mse2_pagination", "selected_values_delimeter":", "}';

$_lang['mse2_prop_ajaxMode'] = 'Art der AJAX Paginierung: "default", "button" or "scroll".';
$_lang['mse2_prop_cacheTime'] = 'Zeitdauer der Filter-Zwischenspeicherung f&uuml;r die aktuell ausgew&auml;hlte Resource.';