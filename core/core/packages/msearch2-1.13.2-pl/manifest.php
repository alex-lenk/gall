<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for mSearch2.

1.13.2-pl
==============
- Fixed sort placeholder in outer chunk.

1.13.1-pl
==============
- Updated chunks for Bootstrap 4.

1.13.0-pl
==============
- [mFilter2] MS2 filters now respects system plugins to change price and weight of products. Can be disabled by "noPreciseMSFilters".
- [mFilter2] Better support of pdoPage\'s "pageLinkScheme" parameter.
- Respect "scriptProperties" when calling pdoFetch in the action.php. Now you can specify "elementsPath" for mSearchForm, for example.

1.12.3-pl
==============
- [mFilter2] Another slider improvements.

1.12.2-pl
==============
- Fixed bug with reset second input in numbers slider.
- Fixed saving values and position of numbers slider on page load.
- Fixed reset of mFilter2 service parameters: "tpl", "limit" and "sort".

1.12.1-pl
==============
- Returned back fix from version 1.11.5

1.12.0-pl
==============
- Improved support of MODX 2.7.
- Removed unnecessary files.
- Minimum version is MODX 2.3.

1.11.5-pl
==============
- Fixed work of SimpleSearch algorithm when there are no bulk words found.

1.11.4-pl
==============
- Ability to use &onlyIndex with default search algorithm.

1.11.3-pl
==============
- Fixed processing of additional parameters in ajax search.

1.11.2-pl
==============
- Improved queries filtering.

1.11.1-pl
==============
- Update schema to work with utf8mb4.

1.11.0-pl
==============
- [mFilter2] Added ability to filter by search string with ajax.
- [mSearchForm] Fixed error with javascript, when snippet called on page with disabled autocomplete.

1.10.8-pl
==============
- [mFilter2] Ability to limit search results with &parents.

1.10.7-pl
==============
- [mFilter2] Fixed the status of the slider after loading the page by a direct link

1.10.6-pl
==============
- Little fixes.

1.10.5-pl
==============
- [mFilter2] Fixed loading of the custom filtering class if the core path is outside the base path.

1.10.4-pl
==============
- [mFilter2] Improved work with cyrillic symbols.
- [mFilter2] Fixed not needed XHR request on use of back button in Safari.

1.10.3-pl
==============
- [mFilter2] Fixed possible javascript bug when there is "+" sign in the name of filter.
- [mSearch2] Prevent duplicates in index.

1.10.2-pl
==============
- [mFilter2] Improved time of building filters from search results.
- [mFilter2] Improved work with raw number fields at frontend.

1.10.1-pl
==============
- [mFilter2] Improved work of HistoriAPI in Safari.

1.10.0-pl
==============
- Slider now can change values according to fetched items until user change it.
- Fixed cache issues of Slider in Chrome when user loaded page with back button.

1.9.3-pl
==============
- Fixed work of javascript sliders after open filters by saved url.
- Improved search string sanitization.

1.9.2-pl
==============
- Some fixes in default javascript.
- Natural sort in filters by default.
- Added German lexicon (thanks to Fabian Christen)

1.9.1-pl
==============
- [mSearch2] Fixed the indexing of arrays values, like "color" in msProduct.

1.9.0-pl
==============
- [mFilter2] Fixed bug with an empty TV name for zero values.
- [mSearch2] Improved logic of a search aliases.
- [mSearch2] Fixed work of &showSearchLog parameter.

1.8.4-pl
==============
- Added rawurldecode to decode search query on some servers.

1.8.3-pl
==============
- Fixed possible bug with unselected numeric checkbox filters on page reload.

1.8.2-pl
==============
- Possible XSS fixes.

1.8.1-pl
==============
- Added support of a numeric fields without a sliders.

1.8.0-pl
==============
- Ability to use {core_path} placeholder in &customPath option.
- Fixed bug with case-sensitive ms2 products options.
- Removed third parameter from mSearch2 class constructor.
- Fixed bug with short search queries in manager.
- Fixed a little javascript bug with slider.
- Added automatic support of decimals in slider.
- Updated jQueryUI to version 1.12.1.

1.7.3-pl
==============
- [mSearch2] Improved compatibility with MySQL 5.7.

1.7.2-pl
==============
- [mFilter2] Added encoding of url to support special symbols like percentage.

1.7.1-pl
==============
- Some security fixes.

1.7.0-pl
==============
- [mFilter2] Fixed processing of the link with multiple sort options.
- [mFilter2] Updated jQuery UI to version 1.12.1.

1.6.8-pl
==============
- [mFilter2] Fixed double submit of the form.

1.6.7-pl
==============
- [mFilter2] Fixed the reset of inactive option in the select.
- [mFilter2] Fixed default option chunk.

1.6.6-pl
==============
- [mFilter2] Improved handling of radio inputs in the default javascript.

1.6.5-pl
==============
- [mFilter2] Improved behavior of "reset" button.
- [mFilter2] Fixed history navigation when you returning back to the first page.

1.6.4-pl
==============
- Another improvements of compatibility with PHP 7.

1.6.3-pl
==============
- Ability to override javascript autoLoad property.

1.6.2-pl
==============
- Fixed work of the &showEmptyFilters parameter with "categories", "parents" and "grandparents" filters.

1.6.1-pl
==============
- Improved compatibility with PHP 7.

1.6.0-pl
==============
- [mFilter2] Improved support of ms2 product options.
- [mFilter2] All filter methods are receives the name of field to work.

1.5.16-pl
==============
- [mFilter2] Added parameter "cacheTime".
- [mFilter2] Cache disabled by default.
- [mFilter2] The support of dots in the names of filters.

1.5.15 pl
==============
- Improved compatibility with PHP 7.1.
- Fixed passing of Fenom tags into intro text of resources.

1.5.14 pl
==============
- Fixed error in default javascript under IE9.

1.5.13 pl
==============
- Fixed model for MySQL 5.7.

1.5.12 pl
==============
- [mFilter2] Categories filters are now uses menutitle if not empty.

1.5.11 pl
==============
- [mFilter2] Fixed some bugs with url params with ajaxMode == button or scroll.
- [mFilter2] Improved support of multibyte characters.

1.5.10 pl
==============
- Fixed issues with pdoTools 2.3.4.
- [mSearch2] Added parameter &toSeparatePlaceholders.

1.5.9 pl
==============
- Improved load of pdoTools.
- [mFilter2] Trim TVs values.

1.5.8 pl
==============
- [mFilter2] Fixed small bug with disabling filters when there are no results.

1.5.7 pl
==============
- [mSearch2] Fixed work of &toPlaceholder with &returnIds.

1.5.6 pl
==============
- [mFilter2] Fixed insert of suggestions in "option" tag with brackets in text.
- [mFilter2] Improved filter "boolean".

1.5.5 pl1
==============
- Fixed static plugin

1.5.5 pl
==============
- [mFilter2] Fixed wrong form submission when mSearch2.autoLoad is false.

1.5.4 pl
==============
- [mFilter2] Added parameter &ajaxMode: default, scroll or button.
- [mFilter2] Added support of pdoTitle with enabled &registerJs.

1.5.3 pl
==============
- [mFilter2] Fixed rare bug with empty results when there is no filters and &toSeparatePlaceholders enabled.

1.5.2 pl
==============
- [mSearch2] Added system events mse2OnBeforeSearchIndex and mse2OnSearchIndex.

1.5.1 pl
==============
- [mSearch2] Fixed work of search aliases.

1.5.0 pl
==============
- [mSearch2] New search algorithm.

1.4.3 pl
==============
- [mSearch2] A small adjustment of default search settings.
- [mSearch2] New snippet parameter &onlyAllWords.

1.4.2 pl
==============
- [mFilter2] Fixed bug with filter on not first page.

1.4.1 pl
==============
- [mFilter2] Fixed boolean filter.
- [mFilter2] Fixed bug with clear button right after page load.
- [mFilter2] Support of disabled friendly urls.
- [mFilter2] Improved "You have selected" element.
- [mFilter2] New parameter &filterOptions for overwrite javascript config.
- [mFilter2] Added support for default values of TVs.
- [mSearch2] Index processor can parse JSON in TVs.

1.4.0 pl
==============
- [#32] [mFilter2] Support of History Api.
- [#31] [mFilter2] Added clear button.
- Ability to send requests to another page without ajax.

1.3.9 pl
==============
- Ability to use several pagination elements.

1.3.8 pl
==============
- Base support of miniShop2.3 without SKU.

1.3.7 pl
==============
- Fixed some warnings in system log.
- [#39] Added option &showSearchLog for enabled &showLog.
- [#38] Fixed placeholder "weight" of snippet mSearch2 when it used inside mFilter2.

1.3.6 pl
==============
- [mFilter2] Fixed bug with wrong suggestions on page reload.

1.3.5 pl
==============
- [mFilter2] Fixed handling of quotes in filters.

1.3.4 pl
==============
- [mFilter2] Improved boolean filter.

1.3.3 pl1
==============
- Updated version of pdoTools in the installer.

1.3.2 pl1
==============
- [mSearch2] Added new system option "mse2_index_all".
- [mSearch2] Added new system option "mse2_index_split_words".

1.3.1 pl
==============
- [mFilter2] Fixed "filter_key" placeholder in outer chunks.

1.3.0 pl
==============
- [mFilter2] Added filters "month" and "day".
- [mFilter2] Ability to use one field multiple times in filters.
- [mFilter2] Improved suggestions for more optimal processing.
- [mFilter2] Ability to set aliases for filters.
- [mFilter2] Aliases used for templates names.
- [mFilter2] Fixed suggestions for dates filters.
- [mFilter2] Fixed &showEmptyFilters in dates filters.

1.2.7 pl
==============
- [mFilter2] Fixed search with &parents parameter.

1.2.6 pl
==============
- [mSearch2] Improved simple search for additional bonuses.

1.2.5 pl
==============
- [#34] [mSearchForm] Fixed &autocomplete=`0`.

1.2.4 pl1
==============
- [mFilter2] Fixed adding new filters from build methods.
- [mFilter2] Fixed possible E_NOTICE.

1.2.3 pl2
==============
- [#33] [mFilter2] Fixed build of TVs filters.
- [mFilter2] Fixed limit on search.
- [mFilter2] Fixed displaying of empty filters on page.

1.2.2 pl
==============
- [mFilter2] Fixed display order of specified &filters.
- [Main] Removed register of jQuery on frontend.

1.2.1 pl
==============
- [mFilter2] Added support of "autotag" TVs.

1.2.0 pl
==============
- [mFilter2] Added triggering of jQuery event "mse2_load".
- [mFilter2] Added support of pdoTools 1.10.
- [mFilter2] Added filter "decimal".
- [mFilter2] Fixed default javascript for decimal values in slider.
- [mFilter2] Fixed search in filter.

1.2.0 rc1
==============
- [mFilter2] Ability to add new filters from build methods.
- [mFilter2] Support of special options of miniShop2 products in "key==value" format.

1.1.5 pl1
==============
- [#11] Added support of msVendor.
- Improved processing of tags in quick search.

1.1.4 pl1
==============
- Fixed pagination links in ajax requests.

1.1.3 pl
==============
- Improved indexing manager page.

1.1.2 pl
==============
- [mSearch2] Fixed parameter &toPlaceholder.

1.1.1 pl
==============
- Changed sort of parents filters to menuindex.
- Fixed autocomplete when unpublished resources are found.
- Fixed retrieving of resource fields.

1.1.0 pl
==============
- Improved search index and algorithm.
- Ability to specify indexed fields for search by parameter &fields=``.
- Ability to disable additional results by LIKE search by parameter &onlyIndex=``.
- Fixed loading Font Awesome.
- Added support of AjaxManager.
- [#30] [mSearch2] Added "not found" message when results are limited by snippet parameters.
- [#29] Returned lost button "Remove all queries".
- [#27] Added ability to specify properties set in element and paginator name.
- [#25] Added select filters.
- [#24] [mFilter2] Added filtering of negative numbers in slider.
- [#23] Added placeholder "results" to &toSeparatePlaceholders=`1` mode.
- Fixed ajax filtering with &toSeparatePlaceholders=`1`.
- Improved snippet mSearch2 when &returnIds=`1`.

1.0.4 pl
==============
- Improved UI for MODX 2.3.
- Added Font Awesome icons.
- Added ability to install new dictionary by double click on grid row.
- Improved chunks.

1.0.3 pl
==============
- [#21] Added support filtering by date for TV of type date.
- [#20] All templates of filters are converted to lowercase.

1.0.2 pl
==============
- [#14] Changed build filters methods.
- Fixed E_NOTICE in mFilter2.

1.0.1 pl
==============
- [#14] Added passing of the filter name in the method of build.
- Improved support of TVs with type "listbox" and "tag".
- Do not call highlight method on search results if query is empty.

1.0.0 pl1
==============
- [#10] [mFilter2] Fixed bug with sort in Safari and Firefox.
- [#9] [mFilter2] Added set of placeholder "mse2_filters_count".
- Improved load if pdoFetch class.
- Fixed possible incorrect characters in the English dictionary.
- Added manager page with dictionaries.
- Added new snippet "mSearchForm" with autocomplete.
- Improved registering of frontend scripts.
- Fixed replacement of aliases in the search query.
- Improved javascript slider
- Fixed overwriting parameters &sortby and &sortdir. Parameter &sort has priority.

1.0.0 beta2
==============
- Fixed [[+total]] placeholder for new pdoPage versions.
- More convenient suggestions.
- Added filter "grandparents".
- Added ability to update chunks on package upgrade.
- Added manager page with words aliases.
- Added manager page with search queries.
- Improved mSearch2::Search() for aliases support.
- Improved mSearch2::Highlight() for more exact cutting of text.
- Enabling of parameter "showLog" of snippets displays also log of search.
- Added system parameter "like_match_bonus".
- Fixed possible warnings when word from dictionary has incorrect symbols.

0.9.1 pl2
==============
- Improved verification of search query.
- [mSearch2] Parameter "forceSearch" enabled by default.

0.9.0 pl
==============
- [mFilter2] Changed default &paginator=`` to "pdoPage".
- [mFilter2] Improved filtration of conditions for retrieve resources. Now it handle end snippet with parameter &returnIds=`1`.
- [mSearch2] Optimized for last version of pdoTools.
- [mSearch2] Added parameter "forceSearch" to specify whether or not to show list of resources without search query.
- Improved javascript. Hide of block "limit" when no results.
- Improved speed of mseFiltersHandler2::filterDate().
- Default chunks support Bootstrap3.
- Fixed context switch in action.php

0.8.4 pl
==============
- Added filter by year of document. For example: "publishedon:year".
- Improved search algorithm, when there is only one word in query.
- Improved buildParentsFilter(). Now it works for parents from different contexts.
- Added support of placeholders [^q^] and [^qt^].

0.8.3 pl2
==============
- Improved check of "limit" parameter.

0.8.3 pl2
==============
- Returned missed function "implode_r" into index processor.

0.8.3 pl1
==============
- [mSearch2] Improved search algorithm.
- [mFilter2] Fixed processing parameters of snippet.

0.8.2 pl1
==============
- [mFilter2] If no results, message about it will be returned in "&tplOuter=``".

0.8.2 pl
==============
- [mFilter2] Fixed work with MS2 multicategories.
- [mFilter2] Improved working with search results.
- [mSearch2] Improved search algorithm.

0.8.1 pl1
==============
- [mFilter2] Improved work with modified &queryVar=`` and &parentsVar=``.
- [mFilter2] Improved return of error messages, when nothing found.
- [mFilter2] Improved work with limit, when page loaded by direct link.
- [mFilter2] Improved sort links.
- [mFilter2] Array with config for frontend is now available as placeholders with prefix "mse2_". E.g. [[+mse2_start_sort]], [[+mse2_tpls]] etc.

0.8.0 pl
==============
- [#7] You can prefix ids in "&resources=``" and "&parents=``" with dash for excluding from query.
- [#5] Added parameter "&toSeparatePlaceholders=``" to snippet mFilter2. Parameter "&toPlaceholder" renamed to "&toPlaceholders".
- Fixed issues when parents not in current contexts.
- Added parameter "&hideContainers=``" to both snippets.
- Added parameters "&tplWrapper=``" and "&wrapIfEmpty=``" to snippet mSearch2.
- Accelerated method mse2FiltersHandler::filterNumber().
- Fixed bug in filters, when TVs has capital letters in the name.
- [mFilter2] Added default implementation of "limit" parameter.
- [mFilter2] Added default implementation of range slider.
- [mFilter2] Added default implementation of list of selected inputs.
- Method "mSearch2.load()" in default javascript can receive filter parameters and callback function.

0.7.0 pl
==============
- Added support for list-style TVs.
- Fixed issues with pdoTools installation.

0.6.2 pl2
==============
- [mFilter2] New parameter "tpls" for change tpl of rows in request.
- [mFilter2] Fixed warning in log when no MS2 installed.
- [mFilter2] Fixed cache problem when retrieving products in multicategories, again.

0.6.1 pl
==============
- [mFilter2] Added support of old browsers without history api. They will use hash in url.

0.6.1 rc1
==============
- Added method mse2FiltersHandler::buildCategoriesFilter().
- Added method mse2FiltersHandler::buildFullnameFilter().
- Added ability to work with mSearch1 for smooth upgrade.
- Fixed bug with installation when "archive_with" setting is enabled.
- Improved work with MS2 multi categories.
- Fixed sort of filter values in ascending order.

0.6.0 beta
==============
- System setting "mse2_index_min_words_length" is set to 4 by default, for exclude prepositions.
- Numbers with length >= 2 are always in search, no matter what set in "mse2_index_min_words_length".
- Now mSearch2::getSuggestions() can be overloaded in class mse2FiltersHandler.
- [mFilter2] Added support for MS2 multi categories.
- [mFilter2] Added support for specify limit.
- [mFilter2] Added parameter "toPlaceholder".
- [mFilter2] Parameter "disableSuggestions" is now boolean "suggestions".
- [mFilter2] Added parameter "suggestionsMaxResults" for disable suggestions when too many results.
- [mFilter2] Added parameter "suggestionsMaxFilters" for disable suggestions when too many filters.
- [mFilter2] Added parameter "suggestionsRadio" for radio filters.
- [mFilter2] Added chunk "tpl.mFilter2.filter.radio".
- [mFilter2] Added parameters: "filter_delimeter", "method_delimeter" and "values_delimeter".
- [mFilter2] Added saving of weight of found resources, if used snippet mSearch2 for display items.
- [mSearch2] Parameter "resources" now can take a JSON string with id as a key, and weight as a value.
- [mSearch2] Added total number of filter operations in log.
- Speed improvements.

0.5.1 pl2
==============
- Fixed work with "&includeTVs" when snippet mFilter2 calls snippet mSearch2.
- Added verification for non existing filter methods.
- Filter speed improvements.

0.5.1 pl1
==============
- Added excluding not searchable resources from index.
- Small improvements of default javascript.

0.5.1 beta2
==============
- Added msFiltersHandler::getMsOptionValues() method. You can use &filters=`msoption|size,msoption|color` now.
- Added update of main filter log on ajax requests, if enabled.
- Added parameter "disableSuggestions" for very fast filtration. if enabled, you will not see small numbers next to the filter parameters.
- Improved indexing. It is recommended to update the search index manually.

0.5.0 beta2
==============
- Added snippet mFilter2
- Added default javascript
- Added default css

0.4.0 beta
==============
- Improved search algorithm. Added %LIKE% search for words, that was not found in index.
- Improved highlight of search results for %LIKE% results.

0.3.0 beta1
==============
- Fixed snippet offset bug

0.3.0 beta
==============
- Improved search algorithm
- Improved highlight of search results
- Improved search snippet

0.2.0
==============
- Added manager pages
- Added indexing plugin

0.1.0
==============
- Initial release with relevant morphological search.',
    'license' => 'GNU GENERAL PUBLIC LICENSE
   Version 2, June 1991
--------------------------

Copyright (C) 1989, 1991 Free Software Foundation, Inc.
59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

Everyone is permitted to copy and distribute verbatim copies
of this license document, but changing it is not allowed.

Preamble
--------

  The licenses for most software are designed to take away your
freedom to share and change it.  By contrast, the GNU General Public
License is intended to guarantee your freedom to share and change free
software--to make sure the software is free for all its users.  This
General Public License applies to most of the Free Software
Foundation\'s software and to any other program whose authors commit to
using it.  (Some other Free Software Foundation software is covered by
the GNU Library General Public License instead.)  You can apply it to
your programs, too.

  When we speak of free software, we are referring to freedom, not
price.  Our General Public Licenses are designed to make sure that you
have the freedom to distribute copies of free software (and charge for
this service if you wish), that you receive source code or can get it
if you want it, that you can change the software or use pieces of it
in new free programs; and that you know you can do these things.

  To protect your rights, we need to make restrictions that forbid
anyone to deny you these rights or to ask you to surrender the rights.
These restrictions translate to certain responsibilities for you if you
distribute copies of the software, or if you modify it.

  For example, if you distribute copies of such a program, whether
gratis or for a fee, you must give the recipients all the rights that
you have.  You must make sure that they, too, receive or can get the
source code.  And you must show them these terms so they know their
rights.

  We protect your rights with two steps: (1) copyright the software, and
(2) offer you this license which gives you legal permission to copy,
distribute and/or modify the software.

  Also, for each author\'s protection and ours, we want to make certain
that everyone understands that there is no warranty for this free
software.  If the software is modified by someone else and passed on, we
want its recipients to know that what they have is not the original, so
that any problems introduced by others will not reflect on the original
authors\' reputations.

  Finally, any free program is threatened constantly by software
patents.  We wish to avoid the danger that redistributors of a free
program will individually obtain patent licenses, in effect making the
program proprietary.  To prevent this, we have made it clear that any
patent must be licensed for everyone\'s free use or not licensed at all.

  The precise terms and conditions for copying, distribution and
modification follow.


GNU GENERAL PUBLIC LICENSE
TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION
---------------------------------------------------------------

  0. This License applies to any program or other work which contains
a notice placed by the copyright holder saying it may be distributed
under the terms of this General Public License.  The "Program", below,
refers to any such program or work, and a "work based on the Program"
means either the Program or any derivative work under copyright law:
that is to say, a work containing the Program or a portion of it,
either verbatim or with modifications and/or translated into another
language.  (Hereinafter, translation is included without limitation in
the term "modification".)  Each licensee is addressed as "you".

Activities other than copying, distribution and modification are not
covered by this License; they are outside its scope.  The act of
running the Program is not restricted, and the output from the Program
is covered only if its contents constitute a work based on the
Program (independent of having been made by running the Program).
Whether that is true depends on what the Program does.

  1. You may copy and distribute verbatim copies of the Program\'s
source code as you receive it, in any medium, provided that you
conspicuously and appropriately publish on each copy an appropriate
copyright notice and disclaimer of warranty; keep intact all the
notices that refer to this License and to the absence of any warranty;
and give any other recipients of the Program a copy of this License
along with the Program.

You may charge a fee for the physical act of transferring a copy, and
you may at your option offer warranty protection in exchange for a fee.

  2. You may modify your copy or copies of the Program or any portion
of it, thus forming a work based on the Program, and copy and
distribute such modifications or work under the terms of Section 1
above, provided that you also meet all of these conditions:

    a) You must cause the modified files to carry prominent notices
    stating that you changed the files and the date of any change.

    b) You must cause any work that you distribute or publish, that in
    whole or in part contains or is derived from the Program or any
    part thereof, to be licensed as a whole at no charge to all third
    parties under the terms of this License.

    c) If the modified program normally reads commands interactively
    when run, you must cause it, when started running for such
    interactive use in the most ordinary way, to print or display an
    announcement including an appropriate copyright notice and a
    notice that there is no warranty (or else, saying that you provide
    a warranty) and that users may redistribute the program under
    these conditions, and telling the user how to view a copy of this
    License.  (Exception: if the Program itself is interactive but
    does not normally print such an announcement, your work based on
    the Program is not required to print an announcement.)

These requirements apply to the modified work as a whole.  If
identifiable sections of that work are not derived from the Program,
and can be reasonably considered independent and separate works in
themselves, then this License, and its terms, do not apply to those
sections when you distribute them as separate works.  But when you
distribute the same sections as part of a whole which is a work based
on the Program, the distribution of the whole must be on the terms of
this License, whose permissions for other licensees extend to the
entire whole, and thus to each and every part regardless of who wrote it.

Thus, it is not the intent of this section to claim rights or contest
your rights to work written entirely by you; rather, the intent is to
exercise the right to control the distribution of derivative or
collective works based on the Program.

In addition, mere aggregation of another work not based on the Program
with the Program (or with a work based on the Program) on a volume of
a storage or distribution medium does not bring the other work under
the scope of this License.

  3. You may copy and distribute the Program (or a work based on it,
under Section 2) in object code or executable form under the terms of
Sections 1 and 2 above provided that you also do one of the following:

    a) Accompany it with the complete corresponding machine-readable
    source code, which must be distributed under the terms of Sections
    1 and 2 above on a medium customarily used for software interchange; or,

    b) Accompany it with a written offer, valid for at least three
    years, to give any third party, for a charge no more than your
    cost of physically performing source distribution, a complete
    machine-readable copy of the corresponding source code, to be
    distributed under the terms of Sections 1 and 2 above on a medium
    customarily used for software interchange; or,

    c) Accompany it with the information you received as to the offer
    to distribute corresponding source code.  (This alternative is
    allowed only for noncommercial distribution and only if you
    received the program in object code or executable form with such
    an offer, in accord with Subsection b above.)

The source code for a work means the preferred form of the work for
making modifications to it.  For an executable work, complete source
code means all the source code for all modules it contains, plus any
associated interface definition files, plus the scripts used to
control compilation and installation of the executable.  However, as a
special exception, the source code distributed need not include
anything that is normally distributed (in either source or binary
form) with the major components (compiler, kernel, and so on) of the
operating system on which the executable runs, unless that component
itself accompanies the executable.

If distribution of executable or object code is made by offering
access to copy from a designated place, then offering equivalent
access to copy the source code from the same place counts as
distribution of the source code, even though third parties are not
compelled to copy the source along with the object code.

  4. You may not copy, modify, sublicense, or distribute the Program
except as expressly provided under this License.  Any attempt
otherwise to copy, modify, sublicense or distribute the Program is
void, and will automatically terminate your rights under this License.
However, parties who have received copies, or rights, from you under
this License will not have their licenses terminated so long as such
parties remain in full compliance.

  5. You are not required to accept this License, since you have not
signed it.  However, nothing else grants you permission to modify or
distribute the Program or its derivative works.  These actions are
prohibited by law if you do not accept this License.  Therefore, by
modifying or distributing the Program (or any work based on the
Program), you indicate your acceptance of this License to do so, and
all its terms and conditions for copying, distributing or modifying
the Program or works based on it.

  6. Each time you redistribute the Program (or any work based on the
Program), the recipient automatically receives a license from the
original licensor to copy, distribute or modify the Program subject to
these terms and conditions.  You may not impose any further
restrictions on the recipients\' exercise of the rights granted herein.
You are not responsible for enforcing compliance by third parties to
this License.

  7. If, as a consequence of a court judgment or allegation of patent
infringement or for any other reason (not limited to patent issues),
conditions are imposed on you (whether by court order, agreement or
otherwise) that contradict the conditions of this License, they do not
excuse you from the conditions of this License.  If you cannot
distribute so as to satisfy simultaneously your obligations under this
License and any other pertinent obligations, then as a consequence you
may not distribute the Program at all.  For example, if a patent
license would not permit royalty-free redistribution of the Program by
all those who receive copies directly or indirectly through you, then
the only way you could satisfy both it and this License would be to
refrain entirely from distribution of the Program.

If any portion of this section is held invalid or unenforceable under
any particular circumstance, the balance of the section is intended to
apply and the section as a whole is intended to apply in other
circumstances.

It is not the purpose of this section to induce you to infringe any
patents or other property right claims or to contest validity of any
such claims; this section has the sole purpose of protecting the
integrity of the free software distribution system, which is
implemented by public license practices.  Many people have made
generous contributions to the wide range of software distributed
through that system in reliance on consistent application of that
system; it is up to the author/donor to decide if he or she is willing
to distribute software through any other system and a licensee cannot
impose that choice.

This section is intended to make thoroughly clear what is believed to
be a consequence of the rest of this License.

  8. If the distribution and/or use of the Program is restricted in
certain countries either by patents or by copyrighted interfaces, the
original copyright holder who places the Program under this License
may add an explicit geographical distribution limitation excluding
those countries, so that distribution is permitted only in or among
countries not thus excluded.  In such case, this License incorporates
the limitation as if written in the body of this License.

  9. The Free Software Foundation may publish revised and/or new versions
of the General Public License from time to time.  Such new versions will
be similar in spirit to the present version, but may differ in detail to
address new problems or concerns.

Each version is given a distinguishing version number.  If the Program
specifies a version number of this License which applies to it and "any
later version", you have the option of following the terms and conditions
either of that version or of any later version published by the Free
Software Foundation.  If the Program does not specify a version number of
this License, you may choose any version ever published by the Free Software
Foundation.

  10. If you wish to incorporate parts of the Program into other free
programs whose distribution conditions are different, write to the author
to ask for permission.  For software which is copyrighted by the Free
Software Foundation, write to the Free Software Foundation; we sometimes
make exceptions for this.  Our decision will be guided by the two goals
of preserving the free status of all derivatives of our free software and
of promoting the sharing and reuse of software generally.

NO WARRANTY
-----------

  11. BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY
FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW.  EXCEPT WHEN
OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES
PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED
OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.  THE ENTIRE RISK AS
TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU.  SHOULD THE
PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING,
REPAIR OR CORRECTION.

  12. IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR
REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES,
INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING
OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED
TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY
YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER
PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE
POSSIBILITY OF SUCH DAMAGES.

---------------------------
END OF TERMS AND CONDITIONS',
    'readme' => '--------------------
mSearch2
--------------------
Author: Vasily Naumkin <bezumkin@yandex.ru>
--------------------

Feel free to suggest ideas/improvements/bugs on GitHub:
http://github.com/bezumkin/mSearch2/issues',
    'chunks' => 
    array (
      'tpl.mSearch2.row' => '<div class="mse2-row">
    {$idx}. <a href="{$uri}" class="search-link">{$pagetitle}</a>
    {if $weight}
        ({\'mse2_weight\' | lexicon}: {$weight})
    {/if}
    {if $intro}
        <p>{$intro}</p>
    {/if}
</div>',
      'tpl.mSearch2.form' => '<form action="{$pageId | url}" method="get" class="msearch2" id="mse2_form">
    <div class="input-group">
        <input type="text" class="form-control" name="{$queryVar}" value="{$mse2_query}"
               placeholder="{\'mse2_search\' | lexicon}"/>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                {\'mse2_search_submit\' | lexicon}
            </button>
        </div>
    </div>
</form>

',
      'tpl.mSearch2.ac' => '<div class="mse2-ac-item">
    {$idx}. {$pagetitle}
    {if $weight}
        <span class="mse2-ac-weight">
			<small>{\'mse2_weight\' | lexicon}: {$weight}</small>
		</span>
    {/if}
    {if $intro}
        <br>
        <small>{$intro}</small>
    {/if}
</div>',
      'tpl.mFilter2.outer' => '<div class="row msearch2" id="mse2_mfilter">
    <div class="col-md-3">
        <form action="{$_modx->resource.id | url}" method="post" id="mse2_filters">
            <div>
                {$filters}
            </div>
            {if $filters}
                <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btn-light hidden">{\'mse2_reset\' | lexicon}</button>
                    <button type="submit" class="btn btn-primary hidden">{\'mse2_submit\' | lexicon}</button>
                </div>
            {/if}
        </form>

        <br/><br/>
        <div class="form-group">
            <label for="mse2_limit">{\'mse2_limit\' | lexicon}</label>
            <select name="mse_limit" id="mse2_limit" class="form-control">
                {foreach [10, 25, 50, 100] as $v}
                    <option value="{$v}"{if $limit == $v} selected{/if}>{$v}</option>
                {/foreach}
            </select>
        </div>
    </div>

    <div class="col-md-9">
        <h3>{\'mse2_filter_total\' | lexicon} <span id="mse2_total">{$total ?: 0}</span></h3>
        <div class="row">
            <div id="mse2_sort" class="col-md-6">
                {\'mse2_sort\' | lexicon}
                <a href="#" data-sort="resource|publishedon"
                   data-dir="{if $sort == \'resource|publishedon:desc\'}desc{/if}" data-default="desc" class="sort">
                    {\'mse2_sort_publishedon\' | lexicon} <span></span>
                </a>
            </div>

            {if $tpls}
                <div id="mse2_tpl" class="col-md-6">
                    <a href="#" data-tpl="0" class="{$tpl0}">{\'mse2_chunk_default\' | lexicon}</a> /
                    <a href="#" data-tpl="1" class="{$tpl1}">{\'mse2_chunk_alternate\' | lexicon}</a>
                </div>
            {/if}
        </div>

        <div id="mse2_selected_wrapper">
            <div id="mse2_selected">
                {\'mse2_selected\' | lexicon}:<span></span>
            </div>
        </div>

        <div id="mse2_results">
            {$results}
        </div>

        <div class="mse2_pagination">
            {\'page.nav\' | placeholder}
        </div>
    </div>
</div>',
      'tpl.mFilter2.filter.outer' => '{var $key = $table ~ $delimeter ~ $filter}
<fieldset id="mse2_{$key}">
    <h4 class="filter_title">{(\'mse2_filter_\' ~ $table ~ \'_\' ~ $filter) | lexicon}</h4>
    {$rows}
</fieldset>',
      'tpl.mFilter2.filter.slider' => '<fieldset id="mse2_{$table ~ $delimeter ~ $filter}">
    <h4 class="filter_title">{(\'mse2_filter_\' ~ $table ~ \'_\' ~ $filter) | lexicon}</h4>
    <div class="mse2_number_slider"></div>
    <div class="mse2_number_inputs row">
        {$rows}
    </div>
</fieldset>',
      'tpl.mFilter2.filter.select' => '{var $key = $table ~ $delimeter ~ $filter}
<fieldset id="mse2_{$key}">
    <h4 class="filter_title">{(\'mse2_filter_\' ~ $table ~ \'_\' ~ $filter) | lexicon}</h4>
    <select name="{$filter_key}" id="{$key}_0" class="form-control">
        <option value="" selected>{\'mse2_select\' | lexicon}</option>
        {$rows}
    </select>
</fieldset>',
      'tpl.mFilter2.filter.checkbox' => '{var $key = $table ~ $delimeter ~ $filter}
<label for="mse2_{$key}_{$idx}" class="{$disabled}">
    <input type="checkbox" name="{$filter_key}" id="mse2_{$key}_{$idx}" value="{$value}" {$checked} {$disabled}/>
    <span>{$title}</span>&nbsp;<sup>{$num}</sup>
</label><br/>',
      'tpl.mFilter2.filter.number' => '{var $key = $table ~ $delimeter ~ $filter}
<div class="col-md-6">
    <label for="mse2_{$key}_{$idx}" class="d-flex align-items-center">
        {$title}
        <input type="text" name="{$filter_key}" id="mse2_{$key}_{$idx}" value="{$value}"
               data-current-value="{$current_value}" class="form-control ml-1"/>
    </label>
</div>',
      'tpl.mFilter2.filter.radio' => '{var $key = $table ~ $delimeter ~ $filter}
<label for="mse2_{$key}_{$idx}" class="{$disabled}">
    <input type="radio" name="{$filter_key}" id="mse2_{$key}_{$idx}" value="{$value}" {$checked} {$disabled}/>
    <span>{$title}</span>&nbsp;<sup>{$num}</sup>
</label><br/>',
      'tpl.mFilter2.filter.option' => '<option value="{$value}" {$selected} {$disabled} class="{$disabled}">{$title}&nbsp;({$num})</option>',
    ),
    'setup-options' => 'msearch2-1.13.2-pl/setup-options.php',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '14b40b0cc24df8a62890fb880675da59',
      'native_key' => 'msearch2',
      'filename' => 'modNamespace/2da05a9790a52ad727d4d9cd38aac51d.vehicle',
      'namespace' => 'msearch2',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOFileVehicle',
      'class' => 'xPDOFileVehicle',
      'guid' => 'f09628cc368b1a4fd3c7da1016713cb0',
      'native_key' => 'f09628cc368b1a4fd3c7da1016713cb0',
      'filename' => 'xPDOFileVehicle/65496206557cb8d369439e21ab13bdbb.vehicle',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'encryptedVehicle',
      'class' => 'modCategory',
      'guid' => 'd8b05dea0fd56ac7b6f1a4bb40c84fb5',
      'native_key' => 1,
      'filename' => 'modCategory/9e7e0ce91a5be6ab54de5ccc5c5f2eae.vehicle',
      'namespace' => 'msearch2',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'dfd0fa8243a853c9356514d66bb1ce05',
      'native_key' => 'mse2_frontend_css',
      'filename' => 'modSystemSetting/9bb47f410e21ef392d7bf9751b8f853a.vehicle',
      'namespace' => 'msearch2',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '6a30c5ba8c60cd49c5f09690a68718f3',
      'native_key' => 'mse2_frontend_js',
      'filename' => 'modSystemSetting/d8cc156958ddd9ce36a738537096178d.vehicle',
      'namespace' => 'msearch2',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '2f566849ccba45e66831a987bb47e626',
      'native_key' => 'mse2_index_fields',
      'filename' => 'modSystemSetting/e5101240882753dc3abbe91a59aa6f90.vehicle',
      'namespace' => 'msearch2',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '7dd9c2d7e7f2156b591bc8bbc482222b',
      'native_key' => 'mse2_index_comments',
      'filename' => 'modSystemSetting/3c587eeb3950dbecf4302e5788fd8cb0.vehicle',
      'namespace' => 'msearch2',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '47d401a71c541b9afb573c32366c7274',
      'native_key' => 'mse2_index_comments_weight',
      'filename' => 'modSystemSetting/936556c863694b9d64da9c7acfd40b9d.vehicle',
      'namespace' => 'msearch2',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9e41aa9b10de96151efa601515ab974c',
      'native_key' => 'mse2_index_min_words_length',
      'filename' => 'modSystemSetting/2bbc683d559cf7b2ceb773235eaabf4a.vehicle',
      'namespace' => 'msearch2',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4db2dacc92c1886ae9d89d64124fb8f8',
      'native_key' => 'mse2_index_all',
      'filename' => 'modSystemSetting/bf40349fd546162f32b47d9064721ae1.vehicle',
      'namespace' => 'msearch2',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'e1a4f4cf8c57f1d02615cfbdc15ea52a',
      'native_key' => 'mse2_index_split_words',
      'filename' => 'modSystemSetting/cc098735c9f320393fc23c05cd4e6c72.vehicle',
      'namespace' => 'msearch2',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4ea4ab3244fb15e184707ab1df3e50c0',
      'native_key' => 'mse2_search_exact_match_bonus',
      'filename' => 'modSystemSetting/747db6f8fc344806f1b30ef90d4c6fc8.vehicle',
      'namespace' => 'msearch2',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '132c00a4979385495ba034c056a814b9',
      'native_key' => 'mse2_search_all_words_bonus',
      'filename' => 'modSystemSetting/59d78db5021f161c3e1f361ae62fbfa5.vehicle',
      'namespace' => 'msearch2',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '21ea50f06f8b7ae70f24090ec1bc5f80',
      'native_key' => 'mse2_search_like_match_bonus',
      'filename' => 'modSystemSetting/99ffafce2dd6cbceb55fc88f72aa9be9.vehicle',
      'namespace' => 'msearch2',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '82f0777ce07514129331e41f5f66f00f',
      'native_key' => 'mse2_search_split_words',
      'filename' => 'modSystemSetting/1dfd2ac24757b73c5a49eb7250f54b80.vehicle',
      'namespace' => 'msearch2',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '85bf86e32a867efeabc40e06c5fa4268',
      'native_key' => 'mse2_old_search_algorithm',
      'filename' => 'modSystemSetting/56bcb18925e8b2ce6616bd7a1681a6b4.vehicle',
      'namespace' => 'msearch2',
    ),
    16 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '3a0ed182f2dd72a95606802218901966',
      'native_key' => 'mse2_filters_handler_class',
      'filename' => 'modSystemSetting/8ab25fc68e5ca3fbf5ef48ce9cf58bdd.vehicle',
      'namespace' => 'msearch2',
    ),
    17 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '4dc78fb0827e2753e7b94215a06b06ed',
      'native_key' => 'mse2OnBeforeSearchIndex',
      'filename' => 'modEvent/1397c57a79b0352f024d233a0c818017.vehicle',
      'namespace' => 'msearch2',
    ),
    18 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '71d77ee7ca42efb3a2a4fb16b9732f17',
      'native_key' => 'mse2OnSearchIndex',
      'filename' => 'modEvent/72432b7820c0b0ffefcf3d8f7e39da28.vehicle',
      'namespace' => 'msearch2',
    ),
    19 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => '37aa11f54e4f0bdb36ba4a33450a217f',
      'native_key' => 'msearch2',
      'filename' => 'modMenu/7e67bc5928bc5ad3da0f6e48dc450e89.vehicle',
      'namespace' => 'msearch2',
    ),
    20 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOScriptVehicle',
      'class' => 'xPDOScriptVehicle',
      'guid' => '9836c70ae2fff79156d762938fb77246',
      'native_key' => '9836c70ae2fff79156d762938fb77246',
      'filename' => 'xPDOScriptVehicle/cb6ddb66a21c17dbf3285de00f496a4b.vehicle',
      'namespace' => 'msearch2',
    ),
  ),
);