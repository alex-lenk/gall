<?php
/**
* Settings german Lexicon Entries for mSearch2
*
* @package msearch2
* @subpackage lexicon
*/

$_lang['area_mse2_main'] = 'Hauptbereich';
$_lang['area_mse2_search'] = 'Suche';
$_lang['area_mse2_index'] = 'Index';

$_lang['setting_mse2_index_fields'] = 'Indexfelder';
$_lang['setting_mse2_index_fields_desc'] = 'Einstellung welche Felder indexiert werden. Die Gewichtung kann nach einem Doppelpunkt eingegeben werden. Template Variablen m&uuml;ssen dem Prefix "tv_" angegeben werden. Beispiel. "pagetitle:3,tv_color:1".';
$_lang['setting_mse2_index_comments'] = 'Indexkommentare';
$_lang['setting_mse2_index_comments_desc'] = 'Falls auf "Ja" und falls das Extra "Tickets" eingesetzt wird, werden die Kommentare von Resourcen ebenfalls indexiert.';
$_lang['setting_mse2_index_comments_weight'] = 'Gewichtung der Worte im Kommentar';
$_lang['setting_mse2_index_comments_weight_desc'] = 'Kommentareworte k&ouml;nnen gewichtet werden. Standardeinstellung ist "1".';
$_lang['setting_mse2_index_min_words_length'] = 'Minimall&auml;nge der W&ouml;rter';
$_lang['setting_mse2_index_min_words_length_desc'] = 'Minimall&auml;nge der W&ouml;rter, die indexiert werden sollen. Standardeinstellung: "4".';
$_lang['setting_mse2_index_all'] = 'F&uuml;ge alle Worte dem Index hinzu';
$_lang['setting_mse2_index_all_desc'] = 'Diese Option f&uuml;gt alle Worte dem Index hinzu, auch wenn sie in keinem W&ouml;rterbuch vorkommen.';
$_lang['setting_mse2_index_split_words'] = 'Worttrenner im Index';
$_lang['setting_mse2_index_split_words_desc'] = 'Regul&auml;rer Ausdruck f&uuml;r die php Funktion preg_split(), die den indexierten Text in W&ouml;rter aufsplitet. Nicht &auml;ndern, wenn Du nicht weisst, was Du tust.';
$_lang['setting_mse2_search_exact_match_bonus'] = 'Bonus f&uuml;r exakten Treffen';
$_lang['setting_mse2_search_exact_match_bonus_desc'] = 'Gibt die Anzahl Punkte an, wenn ein Suchbegriff genau gefunden wurde. Standard ist "5".';
$_lang['setting_mse2_search_like_match_bonus'] = 'Bonus f&uuml;r ungef&auml;hren Treffer';
$_lang['setting_mse2_search_like_match_bonus_desc'] = 'Gibt die Anzahl Punkte an, wenn ein Suchbegriff ungef&auml;hr ("like") gefunden wurde.Standard ist "3".';
$_lang['setting_mse2_search_all_words_bonus'] = 'Bonus f&uuml;r ganzes Wort';
$_lang['setting_mse2_search_all_words_bonus_desc'] = 'Wenn ein Suchbegriff aus mehreren W&ouml;rtern besteht und alle von diesen in der Resource gefunden wurden, gibt es Extrapunkte. Standard: "5".';
$_lang['setting_mse2_search_split_words'] = 'Worttrenner im Suchbegriff';
$_lang['setting_mse2_search_split_words_desc'] = 'Regul&auml;rer Ausdruck f&uuml;r die php Funktion preg_split(), die den Suchbegriff in W&ouml;rter aufsplitet. Standardm&auml;ssig werden die W&ouml;rter beim Leerschlag getrennt';
$_lang['setting_mse2_old_search_algorithm'] = 'Alter Suchalgorithmus';
$_lang['setting_mse2_old_search_algorithm_desc'] = 'Alter Suchalgorithmus aktivieren, der umso mehr Resultate anzeigt, je mehr W&ouml;rter in Suchanfrage sind.';

$_lang['setting_mse2_filters_handler_class'] = 'Filters handler class';
$_lang['setting_mse2_filters_handler_class_desc'] = 'Name der Klasse, die die Logik der Filterung implementiert. Standard ist "mse2FiltersHandler".';

$_lang['setting_mse2_frontend_css'] = 'Frontend Stile';
$_lang['setting_mse2_frontend_css_desc'] = 'Pfad zur Datei mit den Stilen (CSS) des Shops. Fall eigene gew&uuml;nscht sind, k&ouml;nnen diese hier angegeben werden. Falls leer, m&uuml;ssen die eigenen Stile &uuml;ber das Seitentemplate geladen werden.';
$_lang['setting_mse2_frontend_js'] = 'Frontend Skripte';
$_lang['setting_mse2_frontend_js_desc'] = 'Pfad zur Datei mit den Skripten (JS) des Shops. Fall eigene gew&uuml;nscht sind, k&ouml;nnen diese hier angegeben werden. Falls leer, m&uuml;ssen die eigenen Stile &uuml;ber das Seitentemplate geladen werden.';
