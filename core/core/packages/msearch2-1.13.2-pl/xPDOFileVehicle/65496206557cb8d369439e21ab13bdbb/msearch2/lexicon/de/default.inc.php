<?php
/**
 * Default German Lexicon Entries for mSearch2
 *
 * @package msearch2
 * @subpackage lexicon
 */

include_once 'setting.inc.php';

$_lang['msearch2'] = 'mSearch2';
$_lang['mse2_menu_desc'] = 'Sucheinstellungen f&uuml;r die Seite';
$_lang['mse2_tab_search'] = 'Suche';
$_lang['mse2_tab_search_intro'] = 'Testen der Suche auf der Seite';
$_lang['mse2_tab_index'] = 'Index';
$_lang['mse2_tab_index_intro'] = 'Verwaltung des Suchindexes';
$_lang['mse2_tab_queries'] = 'Suchanfragen';
$_lang['mse2_tab_queries_intro'] = 'Hier werden die Suchanfragen dieser Seite angezeigt. Falls viele irrelevante Anfragen auftauchen, muss evt. die Einstellung f&uuml;r die Indexierung angepasst oder Aliase eingef&uuml;gt werden.';
$_lang['mse2_tab_aliases'] = 'Aliases';
$_lang['mse2_tab_aliases_intro'] = 'Hier k&ouml;nnen Aliase hinzugef&uuml;gt werden, die in der Suche abgebildet werden. Ein Alias kann ein Wort ersetzen/erg&auml;nzen oder dazu benutzt werden, um Fehler bei der Suchanfrage zu korrigieren (z.B. "wiskas" &rarr; "whiskas")';
$_lang['mse2_tab_dictionaries'] = 'W&ouml;rterb&uuml;cher';
$_lang['mse2_tab_dictionaries_intro'] = 'Installation der ben&ouml;tigten W&ouml;rterb&uuml;cher aus der angebotenen Liste. Damit mSearch2 normal funktioniert, muss mind. ein W&ouml;rterbuch installiert sein. Wenn die W&ouml;rterb&uuml;cherliste ge&auml;ndert wurde, muss der Index neu erstellt werden.';

$_lang['mse2_err_no_query'] = 'Suchbegriff ist leer.';
$_lang['mse2_err_no_query_var'] = 'Kein Suchbegriff.';
$_lang['mse2_err_min_query'] = 'Suchwort ist zu kurz.';
$_lang['mse2_err_no_results'] = 'Keine Resultate.';

$_lang['mse2_search'] = 'Suche auf Seite';
$_lang['mse2_search_clear'] = 'L&ouml;schen';
$_lang['mse2_intro'] = 'Vorschau';
$_lang['mse2_weight'] = 'Gewichtung';
$_lang['mse2_show_unpublished'] = 'Unver&ouml;ffentlicht';
$_lang['mse2_show_deleted'] = 'Gel&ouml;scht';

$_lang['mse2_index_create'] = 'Index updaten';
$_lang['mse2_index_clear'] = 'Index l&ouml;schen';

$_lang['mse2_index_total'] = 'Total Seiten';
$_lang['mse2_index_indexed'] = 'Seiten im Index';
$_lang['mse2_index_words'] = 'Worte im Index';
$_lang['mse2_index_limit'] = 'Seitenlimit f&uuml;r Indexerstellung';
$_lang['mse2_index_offset'] = 'Seitenversatz (offset)';

$_lang['mse2_filter_resource_isfolder'] = 'Container';
$_lang['mse2_filter_resource_class_key'] = 'Dokumentenklasse (class key)';
$_lang['mse2_filter_ms_price'] = 'Preis';
$_lang['mse2_filter_ms_vendor'] = 'Verk&auml;ufer';
$_lang['mse2_filter_ms_new'] = 'Neu';
$_lang['mse2_filter_resource_parent'] = 'Kategorie';
$_lang['mse2_filter_boolean_yes'] = 'Ja';
$_lang['mse2_filter_boolean_no'] = 'Nein';
$_lang['mse2_filter_number_min'] = 'von';
$_lang['mse2_filter_number_max'] = 'bis';
$_lang['mse2_filter_total'] = 'Total Anzahl:';
$_lang['mse2_filter_msoption_color'] = 'Farben';
$_lang['mse2_filter_msoption_size'] = 'Gr&ouml;ssen';

$_lang['mse2_filter_month_01'] = 'Januar';
$_lang['mse2_filter_month_02'] = 'Februar';
$_lang['mse2_filter_month_03'] = 'M&auml;rz';
$_lang['mse2_filter_month_04'] = 'April';
$_lang['mse2_filter_month_05'] = 'Mai';
$_lang['mse2_filter_month_06'] = 'Juni';
$_lang['mse2_filter_month_07'] = 'Juli';
$_lang['mse2_filter_month_08'] = 'August';
$_lang['mse2_filter_month_09'] = 'September';
$_lang['mse2_filter_month_10'] = 'Oktober';
$_lang['mse2_filter_month_11'] = 'November';
$_lang['mse2_filter_month_12'] = 'Dezember';

$_lang['mse2_sort'] = 'Sortieren nach:';
$_lang['mse2_sort_asc'] = 'aufsteigend';
$_lang['mse2_sort_desc'] = 'absteigend';
$_lang['mse2_sort_publishedon'] = 'Ver&ouml;ffentlicht am';
$_lang['mse2_sort_price'] = 'Preis';
$_lang['mse2_limit'] = 'Display on page';
$_lang['mse2_select'] = 'Aus Liste ausw&auml;hlen';
$_lang['mse2_selected'] = 'Auswahl';
$_lang['mse2_reset'] = 'Zur&uuml;cksetzen';
$_lang['mse2_submit'] = 'Abschicken';
$_lang['mse2_more'] = 'Lade mehr';

$_lang['mse2_err_no_filters'] = 'Nichts zu filtern';

$_lang['mse2_chunk_default'] = 'Standardansicht';
$_lang['mse2_chunk_alternate'] = 'Alternative Ansicht';

$_lang['mse2_query'] = 'Suche';
$_lang['mse2_query_quantity'] = 'Anzahl Suchen';
$_lang['mse2_query_found'] = 'Anzahl Resultate';
$_lang['mse2_query_remove'] = 'Suchanfrage entfernen';
$_lang['mse2_query_remove_all'] = 'Alle Suchanfragen entfernen';
$_lang['mse2_query_remove_all_confirm'] = 'Alle Suchanfragen entfernen? Diese Aktion kann nicht r&uuml;ckg&auml;ngig gemacht werden.';
$_lang['mse2_query_search'] = 'Suchen nach Suchbegriff';

$_lang['mse2_alias'] = 'Alias';
$_lang['mse2_alias_word'] = 'Quellwort';
$_lang['mse2_alias_replace'] = 'Ersetzen';
$_lang['mse2_alias_create'] = 'Alias hinzuf&uuml;gen';
$_lang['mse2_alias_update'] = 'Alias aktualisieren';
$_lang['mse2_alias_remove'] = 'Alias entfernen';
$_lang['mse2_alias_search'] = 'Suchen nach Alias';
$_lang['mse2_alias_err_rq'] = 'Dieses Feld ist zwingend';
$_lang['mse2_alias_err_eq'] = 'Alias ist identisch mit Wort';
$_lang['mse2_alias_err_ae'] = 'Alias "[[+alias]]" existiert bereits f&uuml;r das Wort "[[+word]]".';

$_lang['mse2_dictionary'] = 'W&ouml;rterbuh';
$_lang['mse2_language'] = 'Sprache';
$_lang['mse2_dictionary_installed'] = 'Installiert';
$_lang['mse2_dictionary_russian'] = 'Russisch';
$_lang['mse2_dictionary_english'] = 'Englisch';
$_lang['mse2_dictionary_german'] = 'Deutsch';
$_lang['mse2_dictionary_ukrainian'] = 'Ukrainisch';
$_lang['mse2_dictionary_estonian'] = 'Estonisch';
$_lang['mse2_dictionary_install'] = 'W&ouml;rterbuch installieren';
$_lang['mse2_dictionary_remove'] = 'W&ouml;rterbuch entfernen';
$_lang['mse2_dictionary_mirror'] = 'Sourceforge Spiegelserver';
$_lang['mse2_dictionary_mirror_select'] = 'Option w&auml;hlen';
$_lang['mse2_dictionary_err_ns'] = 'Kein W&ouml;rterbuch ausgew&auml;hlt';
