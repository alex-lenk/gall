<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for Office.

1.8.5-pl
==============
- Improved register of ExtJS scripts.

1.8.4-pl
==============
- Update chunks for Bootstrap 4.

1.8.3-pl
==============
- Fixed register of ExtJS scripts when MODX installed in subdirectory.
- Improved authorization via activation link.

1.8.2-pl
==============
- Fixed typo in chunk.profile.form.tpl.

1.8.1-pl
==============
- Update for supporting HybridAuth 3.

1.8.0-pl
==============
- Improved PHP 7.2 support.

1.7.2-pl
==============
- [miniShop2] Fixed fatal error if there are MODXMinify installed on the site.
- [Auth/Profile] Added javascript callback to default scripts.

1.7.1-pl
==============
- [Auth] Don`t change token when office_auth_mode == "phone".

1.7.0-pl
==============
- Hardening Auth and Profile forms by adding CSRF token.
- [Auth] Do not send the password by email if the user specified it manually.

1.6.2-pl
==============
- Fixed "Could not load package metadata for package office" message in logs.
- [Auth] Fixed possible fatal error with login to second account on MODX 2.5.8.

1.6.1-pl
==============
- [Auth] Fixed possible error with inactive user.

1.6.0-pl
==============
- Ability to log in and switch between multiple accounts.
- Fenom chunks by default.
- pdoTools is required now.

1.5.0-pl
==============
- [mgr] Ability to authenticate on frontend as any active user from manager.
- Added german lexicon (thanks to Fabian Christen).
- [OfficeAuth] Ability to login via username, email of mobilephone with one field "username".

1.4.6-pl
==============
- [miniShop2] Ability to repeat and delete orders.

1.4.5-pl
==============
- [Profile] Remove default avatar params from update processor due to issues.
- [Auth] Emails with "+" are now supported.

1.4.4-pl
==============
- [Auth] Fixed saving of the mobilephone when office_auth_mode != phone.

1.4.3-pl
==============
- [Auth] Fixed the error when user with phone in email could not to authenticate.
- [Auth] Fixed the error "Could not load controller auth".

1.4.2-pl
==============
- [Auth] Improved integration with HybridAuth.
- [Profile] Fixed the regular expression for verification of emails.

1.4.1-pl
==============
- [Auth] Improved work of ByteHand sms provider.
- Fixed handling of errors when sending sms.

1.4.0-pl
==============
- PSR-2.
- Removed autoload of jQuery.
- Mobile phones support with SMS authentication.
- The multilingual chunks by default.
- The HybridAuth is no longer installed by default.
- A login errors now logged on "info" level instead of "error".

1.3.11-pl
==============
- No longer authorization required to activate a new email.

1.3.10-pl
==============
- Some security fixes.

1.3.9-pl
==============
- Updated jGrowl to version 1.4.5.

1.3.8-pl
==============
- [RemoteAuth] Fixed possible E_WARNING in PHP 7.

1.3.7-pl
==============
- Improved load of phpThumb for profile avatars.

1.3.6-pl
==============
- Improved load of pdoTools.

1.3.5-pl
==============
- [OfficeProfile] Fixed processing restrictions of length for field "comments".

1.3.4-pl
==============
- [OfficeProfile] Fixed remove of profile photo on double form save.

1.3.3-pl
==============
- [OfficeAuth] Improved process of login links.

1.3.2-pl
==============
- [OfficeProfile] Ability to specify nested extended fields in &profileFields parameter.
- [OfficeProfile] Ability to specify nested extended fields in &requiredFields parameter.
- Updated FontAwesome to versions 4.5.0.

1.3.1-pl
==============
- [Profile] Improved handling of field "dob".
- Some ExtJS widgets improvements.

1.3.0-pl
==============
- New system setting "office_controllers_paths".
- New snippet "officeMiniShop2" as a shorthand for MS2 private office.
- New Ext JS CSS styles.
- Reformat code.
- [miniShop2] Added search text field. Some UI improvements.

1.2.5-pl
==============
- [RemoteAuth] Fixed parameter "rememberme".

1.2.4-pl
==============
- [Auth] Fixed error with activation of emails with "+".

1.2.3-pl
==============
- [Profile] Improved handling of passwords fields.
- [Profile] Improved handling of "comment" field.

1.2.2-pl
==============
- Added system setting "office_sanitize_pcre".

1.2.1-pl
==============
- [Profile] Improved parsing of "profileFields" parameter.

1.2.0-pl
==============
- Controllers will use pdoTools functions if available.

1.1.10-pl
==============
- [#19] [Profile] Fixed issue with HybridAuth templates.

1.1.9-pl1
==============
- Updated HybridAuth version in the installer.

1.1.8-pl1
==============
- [Profile] Fixed removing old photos from "avatarPath".
- [Auth] Fixed some log entries.

1.1.7-pl
==============
- Added call of system event on user activation.
- [Remote] Changed log level to "error".

1.1.6-pl
==============
- Fixed retrieving of modMail ErrorInfo.
- Improved creating of system settings.
- [#10] [miniShop2] Fixed order log pagination.

1.1.5-pl1
==============
- [Profile] Improved handling of extended fields.

1.1.4-pl3
==============
- [Main] Fixed work of frontend scripts whe Minify is not working.
- [Profile] Removed option "profile_force_email_as_username" by default.
- [#9] [Profile] Do not overwrite existing extended fields.
- [#6] [Profile] Ability not to use email in profile form.
- Ability to set empty &requiredFields=``.
- Fixed ExtJS windows animation in MODX 2.3.

1.1.3-pl
==============
- [#4] Fixed loading of HybridAuth with custom chunks.

1.1.2-pl
==============
- [miniShop2] Improved support of MODX 2.3.

1.1.1-pl1
==============
- Switched gravatar links to https by default.
- [miniShop2] Added support of lexicons in payment, delivery and status names.

1.1.0-pl1
==============
- [miniShop2] Fixed empty product names in order grid on MS2 < 2.1.8.
- [Auth] Added "username" and "fullname" fields to registration form.
- [Auth] Ability to use username or email for login.
- [Auth] User will receive activation email if he trying to login and his account was not activated.
- [#3] [Auth] Ability to use $_GET[\'hauth_return\'] for redirecting user to any page after authorization.
- [#2] [Profile] Fixed clearing of user photo.
- [#1] [Profile] Improved regular expression for supporting of all unicode characters.

1.1.0-beta
==============
- [Main] Updated Ext JS modx-theme.
- [Main] Added Font Awesome 4.1 for modx-theme.
- [miniShop2] Updated miniShop2 controller and Ext JS grid for version 2.1.8.
- [miniShop2] Improved format of weight and price in MS2 grid.
- [miniShop2] Fixed default system setting "office_ms2_order_product_fields".
- [Auth] Ability to use password for login.
- [Auth] New login form.
- [Profile] Ability to change password.
- [Remote] Fixed parameter "updateUser" in remote auth controller.

1.0.0-pl
==============
- [Auth] Ability to use regular user names, not email.
- [Profile] Added system setting to force using emails as usernames.
- [Profile] Ability to change username.
- [Profile] Ability to upload user avatar.
- Updated chunks for Bootstrap 3.
- Ability to overwrite chunks on update.
- [Remote] New controller for remote authentication.
- Improved login errros handling.
- Fixed &profileFields in "officeProfile".

0.9.5-pl2
==============
- [Profile] Ability to edit extended fields.
- [miniShop2] Fixed popup windows in Internet Explorer.

0.9.4-pl
==============
- Optimized creating of system settings fo "page_id".

0.9.3-pl
==============
- [Profile] Added displaying error messages about required fields when user redirected to profile.

0.9.2-pl
==============
- Added urldecode of action in plugins.
- Fixed bug with clearing cache of site.

0.9.1-pl
==============
- [Profile] Username is always the user`s email.
- [Main] Component set "alow_multiple_emails" to false on installation.

0.9.1-rc
==============
- [Auth] Improved work in multiple contexts.
- [Auth] Fixed generated links for contexts in subdirectory.
- [Auth] Moved "login" and "Logout" logic to system plugin.
- [Auth] Improved saving "office_auth_page_id" setting.
- [Profile] mproved saving "office_profile_page_id" setting.
- [Main] Fixed issues with multiple controllers calls on one page.

0.9.0-pl2
==============
- Fixed email verification
- Removed unused files
- Added integration with HybridAuth 0.7+

0.8.3
==============
- Fixed wrong values in MS2 orders grid.

0.8.2
==============
- [Main] Changed hard coded "/manager/" to MODX_MANAGER_URL constant.

0.8.1
==============
- [Profile] Added system setting "office_profile_required_fields" for requirement from users to fill in this fields.

0.8.0
==============
- [Auth] Improved activation email.
- [Auth] Fixed "loginResourceId" and "logoutResourceId".
- [Profile] Fixed and improved update of profile.
- [Profile] If user is not authenticated, controller do not redirects to unathorized page anymore.
- [miniShop2] Fixed work with miniShop2, called on page.
- [miniShop2] Improved orders table.
- [miniShop2] If user is not authenticated, controller do not redirects to unathorized page anymore.
- [miniShop2] Moved "details" link from context menu to the grid column.

0.7.1
==============
- [Main] Added "office_extjs_css" system setting for specifying custom css for ExtJS.
- [miniShop2] Customizable orders grid.
- [miniShop2] Customizable order form.
- [miniShop2] Customizable address form.
- [miniShop2] Customizable order product grid.

0.7.0
==============
- [miniShop2] Added new controller

0.6.0
==============
- [Main] Preparation for first public release
- [Auth] Added system setting "office_auth_page_id"
- [Profile] Added system setting "office_profile_page_id"
- Added ability to load custom styles and javascript for Auth and Profile controllers.

0.4.0
==============
- [Main] Main class improvements. Added method Office::addClientExtJS()

0.3.2
==============
- [Auth] Improved redirect on login\\logout

0.3.1
==============
- [Auth] Added checking of already send activation link
- [Auth] Added checking of already logged in users

0.3.0
==============
- [Main] Integration of Ext JS from MODX

0.2.0
==============
- [Profile] Edit user profile and change email with verification.

0.1.0
==============
- [Auth] Login\\logout',
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
Office
--------------------
Author: Vasily Naumkin <bezumkin@yandex.ru>
--------------------

Private Office for current MODX user.

- Register and authenticate users via Ajax.
- Integration with oAuth services via HybridAuth (installed automaticly).
- Ext JS table of miniShop2 orders with ordered products and status log.
- Remote authorization via any other site with Office installed.
- Ability to add your own controllers for extended functionality.

Feel free to suggest ideas/improvements/bugs on GitHub:
https://github.com/bezumkin/Office/issues

---

You can buy this package on https://modstore.pro and receive support from the author at https://modstore.pro/cabinet/tickets/.

Or you can download source code, to build the package and to use it without any limitations. But don`t ask me any questions in this case.',
    'chunks' => 
    array (
      'tpl.Office.auth.login' => '<div class="row" id="office-auth-form">
    <div class="col-12 col-md-6 office-auth-login-wrapper">
        <h4>{\'office_auth_login\' | lexicon}</h4>

        <form method="post" id="office-auth-login">
            <div class="form-group row">
                <label for="office-auth-login-email" class="col-md-3 col-form-label">
                    {\'office_auth_login_username\' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-9">
                    <input type="text" name="username" placeholder="" class="form-control"
                           id="office-auth-login-username" value=""/>
                    <p class="help-block">
                        <small>{\'office_auth_login_username_desc\' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group hidden row">
                <label for="office-auth-login-phone-code" class="col-md-3 col-form-label">
                    {\'office_auth_login_phone_code\' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="phone_code" class="form-control" id="office-auth-login-phone-code"
                           value="" readonly/>
                    <p class="help-block">
                        <small>{\'office_auth_login_phone_code_desc\' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-login-password" class="col-md-3 col-form-label">
                    {\'office_auth_login_password\' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="password" name="password" placeholder="" class="form-control"
                           id="office-login-form-password" value=""/>
                    <p class="help-block">
                        <small>{\'office_auth_login_password_desc\' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="action" value="auth/formLogin"/>
                <input type="hidden" name="return" value=""/>
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{\'office_auth_login_btn\' | lexicon}</button>
                </div>
            </div>
        </form>

        {if $providers?}
            <label>{\'office_auth_login_ha\' | lexicon}</label>
            <div>{$providers}</div>
            <p class="help-block">
                <small>{\'office_auth_login_ha_desc\' | lexicon}</small>
            </p>
        {/if}
        {if $error?}
            <div class="alert alert-danger">{$error}</div>
        {/if}
    </div>

    <div class="col-12 col-md-6 office-auth-register-wrapper">
        <h4>{\'office_auth_register\' | lexicon}</h4>
        <form method="post" class="form-horizontal" id="office-auth-register">
            <div class="form-group row">
                <label for="office-auth-register-email" class="col-md-3 col-form-label">
                    {\'office_auth_register_email\' | lexicon}{if $_modx->config.office_auth_mode == \'email\'}&nbsp;<span class="red">*</span>{/if}
                </label>
                <div class="col-md-9">
                    <input type="email" name="email" placeholder="" class="form-control" id="office-auth-register-email"
                           value=""/>
                    <div class="help-block">
                        <small>{\'office_auth_register_email_desc\' | lexicon}</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-phone" class="col-md-3 col-form-label">
                    {\'office_auth_register_phone\' | lexicon}{if $_modx->config.office_auth_mode == \'phone\'}&nbsp;<span class="red">*</span>{/if}
                </label>
                <div class="col-md-9">
                    <input type="text" name="mobilephone" placeholder="" class="form-control"
                           id="office-auth-register-phone" value=""/>
                    <div class="help-block">
                        <small>{\'office_auth_register_phone_desc\' | lexicon}</small>
                    </div>
                </div>
            </div>
            <div class="form-group hidden row">
                <label for="office-auth-register-phone-code" class="col-md-3 col-form-label">
                    {\'office_auth_register_phone_code\' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="phone_code" class="form-control" id="office-auth-register-phone-code"
                           value=""/>
                    <div class="help-block">
                        <small>{\'office_auth_register_phone_code_desc\' | lexicon}</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-password" class="col-md-3 col-form-label">
                    {\'office_auth_register_password\' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="password" name="password" placeholder="" class="form-control"
                           id="office-register-form-password" value=""/>
                    <p class="help-block">
                        <small>{\'office_auth_register_password_desc\' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-username" class="col-md-3 col-form-label">
                    {\'office_auth_register_username\' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="username" placeholder="" class="form-control"
                           id="office-register-form-username" value=""/>
                    <p class="help-block">
                        <small>{\'office_auth_register_username_desc\' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-fullname" class="col-md-3 col-form-label">
                    {\'office_auth_register_fullname\' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="fullname" placeholder="" class="form-control"
                           id="office-register-form-fullname" value=""/>
                    <p class="help-block">
                        <small>{\'office_auth_register_fullname_desc\' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="auth/formRegister"/>
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-danger">{\'office_auth_register_btn\' | lexicon}</button>
                </div>
            </div>
        </form>
    </div>
</div>',
      'tpl.Office.auth.logout' => '<div class="row" id="office-auth-form">
    <div class="col-md-6">
        <div class="d-flex align-items-center">
            <div class="mr-3">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" alt="{$fullname}" title="{$fullname}"
                     class="rounded-circle" width="100"/>
            </div>
            <div>
                <div>{\'office_auth_welcome\' | lexicon} <b>{$fullname}</b> ({$username})</div>
                <a href="{$_modx->resource.id | url : [] : [\'action\' => \'auth/logout\']}" class="btn btn-light">
                    {\'office_auth_logout\' | lexicon} &rarr;
                </a>
            </div>
        </div>
        {if $authorized?}
            <hr/>
            <div class="authorized">
                {foreach $authorized as $id => $user}
                    <div class="d-flex align-items-center mb-2">
                        <img src="{if $user.photo?}{$user.photo}{else}{$user.gravatar}?s=50{/if}"
                             alt="{$user.fullname}" title="{$user.fullname}" class="rounded-circle mr-3" width="50"/>
                        <a href="{$_modx->resource.id | url : [] : [\'action\' => \'auth/change\', \'user_id\' => $id]}">
                            <strong>{$user.fullname}</strong> ({$user.username})
                        </a>
                        <a href="{$_modx->resource.id | url : [] : [\'action\' => \'auth/logout\', \'user_id\' => $id]}" class="btn btn-light ml-auto">&rarr;</a>
                    </div>
                {/foreach}
            </div>
        {/if}
    </div>
    <div class="col-md-6 mt-3 mt-md-0">
        <form method="post" class="form-horizontal" id="office-auth-login">
            <input type="hidden" name="action" value="auth/formAdd"/>
            <input type="hidden" name="return" value=""/>
            <div class="alert alert-warning">
                <small>{\'office_auth_add_desc\' | lexicon}</small>
            </div>
            <div class="form-group row">
                <label for="office-auth-login-email" class="col-md-3 col-form-label">
                    {\'office_auth_login_username\' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-9">
                    <input type="text" name="username" placeholder="" class="form-control" id="office-auth-login-username" value=""/>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-login-password" class="col-md-3 col-form-label">
                    {\'office_auth_login_password\' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-9">
                    <input type="password" name="password" placeholder="" class="form-control" id="office-login-form-password" value=""/>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{\'office_auth_login_btn\' | lexicon}</button>
                </div>
            </div>
        </form>
    </div>
</div>',
      'tpl.Office.remote.login' => '<div class="office-remote-login">
    <a href="{$remote}" class="btn btn-primary" rel="nofollow">{\'office_auth_remote_login\' | lexicon}</a>
    {if $error?}
        <div class="alert alert-danger">{$error}</div>
    {/if}
</div>',
      'tpl.Office.remote.logout' => '<div class="row" id="office-auth-form">
    <div class="col-md-6">
        <div class="d-flex align-items-center">
            <div class="mr-3">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" alt="{$fullname}" title="{$fullname}"
                     class="rounded-circle" width="100"/>
            </div>
            <div>
                <div>{\'office_auth_welcome\' | lexicon} <b>{$fullname}</b> ({$username})</div>
                <a href="{$_modx->resource.id | url : [] : [\'action\' => \'remote/logout\']}" class="btn btn-light">
                    {\'office_auth_logout\' | lexicon} &rarr;
                </a>
            </div>
        </div>
    </div>
</div>',
      'tpl.Office.auth.activate' => '{var $lang = $_modx->config.cultureKey}
{if $code?}
    {if $lang == \'en\'}
        To activate the password {$password}, specify a secret code: {$code}.
    {else}
        Для активации пароля {$password}, укажите секретный код: {$code}.
    {/if}
{else}
    {if $lang == \'en\'}
        <p>You (or someone else) has requested a password reset for your account at {\'site_name\' | config}.</p>
        <p>If it really was you, then you need <a href="{$link}">follow the link</a>,
            to activate the new password: <strong>{$password}</strong><br/>
            Otherwise, just delete this message.</p>
    {else}
        <p>Вы (или кто-то другой) запросил сброс пароля для вашей учётной записи на сайте {\'site_name\' | config}.</p>
        <p>Если это действительно были вы, то вам нужно <a href="{$link}">пройти по ссылке</a>,
            для активации нового пароля: <strong>{$password}</strong><br/>
            В противном случае, просто удалите это письмо.</p>
    {/if}
{/if}',
      'tpl.Office.auth.register' => '{var $lang = $_modx->config.cultureKey}
{if $code?}
    {if $lang == \'en\'}
        You registered on {\'site_name\' | config}{if $password?}, your password: {$password}{/if}. Your activation code: {$code}.
    {else}
        Вы зарегистрировались на {\'site_name\' | config}{if $password?}, ваш пароль: {$password}{/if}. Ваш код активации: {$code}.
    {/if}
{else}
    {if $lang == \'en\'}
        <p>You have successfully registered at {\'site_name\' | config} using email {$email}.</p>
        <p>Now you need <a href="{$link}">follow the link</a> to activate your account.
            {if $password?}
                Your password is: <strong>{$password}</strong>. Do not forget to change it for your own!
            {/if}
        </p>
    {else}
        <p>Вы успешно зарегистрировались на сайте {\'site_name\' | config}, указав email {$email}.</p>
        <p>Теперь вам нужно <a href="{$link}">пройти по ссылке</a>, чтобы активировать учётную запись.<br/>
            {if $password?}
                <br/>Ваш пароль: <strong>{$password}</strong>. Не забудьте поменять его на свой!
            {/if}
        </p>
    {/if}
{/if}',
      'tpl.Office.profile.form' => '<form action="" method="post" id="office-profile-form" enctype="multipart/form-data">
    <input type="hidden" name="photo" value="{$photo}"/>
    <input type="file" name="newphoto" id="profile-photo" class="hidden"/>

    <div class="alert alert-warning">
        {\'office_profile_header\' | lexicon}
    </div>

    <div class="form-group row avatar">
        <label class="col-md-2 col-form-label">{\'office_profile_avatar\' | lexicon}</label>
        <div class="col-md-10">
            <div class="d-flex align-items-center">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" id="profile-user-photo"
                     class="rounded-circle mr-3" data-gravatar="{$gravatar}?s=100" width="100"/>
                <div>
                    <div>
                        <a href="#">
                            <label for="profile-photo">&plus; {\'office_profile_avatar_select\' | lexicon}</label>
                        </a>
                    </div>
                    <div>
                        <a href="#" id="office-user-photo-remove"{if !$photo} style="display:none;"{/if}>
                            &times; {\'office_profile_avatar_remove\' | lexicon}
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-text text-muted">{\'office_profile_avatar_desc\' | lexicon}</div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{\'office_profile_username\' | lexicon}<sup class="red">*</sup></label>
        <div class="col-md-10">
            <input type="text" name="username" value="{$username}" placeholder="{\'office_profile_username\' | lexicon}"
                   class="form-control"/>
            <div class="help-block message">{$error_username}</div>
            <div class="form-text text-muted">{\'office_profile_username_desc\' | lexicon}</div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{\'office_profile_fullname\' | lexicon}<sup class="red">*</sup></label>
        <div class="col-md-10">
            <input type="text" name="fullname" value="{$fullname}" placeholder="{\'office_profile_fullname\' | lexicon}"
                   class="form-control"/>
            <div class="help-block message">{$error_fullname}</div>
            <div class="form-text text-muted">{\'office_profile_fullname_desc\' | lexicon}</div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{\'office_profile_email\' | lexicon}<sup class="red">*</sup></label>
        <div class="col-md-10">
            <input type="text" name="email" value="{$email}" placeholder="{\'office_profile_email\' | lexicon}"
                   class="form-control"/>
            <div class="help-block message">{$error_email}</div>
            <div class="form-text text-muted">{\'office_profile_email_desc\' | lexicon}</div>
        </div>
    </div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">
        {\'office_profile_phone\' | lexicon}{if $_modx->config.office_auth_mode == \'phone\'}&nbsp;<span class="red">*</span>{/if}
    </label>
    <div class="col-md-10">
        <input type="text" name="mobilephone" placeholder="" value="{$mobilephone}" class="form-control"/>
        <div class="help-block message">{$error_mobilephone}</div>
        <div class="form-text text-muted">{\'office_profile_phone_desc\' | lexicon}</div>
    </div>
</div>

<div class="form-group row hidden">
    <label class="col-md-2 col-form-label">{\'office_profile_phone_code\' | lexicon}</label>
    <div class="col-md-10">
        <input type="text" name="phone_code" value="" class="form-control"/>
        <div class="help-block message">{$error_phone_code}</div>
        <div class="form-text text-muted">{\'office_profile_phone_code_desc\' | lexicon}</div>
    </div>
</div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{\'office_profile_password\' | lexicon}</label>
        <div class="col-md-10">
            <input type="password" name="specifiedpassword" value="" placeholder="********" class="form-control"/>
            <div class="help-block message">{$error_specifiedpassword}</div>
            <div class="form-text text-muted">{\'office_profile_specifiedpassword_desc\' | lexicon}</div>
            <input type="password" name="confirmpassword" value="" placeholder="********" class="form-control"/>
            <div class="help-block message">{$error_confirmpassword}</div>
            <div class="form-text text-muted">{\'office_profile_confirmpassword_desc\' | lexicon}</div>
        </div>
    </div>

    {if $providers?}
        <div class="form-group row">
            <label class="col-md-2 col-form-label">{\'ha.providers_available\' | lexicon}</label>
            <div class="col-md-10">
                {$providers}
            </div>
        </div>
    {/if}

    <hr/>
    <div class="form-group row">
        <div class="offset-md-2 col-md-10 text-center text-md-left">
            <button type="submit" class="btn btn-primary">{\'office_profile_save\' | lexicon}</button>
            <a class="btn btn-danger" href="{$_modx->resource.id | url : [] : [\'action\' => \'auth/logout\']}">{\'office_profile_logout\' | lexicon}</a>
        </div>
    </div>
</form>
',
      'tpl.Office.profile.activate' => '{var $lang = $_modx->config.cultureKey}
{if $code?}
    {if $lang == \'en\'}
        Your confirmation code: {$code}.
    {else}
        Ваш код подтверждения нового номера: {$code}.
    {/if}
{else}
    {if $lang == \'en\'}
        <p>You have changed email in yours profile on the website {\'site_name\' | config}.</p>
        <p>To confirm the new address you need <a href="{$link}">follow the link</a>.</p>
    {else}
        <p>Вы изменили email в своём профиле на сайте {\'site_name\' | config}.</p>
        <p>Для подтверждения нового адреса вам нужно <a href="{$link}">пройти по ссылке</a>.</p>
    {/if}
{/if}',
      'tpl.Office.ms2.outer' => '<div id="office-minishop2-grid">
    <div id="office-preloader"></div>
</div>',
    ),
    'setup-options' => 'office-1.8.5-pl/setup-options.php',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '88c0f1d3dedd0d437b1deea0a53b3852',
      'native_key' => 'office',
      'filename' => 'modNamespace/ac209cb09566546522ab8eba619c086f.vehicle',
      'namespace' => 'office',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOFileVehicle',
      'class' => 'xPDOFileVehicle',
      'guid' => '4c6df97775fcf786571497aabccd1207',
      'native_key' => '4c6df97775fcf786571497aabccd1207',
      'filename' => 'xPDOFileVehicle/baa24b87eb18e2a22041589742a7f3b4.vehicle',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'f85558f52dc6d38a380fab277a716169',
      'native_key' => 'office_frontend_css',
      'filename' => 'modSystemSetting/85df3032dbc9d4be57d1d848e2f04658.vehicle',
      'namespace' => 'office',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '1e534bc4fc42c270627e4a5709ec73d2',
      'native_key' => 'office_extjs_css',
      'filename' => 'modSystemSetting/c261f659ce718f17957ed2eeeadb90f8.vehicle',
      'namespace' => 'office',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd5aef416ef295b6ef1271df931fd8fe6',
      'native_key' => 'office_frontend_js',
      'filename' => 'modSystemSetting/84e19998ba0dc25d87d8aee113e674cc.vehicle',
      'namespace' => 'office',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '97d5355f1a6d66d909a94f7a94795fd7',
      'native_key' => 'office_sanitize_pcre',
      'filename' => 'modSystemSetting/9a2be6b4047911b9b111c7d8fab3f2d5.vehicle',
      'namespace' => 'office',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '24a077cf0c829cc24e0ec00a870ed170',
      'native_key' => 'office_controllers_paths',
      'filename' => 'modSystemSetting/1d28c24bae118dbaa2577800b1cfd518.vehicle',
      'namespace' => 'office',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5fb8e142c52090d76860840f74f79cf0',
      'native_key' => 'office_check_csrf',
      'filename' => 'modSystemSetting/ae7e9568a575c88c10a48fd6b205830a.vehicle',
      'namespace' => 'office',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5670df79979dc4272e4d4596ecf53736',
      'native_key' => 'office_sms_id',
      'filename' => 'modSystemSetting/5a26e7516291ba8ae2e2c6ab2efc1b1d.vehicle',
      'namespace' => 'office',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '530fc7bd55716b16b96456cd8c148468',
      'native_key' => 'office_sms_key',
      'filename' => 'modSystemSetting/9f8349db1d74dd50f833333866d316e9.vehicle',
      'namespace' => 'office',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'dd18076d99bae2391a40734c15f80895',
      'native_key' => 'office_sms_provider',
      'filename' => 'modSystemSetting/1138d376d50cdf1e878682b76c9a228f.vehicle',
      'namespace' => 'office',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c3fe56057e53d7298cb474bb287c60ff',
      'native_key' => 'office_sms_from',
      'filename' => 'modSystemSetting/9bb6bbd0b15cddd0cb1ef8ba1928797c.vehicle',
      'namespace' => 'office',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'ed85bd62ef57120e18c75095ac98a335',
      'native_key' => 'office_auth_mode',
      'filename' => 'modSystemSetting/178331be404dff401a030f68e5f8ca25.vehicle',
      'namespace' => 'office',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'f6541604ed4baf2bf413f1360b4047fc',
      'native_key' => 'office_auth_page_id',
      'filename' => 'modSystemSetting/6a8835edeb27851b159443a4bfaa2f82.vehicle',
      'namespace' => 'office',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '6a87cef5083ef02fb0d7671e176110de',
      'native_key' => 'office_auth_frontend_css',
      'filename' => 'modSystemSetting/494cc1e253d3bff6607f6f30d36c1813.vehicle',
      'namespace' => 'office',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd7f3bd8d032160c4b6aa80327009fab3',
      'native_key' => 'office_auth_frontend_js',
      'filename' => 'modSystemSetting/35567c8c1b8e09eba4318becf4ca7f93.vehicle',
      'namespace' => 'office',
    ),
    16 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'f8f3378867c51b42761853f9ede82d92',
      'native_key' => 'office_profile_page_id',
      'filename' => 'modSystemSetting/bad384b19c882ea0a645bd5fa491cbde.vehicle',
      'namespace' => 'office',
    ),
    17 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '031a82a8f55fdadc19eb33655bfb5c8c',
      'native_key' => 'office_profile_required_fields',
      'filename' => 'modSystemSetting/d92b0d89858774815b41c0a9c8e7f0be.vehicle',
      'namespace' => 'office',
    ),
    18 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd6bf1882f963b2df7978914c76db42f4',
      'native_key' => 'office_profile_frontend_css',
      'filename' => 'modSystemSetting/2cd12f55b3f1bb2e1dece4e3f37fdf64.vehicle',
      'namespace' => 'office',
    ),
    19 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4dacf8f9004744e07912dafe4fcc8b17',
      'native_key' => 'office_profile_frontend_js',
      'filename' => 'modSystemSetting/a24ac5ce905c4906a8297e37e7598cf3.vehicle',
      'namespace' => 'office',
    ),
    20 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '42927a9c9de500c96953ca920ae15609',
      'native_key' => 'office_ms2_frontend_css',
      'filename' => 'modSystemSetting/530957ae8bed4583894ed607ae26a934.vehicle',
      'namespace' => 'office',
    ),
    21 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '72ad91af10a3faf03f378870362e794a',
      'native_key' => 'office_ms2_frontend_js',
      'filename' => 'modSystemSetting/0cfb256288e96e9ffb3610d9cda8412b.vehicle',
      'namespace' => 'office',
    ),
    22 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '771ff8de8ff52a840714cfb71306c431',
      'native_key' => 'office_ms2_date_format',
      'filename' => 'modSystemSetting/67e3dd06dd999ff48fd8210b128d5f98.vehicle',
      'namespace' => 'office',
    ),
    23 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '62bc64227fc4664f05db1bb98de63b3c',
      'native_key' => 'office_ms2_order_grid_fields',
      'filename' => 'modSystemSetting/c853c7fa5020ca1b00b5aa662c747904.vehicle',
      'namespace' => 'office',
    ),
    24 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '66be34e3dc6c1c503a3b48e47170b250',
      'native_key' => 'office_ms2_order_form_fields',
      'filename' => 'modSystemSetting/47e746322e81eaacd6b7935126c41299.vehicle',
      'namespace' => 'office',
    ),
    25 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'dcf2a84c6d9b47a99f7fd0c3a9d355fa',
      'native_key' => 'office_ms2_order_address_fields',
      'filename' => 'modSystemSetting/7fddbe9def2579bebb81b5a008dc141a.vehicle',
      'namespace' => 'office',
    ),
    26 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9751f1e8ed81cb11d04232be78bd8ffa',
      'native_key' => 'office_ms2_order_product_fields',
      'filename' => 'modSystemSetting/9b665f76438bf1b4402ec6d157613ffe.vehicle',
      'namespace' => 'office',
    ),
    27 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'encryptedVehicle',
      'class' => 'modCategory',
      'guid' => '3233c3f440943e8304fcb068febd484c',
      'native_key' => 1,
      'filename' => 'modCategory/430fee9c89abab54fa4ecef04e472770.vehicle',
      'namespace' => 'office',
    ),
    28 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOScriptVehicle',
      'class' => 'xPDOScriptVehicle',
      'guid' => '7415b9f2a0f707e1691b6eea409ff422',
      'native_key' => '7415b9f2a0f707e1691b6eea409ff422',
      'filename' => 'xPDOScriptVehicle/9f2ba240d3d2cb47f32b97f479fbc8c6.vehicle',
      'namespace' => 'office',
    ),
  ),
);