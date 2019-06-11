<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for easyComm.

1.9.2-pl (27.05.2019)
==============
- Добавлен параметр validateEmail к сниппету ecForm. Указывает о необходимости проверки поля user_email на корректность введенного значения.

1.9.1-pl (01.04.2019)
==============
- Добавлен параметр itemReviewed к сниппету ecThreadRating для корректного формирования микроразметки (AggregateRating)

1.9.0-pl (06.03.2019)
==============
- Добавлена политика доступа easyCommPolicy
- Подстановка в шаблонные ответы полей сообщения, например "Добрый день, {$user_name}"

1.8.6-pl (04.02.2019)
==============
- Прямая ссылка на сообщение в письме менеджеру (через параметр ecmessage)
- Wysiwyg редактор в поле Ответ в панели управления (отключаемый)

1.8.5-pl (29.01.2019)
==============
- Возможность настраивать фильтры в списке сообщений в панели управления (настройка ec_message_grid_filters)
- Удалено modAction при создании меню

1.8.2-pl (21.01.2019)
==============
- Исправлено Nan в сниппете ecThreadRating (деление на 0)

1.8.1-pl (16.01.2019)
==============
- Добавлены шаблоны для быстрых ответов (системная настройка ec_use_reply_templates)

1.7.2-pl (09.01.2019)
==============
- Исправлена ошибка в сниппете ecThreadRating при вызове метода getVotes
- Изображение звездочек перенесено в css (base64)

1.7.0-pl (26.12.2018)
==============
- Добавлено отображение расширенного рейтинга в сниппете ecThreadRating
- Исправлена не работающая опция перезаписи чанков при обновлении компонента

1.6.0-pl (18.12.2018)
==============
- Добавлена поддержка в ядро компонента множественных полей рейтинга

1.5.2-pl (19.11.2018)
==============
- Уменьшена длина поля name у объекта ecThread, т.к. были проблемы с созданием индекса по полю на некоторых серверах
- Увеличена длина поля IP для возможности сохранения ipv6

1.5.1-pl (25.06.2018)
==============
- Микроразметка AggregateRating для сниппета ecThreadRating
- Исправлена ошибка в передаче параметров в ecMessages при работе через Fenom

1.5.0-pl (24.05.2018)
==============
- Перевод чанков на шаблонизатор Fenom
- Интегрирован механизм защиты дополнения
- Добавлена вкладка История в окне редактирования Сообщения
- Fix ширины поля с прикрепленным изображением
- Поддержка произвольного Media Source в easyComm.utils.renderImage (параметр source)

1.4.3-pl (19.07.2017)
==============
- Исправлено поведение сниппета ecThreadRating при отсутствующем в базе объекте ecThread
- Убрана лишняя инициализация pdoTools в сниппетах

1.4.2-pl (04.07.2017)
==============
- Значения по-умолчанию для некоторых полей сообщения (thread) и цепочки (resource, name) при создании из панели управления
- Возможность указать значение рейтинга по-умолчанию при создании нового сообщения в панели управления (просто создайте настройку ec_rating_default = X)

1.4.0-pl (19.06.2017)
==============
- Новый параметр messages у сниппета ecMessages, в котором можно указать id конкретных сообщений

1.3.3-pl (19.06.2017)
==============
- В тексте письма менеджеру адрес панели управления теперь берется из системных настроек

1.3.2-pl (29.05.2017)
==============
- Добавлена поддержка Google ReCaptcha v2 для защиты от спама

1.3.1-pl (17.03.2017)
==============
- Графическое отображение рейтинга в админке, с возможностью отключения

1.3.0-pl (25.01.2017)
==============
- Добавлен en лексикон (спасибо Grigoriy Kolenko)
- Переключение контекста при запросах к action.php
- idx в сниппете ecMessages теперь привязан к idx от pdoTools, нумерация идет с 1, а не с 0
- Процессоры редактирования/удаления объектов теперь наследуются от modObjectUpdateProcessor и modObjectRemoveProcessor
- Добавлены события OnBeforeEcThreadRemove и OnEcThreadRemove

1.2.9-pl (19.01.2017)
==============
- Исправлена ошибка с пользовательским leftJoin в ecMessages

1.2.8-pl
==============
- Отключена перезапись чанков в скрипте установки
- Добавлен параметр resourceFields в сниппет ecMessages

1.2.7-pl
==============
- Добавлен параметр mailManager к сниппету ecForm

1.2.6-pl
==============
- Добавлена колонка Ресурс в списке сообщений в панели управления

1.2.5-pl
==============
- Поддержка Gravatar в сниппете ecMessages

1.2.4-pl
==============
- В сниппете ecForm для отоборажения чанка формы теперь используется $pdoTools
- Исправлена критическая ошибка при указании параметра tplWrapper в сниппете ecMessages
- Добавлена функция "Посмотреть сообщение на сайте" в административной части

1.2.3-pl1
==============
- Исправлен баг при использовании tplWrapper, связанный с передачей данных в чанк, где фигурировала переменная $thread

1.2.3-pl
==============
- Добавлен сниппет ecMessagesCount

1.2.2-pl
==============
- Добавлен параметр $threads к сниппету ecMessages, позволяющий выводить сообщения из нескольких цепочек

1.2.1-pl
==============
- Добавлена настройка auto_reply_author - автоматическое заполнение поля Автор ответа

1.2.0-pl
==============
- Добавлены вспомогательные методы в utils.js для работы с дополнительными полями-изображениями
- События на действия с сообщениями для возможности написания плагинов

1.1.3-pl
==============
- Добавлен параметр tplEmpty к сниппету cMessages

1.1.2-pl
==============
- Ошибка с непрописанным formId в html
- Замена $ на jQuery для избежания проблем с jQuery.noConflict()

1.1.1-pl
==============
- Возможность автопубликации сообщений
- Поддержка авторизованных пользователей в сниппете ecForm

1.1.0-pl
==============
- Устранена ошибка при редактировании цепочки сообщений

1.1.0-beta
==============
- Исправлено форматирование даты в окне редактирования сообщения
- Возврат потерянного поля thread_name в списке сообщений

1.1.0-beta
==============
- Возможность настройки отображения списка колонок при просмотре списка сообщений и цепочек сообщений
- Возможность настройки отображение разметкой окна редактировани сообщения и цепочки
- Интегрирована система плагинов для добавления полей сообщениям (ecMessage)

1.0.4-beta2
==============
- Добавлено поле IP адрес к объекту ecMessage
- Добавлена Оценка к Сообщениям
- Автоматический подсчет средней Оценки для Цепочки по 2-м алгоритмам: Средняя и Вильсон

1.0.2-beta1
==============
- Исправлена критическая ошибка, возникающая при установке пакета

1.0.0-beta
==============
- First version',
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
easyComm
--------------------
Author: Alexey Naumov <alexei@createit.ru>
--------------------

Компонент предназначен для создания на сайтах таких модулей, как отзывы, комментарии, вопросы пользователей.

Название easyComm произошло от Easy Communication, или Easy Comments, кому как больше нравится.

Компонент позволяет пользователям сайта через специальную форму оставить свое сообщение/отзыв/вопрос,
а администратор увидит их в панели управления сайтом, сможет опубликовать сообщение,
удалить его или оставить свой ответ.',
    'chunks' => 
    array (
      'tpl.ecMessages.Row' => '<div id="ec-{$thread_name}-message-{$id}" class="ec-message">
    <p><strong>{$user_name}</strong><span class="ec-message__date"> {$date | dateAgo}</span></p>
    <div class="ec-stars">
        <span class="rating-{$rating}"></span>
    </div>
    <p>{$text}</p>
    {if $reply_text}
    <div class="ec-message__reply">
        {if $reply_author}
        <p><strong>{$reply_author}</strong></p>
        {/if}
        <p>{$reply_text}</p>
    </div>
    {/if}
</div>
',
      'tpl.ecForm' => '<h2>{\'ec_fe_message_add\' | lexicon}</h2>
<form class="form well ec-form" method="post" role="form" id="ec-form-{$fid}" data-fid="{$fid}" action="">
    <input type="hidden" name="thread" value="{$thread}">

    <div class="form-group ec-antispam">
        <label for="ec-{$antispam_field}-{$fid}" class="control-label">{\'ec_fe_message_antismap\' | lexicon}</label>
        <input type="text" name="{$antispam_field}" class="form-control" id="ec-{$antispam_field}-{$fid}" value="" />
    </div>

    <div class="form-group">
        <label for="ec-user_name-{$fid}" class="control-label">{\'ec_fe_message_user_name\' | lexicon}</label>
        <input type="text" name="user_name" class="form-control" id="ec-user_name-{$fid}" value="{$user_name}" />
        <span class="ec-error help-block" id="ec-user_name-error-{$fid}"></span>
    </div>

    <div class="form-group">
        <label for="ec-user_email-{$fid}" class="control-label">{\'ec_fe_message_user_email\' | lexicon}</label>
        <input type="text" name="user_email" class="form-control" id="ec-user_email-{$fid}" value="{$user_email}" />
        <span class="ec-error help-block" id="ec-user_email-error-{$fid}"></span>
    </div>

    <div class="form-group">
        <label for="ec-user_contacts-{$fid}" class="control-label">{\'ec_fe_message_user_contacts\' | lexicon}</label>
        <input type="text" name="user_contacts" class="form-control" id="ec-user_contacts-{$fid}" value="{$user_contacts}" />
        <span class="ec-error help-block" id="ec-user_contacts-error-{$fid}"></span>
    </div>

    <div class="form-group">
        <label for="ec-subject-{$fid}" class="control-label">{\'ec_fe_message_subject\' | lexicon}</label>
        <input type="text" name="subject" class="form-control" id="ec-subject-{$fid}" value="{$subject}" />
        <span class="ec-error help-block" id="ec-subject-error-{$fid}"></span>
    </div>

    <div class="form-group">
        <label for="ec-rating-{$fid}" class="control-label">{\'ec_fe_message_rating\' | lexicon}</label>
        <input type="hidden" name="rating" id="ec-rating-{$fid}" value="{$rating}" />
        <div class="ec-rating ec-clearfix" data-storage-id="ec-rating-{$fid}">
            <div class="ec-rating-stars">
                <span data-rating="1" data-description="{\'ec_fe_message_rating_1\' | lexicon}"></span>
                <span data-rating="2" data-description="{\'ec_fe_message_rating_2\' | lexicon}"></span>
                <span data-rating="3" data-description="{\'ec_fe_message_rating_3\' | lexicon}"></span>
                <span data-rating="4" data-description="{\'ec_fe_message_rating_4\' | lexicon}"></span>
                <span data-rating="5" data-description="{\'ec_fe_message_rating_5\' | lexicon}"></span>
            </div>
            <div class="ec-rating-description">{\'ec_fe_message_rating_0\' | lexicon}</div>
        </div>
        <span class="ec-error help-block" id="ec-rating-error-{$fid}"></span>
    </div>

    <div class="form-group">
        <label for="ec-text-{$fid}" class="control-label">{\'ec_fe_message_text\' | lexicon}</label>
        <textarea type="text" name="text" class="form-control" rows="5" id="ec-text-{$fid}">{$text}</textarea>
        <span class="ec-error help-block" id="ec-text-error-{$fid}"></span>
    </div>

    {$recaptcha}

    <div class="form-actions">
        <input type="submit" class="btn btn-primary" name="send" value="{\'ec_fe_send\' | lexicon}" />
    </div>
</form>
<div id="ec-form-success-{$fid}"></div>',
      'tpl.ecForm.ReCaptcha' => '<div class="form-group">
    <div class="ec-captcha" id="ec-captcha-{$fid}"></div>
    <span class="ec-error help-block" id="ec-captcha-error-{$fid}"></span>
</div>',
      'tpl.ecForm.Success' => '<div class="alert alert-success" role="alert">
    {\'ec_fe_send_success\' | lexicon}
</div>',
      'tpl.ecForm.New.Email.User' => 'Здравствуйте, {$user_name}!
<br />
Вы оставили сообщение на сайте {\'site_url\' | option}:
<br />
<br />
<div style="white-space:pre;background: #f0f0f0;padding: 10px;border: solid 1px #eee;">{$text}</div>
<br /><br />
Ваше сообщение будет опубликовано после проверки администратором.
<br />
<br />
С уважением, {\'site_name\' | option}.',
      'tpl.ecForm.New.Email.Manager' => 'На сайте {\'site_url\' | option} было оставлено новое сообщение:
<br />
<br />
Автор: <span style="font-weight: bold">{$user_name}</span>
<br/>
Электронная почта: <span style="font-weight: bold">{$user_email}</span>
<br/>
Контактная информация: <span style="font-weight: bold">{$user_contacts}</span>
<br/>
<br/>
Тема сообщения: <span style="font-weight: bold">{$subject}</span>
<br/>
Оценка: <span style="font-weight: bold">{$rating}</span>
<br/>
Текст сообщения:
<br/>
<br/>
<div style="white-space:pre;background: #f0f0f0;padding: 10px;border: solid 1px #eee;">{$text}</div>
<br /><br />
Сообщение было оставлено на странице <a target="_blank" href="{$resource_id | url : [\'scheme\' => \'full\']}">{$resource_pagetitle}</a>
<br />
<br />
<a target="_blank" href="{$site_manager_url}?a=resource/update&id={$resource_id}&ecmessage={$id}">Опубликовать или ответить на сообщение &gt;</a>',
      'tpl.ecForm.Update.Email.User' => 'Здравствуйте, {$user_name}!
<br />
Вы оставляли сообщение на сайте {\'site_url\' | option}:
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
        Ваше сообщение с ответом на него опубликовано <a href="{$resource_id | url : [\'scheme\' => \'full\']}#message-{$id}">здесь</a>.
    {else}
        Ваше сообщение было опубликовано. Вы можете его просмотреть <a href="{$resource_id | url : [\'scheme\' => \'full\']}#message-{$id}">здесь</a>.
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
С уважением, {\'site_name\' | option}.',
      'tpl.ecThreadRating' => '<div class="ec-stars" title="{$rating_wilson}" itemscope itemtype="http://schema.org/AggregateRating">
    <meta itemprop="itemReviewed" content="{($itemReviewed ?: $_modx->resource[\'pagetitle\']) | e}" />
    <meta itemprop="ratingValue" content="{$rating_wilson}" />
    <meta itemprop="bestRating" content="{$rating_max}" />
    <meta itemprop="worstRating" content="1" />
    <meta itemprop="ratingCount" content="{$count}" />
    <span style="width: {$rating_wilson_percent}%"></span>
</div>',
      'tpl.ecThreadDetailedRating' => '<div class="ec-d-rating">
    <div class="ec-d-rating__col-info">
        <div class="ec-d-rating__value">
            {$rating_wilson | number : 2 : \',\' : \' \'}
        </div>
        <div class="ec-d-rating__stars">
            <div class="ec-stars" title="{$rating_wilson}" itemscope itemtype="http://schema.org/AggregateRating">
                <meta itemprop="itemReviewed" content="{($itemReviewed ?: $_modx->resource[\'pagetitle\']) | e}" />
                <meta itemprop="ratingValue" content="{$rating_wilson}" />
                <meta itemprop="bestRating" content="{$rating_max}" />
                <meta itemprop="worstRating" content="1" />
                <meta itemprop="ratingCount" content="{$count}" />
                <span style="width: {$rating_wilson_percent}%"></span>
            </div>
        </div>
        <div class="ec-d-rating__desc">
            {\'ec_fe_detailed_rating_desc\' | lexicon} &ndash; <strong>{$count}</strong>
        </div>
    </div>
    <div class="ec-d-rating__col-lines">
        <div class="ec-d-rating__lines">
            {foreach $rating_votes as $rate => $line}
                <div class="ec-d-rating__line">
                    <div class="ec-d-rating__line-rate">{$rate}</div>
                    <div class="ec-d-rating__line-progress"><span style="width:{$line[\'volume\']}%"></span></div>
                    <div class="ec-d-rating__line-volume">{$line[\'volume\'] | number}%</div>
                </div>
            {/foreach}
        </div>
    </div>
</div>
',
    ),
    'setup-options' => 'easycomm-1.9.2-pl/setup-options.php',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => 'e4621c259b762981d0f2529908699806',
      'native_key' => 'easycomm',
      'filename' => 'modNamespace/3427b452817e476b419852d17313fa73.vehicle',
      'namespace' => 'easycomm',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOFileVehicle',
      'class' => 'xPDOFileVehicle',
      'guid' => '080e4a6ee97fd1f549fde00ee1c1755c',
      'native_key' => '080e4a6ee97fd1f549fde00ee1c1755c',
      'filename' => 'xPDOFileVehicle/0a8dd54cedbe7401a44a8db9cb2e84d4.vehicle',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicy',
      'guid' => '36704890406c9b22c5deee90cabf9c40',
      'native_key' => NULL,
      'filename' => 'modAccessPolicy/063e8864fed490d7e46ddad52d3f9064.vehicle',
      'namespace' => 'easycomm',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicyTemplate',
      'guid' => 'a56e6495a95cc222bdbf85866159e475',
      'native_key' => NULL,
      'filename' => 'modAccessPolicyTemplate/9c777f5b0a13aa3a722c241230c4cf83.vehicle',
      'namespace' => 'easycomm',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'EncryptedVehicle',
      'class' => 'modCategory',
      'guid' => '259acacaa209cae71f42f871bd97d871',
      'native_key' => NULL,
      'filename' => 'modCategory/58953f38ae4aa9e57ad7162bb9a5e135.vehicle',
      'namespace' => 'easycomm',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '96ecfccca58aff264bc19fee087c5fb6',
      'native_key' => 'ec_show_templates',
      'filename' => 'modSystemSetting/a6c897eb2b4ac02d07d17986f74e4e25.vehicle',
      'namespace' => 'easycomm',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'dae66000dc8b165e27e408639191bd48',
      'native_key' => 'ec_show_resources',
      'filename' => 'modSystemSetting/3fa1698a3d9f7906f01ac47cee8a8071.vehicle',
      'namespace' => 'easycomm',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '0e35f6765485294d6a194eccc39f028c',
      'native_key' => 'ec_frontend_css',
      'filename' => 'modSystemSetting/536e75b610d2bbbc7cf8b4d82bc3a316.vehicle',
      'namespace' => 'easycomm',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9dd369ac4317e4104d7f141d369f0b91',
      'native_key' => 'ec_frontend_js',
      'filename' => 'modSystemSetting/0f878b988210de89c9b8a79147389bd4.vehicle',
      'namespace' => 'easycomm',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '12993dc937ea7566dc048cb1db78f10a',
      'native_key' => 'ec_thread_grid_fields',
      'filename' => 'modSystemSetting/3cb441a496e9ac9eeb4ca42017fbe0a5.vehicle',
      'namespace' => 'easycomm',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'cdf565d8515ec43ff4a42b8b7e5294b0',
      'native_key' => 'ec_thread_window_fields',
      'filename' => 'modSystemSetting/63023ecc996205a197730d887d6f52ae.vehicle',
      'namespace' => 'easycomm',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '6af0fac14b6630fb4f89fee01976f00e',
      'native_key' => 'ec_use_rte',
      'filename' => 'modSystemSetting/cc7963224be95df2697e887bd5fdc5cb.vehicle',
      'namespace' => 'easycomm',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '2d7e03ddf6dd9d1efd0657d255dd5937',
      'native_key' => 'ec_message_grid_fields',
      'filename' => 'modSystemSetting/014b73f9e7f9a9e946b1ceeb79497f05.vehicle',
      'namespace' => 'easycomm',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'dd1bcbe2462aad3131ee706b4a104063',
      'native_key' => 'ec_message_window_layout',
      'filename' => 'modSystemSetting/db0f71caeaad40d5a2f8007e2557370d.vehicle',
      'namespace' => 'easycomm',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '162b5466b3949ecf20661c5611ee77a4',
      'native_key' => 'ec_message_grid_filters',
      'filename' => 'modSystemSetting/a99a73c0d5f4f99bda90e0cb9983dea0.vehicle',
      'namespace' => 'easycomm',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '19e91d4b8584b0d7f2ec7b5f8f00bff0',
      'native_key' => 'ec_auto_reply_author',
      'filename' => 'modSystemSetting/a74bdfbeb0a94de8dc75450c9e992270.vehicle',
      'namespace' => 'easycomm',
    ),
    16 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '52384c5e51df25712c83f6910ece0be2',
      'native_key' => 'ec_use_reply_templates',
      'filename' => 'modSystemSetting/80c59a53eee9b5ab3ff93e82071dfd1d.vehicle',
      'namespace' => 'easycomm',
    ),
    17 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9dd6d96e5de2e5e672757184931fd4fb',
      'native_key' => 'ec_mail_notify_user',
      'filename' => 'modSystemSetting/0b7b60e9cfe0120b7b1aa23292fc2f6b.vehicle',
      'namespace' => 'easycomm',
    ),
    18 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '63651516ee6e90b1993a6deecc44921b',
      'native_key' => 'ec_mail_notify_manager',
      'filename' => 'modSystemSetting/4a0fe7aba1a4a695e13990184e6237aa.vehicle',
      'namespace' => 'easycomm',
    ),
    19 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c3ed740f9e0c14829903974e5d6cfadb',
      'native_key' => 'ec_mail_new_subject_manager',
      'filename' => 'modSystemSetting/4e1a61a6be0f1300a4f8f3177d557046.vehicle',
      'namespace' => 'easycomm',
    ),
    20 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '69c7076e7179a86e20553acc6a8a6296',
      'native_key' => 'ec_mail_new_subject_user',
      'filename' => 'modSystemSetting/e11a38fd008436e621ea76b3936ab9d4.vehicle',
      'namespace' => 'easycomm',
    ),
    21 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9ef3ec6ce2baeb9864f1e0a38aeb742f',
      'native_key' => 'ec_mail_update_subject_user',
      'filename' => 'modSystemSetting/6c63337ae1b1d5c2c5cccafc48bc0b98.vehicle',
      'namespace' => 'easycomm',
    ),
    22 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'da2be022e8203d3975f2ec8e6c4a174b',
      'native_key' => 'ec_mail_manager',
      'filename' => 'modSystemSetting/6af55d0bea137a32196f06fdb98b74c2.vehicle',
      'namespace' => 'easycomm',
    ),
    23 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd9b5942d4564e289aa1e2fdd4392d435',
      'native_key' => 'ec_mail_from',
      'filename' => 'modSystemSetting/9b1136613948a79a28f09fda3ca9c2b5.vehicle',
      'namespace' => 'easycomm',
    ),
    24 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '93726a4c0049ec4e3e3254b29cf08f23',
      'native_key' => 'ec_mail_from_name',
      'filename' => 'modSystemSetting/70ea06bd21348e2be5f3f39eaaa5e124.vehicle',
      'namespace' => 'easycomm',
    ),
    25 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '725f0af44513d1244e4f8b1591661a5b',
      'native_key' => 'ec_rating_max',
      'filename' => 'modSystemSetting/3d752a081be50e2f0419270f311d1e78.vehicle',
      'namespace' => 'easycomm',
    ),
    26 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'dd458d68a729cba18830e770bf8b5866',
      'native_key' => 'ec_rating_wilson_confidence',
      'filename' => 'modSystemSetting/19c89ef22cf04caaace3571e8d37409b.vehicle',
      'namespace' => 'easycomm',
    ),
    27 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '23fcf5e9d07ee61cedc9b7174601c697',
      'native_key' => 'ec_rating_visual_editor',
      'filename' => 'modSystemSetting/6e6c6e3371faabd6caec36517906ddaa.vehicle',
      'namespace' => 'easycomm',
    ),
    28 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '2769be3a2c1a55ab670508e381de8048',
      'native_key' => 'ec_gravatar_size',
      'filename' => 'modSystemSetting/89766563acebfe330aa8dd5fe8120b57.vehicle',
      'namespace' => 'easycomm',
    ),
    29 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4c1792bf9257a280afc6cb4ae9be4dc9',
      'native_key' => 'ec_gravatar_default',
      'filename' => 'modSystemSetting/ff8ff446bc455a1db1b4857d9add78a7.vehicle',
      'namespace' => 'easycomm',
    ),
    30 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'cd24aa82d1a1f7349c593e4af49f25bf',
      'native_key' => 'ec_captcha_enable',
      'filename' => 'modSystemSetting/aa0b3a929c765147b19dcadb8b0e2ae4.vehicle',
      'namespace' => 'easycomm',
    ),
    31 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'ae05142ba46bdcc9c59d0f895c6d3fff',
      'native_key' => 'ec_recaptcha2_api',
      'filename' => 'modSystemSetting/dd34945cc0f27aca34290b4b071b7f20.vehicle',
      'namespace' => 'easycomm',
    ),
    32 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'a05252727ac08e91f7567653d282a47f',
      'native_key' => 'ec_recaptcha2_site_key',
      'filename' => 'modSystemSetting/1501fd700cdf49e9565e14155e73c657.vehicle',
      'namespace' => 'easycomm',
    ),
    33 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '8f56f836f4e0b2a32eba1a021dd739e0',
      'native_key' => 'ec_recaptcha2_secret_key',
      'filename' => 'modSystemSetting/8506faa55f5c9b1d24d922b32198f30d.vehicle',
      'namespace' => 'easycomm',
    ),
    34 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'ac0a1c75cf91d0e3294d43386ac1e982',
      'native_key' => 'OnBeforeEcThreadRemove',
      'filename' => 'modEvent/a4b58b062422cc82c7c603659428496e.vehicle',
      'namespace' => 'easycomm',
    ),
    35 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '24246afab117d30105ba17437f9b3449',
      'native_key' => 'OnEcThreadRemove',
      'filename' => 'modEvent/8573b27b9e936fbdf6eb1cd35623cc7b.vehicle',
      'namespace' => 'easycomm',
    ),
    36 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'c50112f4dd97b73cd0df83f0a42a2e91',
      'native_key' => 'OnBeforeEcMessageSave',
      'filename' => 'modEvent/71974c9dc7fbc93a5041803dfddb388a.vehicle',
      'namespace' => 'easycomm',
    ),
    37 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '7b1b3b8e43c1cd940e32c025dc9b6287',
      'native_key' => 'OnEcMessageSave',
      'filename' => 'modEvent/90fe136e04b2837d0257f5f40f90c681.vehicle',
      'namespace' => 'easycomm',
    ),
    38 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '9a723c1054d1356861af6c5848925727',
      'native_key' => 'OnBeforeEcMessagePublish',
      'filename' => 'modEvent/bcf8c0d54cac7000a5f99dcbadb4d66f.vehicle',
      'namespace' => 'easycomm',
    ),
    39 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '7a47af4ea8747de11580c635e52706f4',
      'native_key' => 'OnEcMessagePublish',
      'filename' => 'modEvent/76f838fec1a33403331bcd7bdee66c1d.vehicle',
      'namespace' => 'easycomm',
    ),
    40 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '5f4f5dc8b73b9546e283a84ca53f755c',
      'native_key' => 'OnBeforeEcMessageUnpublish',
      'filename' => 'modEvent/a0a5edce5c55e4175accc41bfc6fa18a.vehicle',
      'namespace' => 'easycomm',
    ),
    41 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '5ff3af3517b216d0994034895da4a4db',
      'native_key' => 'OnEcMessageUnpublish',
      'filename' => 'modEvent/3bafa93fafae1f4b728a775835fca0cf.vehicle',
      'namespace' => 'easycomm',
    ),
    42 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'c4f7773b365c0b8ee63666583e4b6816',
      'native_key' => 'OnBeforeEcMessageDelete',
      'filename' => 'modEvent/173ddcbb4011e0e8470d47e1759803a1.vehicle',
      'namespace' => 'easycomm',
    ),
    43 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '98e33a358c0d33d6c06f2fc7cd1fa611',
      'native_key' => 'OnEcMessageDelete',
      'filename' => 'modEvent/af85478c42d5ad94925882c9bdeb2d49.vehicle',
      'namespace' => 'easycomm',
    ),
    44 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'c27dda0a8068185877997e1150751cca',
      'native_key' => 'OnBeforeEcMessageUndelete',
      'filename' => 'modEvent/253c529b530e2f63aa12c9ff7883a466.vehicle',
      'namespace' => 'easycomm',
    ),
    45 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'e0a7a16fa0a34870a897f12910930021',
      'native_key' => 'OnEcMessageUndelete',
      'filename' => 'modEvent/150e4724b810cd77f18273fca7eff70e.vehicle',
      'namespace' => 'easycomm',
    ),
    46 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'c936668c15de2dada0c7fadff60ed8c5',
      'native_key' => 'OnBeforeEcMessageRemove',
      'filename' => 'modEvent/e4663460368cd125fdf61a85c3e8c4c5.vehicle',
      'namespace' => 'easycomm',
    ),
    47 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '97b4fa57656d37bf62dba4e9b461a42f',
      'native_key' => 'OnEcMessageRemove',
      'filename' => 'modEvent/b63bfb2b832b0ef91f02b260c7c6d56d.vehicle',
      'namespace' => 'easycomm',
    ),
    48 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => '9bf293eaeb0159930f1dead0cd1a5422',
      'native_key' => 'easyComm',
      'filename' => 'modMenu/fbb4142f7df6c42c1094a951b7526c72.vehicle',
      'namespace' => 'easycomm',
    ),
    49 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOScriptVehicle',
      'class' => 'xPDOScriptVehicle',
      'guid' => '24c92f79b61e533bee51c31cd0883fb9',
      'native_key' => '24c92f79b61e533bee51c31cd0883fb9',
      'filename' => 'xPDOScriptVehicle/320991250bfcbac8ef4f18cced45f65d.vehicle',
      'namespace' => 'easycomm',
    ),
  ),
);