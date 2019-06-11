<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for MinifyX

1.6.0-pl (22.01.2018)
==============
- Updated all Munee dependencies. You can do it anytime via composer.
- Php version must be >= 5.6.
- Added the method "getFileUrl" to the MinifyX class.
- Added the method "getFilePath" to the MinifyX class.
- Added the "forceUpdate" snippet parameters and the same system setting.
- Added the "forceDelete" system setting to delete all files in the cache directory.
- Added the "cssTpl" and "jsTpl" snippet parameters.
- Added new register type "print" for immediate output.
- Added the file hook "fixVm.php" which fixes the "vmax" and "vmin" units after css compilation.
- Some bugfixes.


1.5.0-pl (19.01.2018)
==============
- Added config file for groups (core/components/minifyx/config/groups.php).
- Added the "cssGroup" snippet parameter.
- Added the "jsGroup" snippet parameter.
- Added the "preHooks" snippet parameter. A hook can be either a snippet or a file, specified in the core/components/minifyx/hooks folder.
- Added the "hooks" snippet parameter. A hook can be either a snippet or a file, specified in the core/components/minifyx/hooks folder.
- Added the ability to run the snippet multiple times.
- Added file hook "cssToPage.php" (&hooks=`cssToPage.php`).

1.4.4-pl (16.05.2016)
==============
- [#22] Updated sabberworm/php-css-parser to version 7.0.3.

1.4.3-pl (28.04.2016)
==============
- [#21] Updated sabberworm/php-css-parser to version 7.0.2.

1.4.2-pl (22.08.2015)
==============
- Updated Munee with all subpackages.
- Fixed fatal error on PHP 5.3.3.

1.4.1-pl (01.06.2015)
==============
- Updated Munee with all subpackages.
- [#18] Improved work of plugin.

1.3.1-pl (21.07.2014)
==============
- [#12] Support of MODX 2.3
- [#11] Improved set of "munee_cache" variable on Windows.

1.3.0-pl1 (12.05.2014)
==============
- [#8] Fixed determining of cache dir for advanced site configuration.
- [#7] Fixed clearing cache.
- [#2] Added cut of comments in raw styles and scripts.
- [#9] Changed lessphp to https://github.com/oyejorge/less.php.
- Updated scssphp to version 0.0.10.

1.3.0-beta (26.12.2013)
==============
- Refactored main class.
- Rewrited snippet MinifyX.
- Added plugin MinifyX that can process scripts, styles and images of web page.
- Improved connector in assets for image processing.
- Changed cached files format.

1.2.2-pl3 (16.12.2013)
==============
- Removed phar file.
- Fixed url of cache dir in subfolder installations.
- Ability of commenting files by prefixing them by the dash.

1.2.1-pl (03.12.2013)
==============
- [#1] Replaced constant DIRECTORY_SEPARATOR to \'/\'.

1.2.0-pl (23.11.2013)
==============
- Fixed clean of parameter &cacheFolder

1.2.0-rc (20.11.2013)
==============
- Updated leafo/lessphp to v0.4.0
- Updated leafo/scssphp to v0.0.8
- Improved error logging

1.2.0-beta (12.11.2013)
==============
- Integrated Munee library from http://mun.ee
- Auto creation of cache dir.
- More options to register files on frontend.

1.1.3 (07.01.2013)
==============
- absolute path in the URL attribute of all compressed files.

1.1.2 (11.09.2012)
==============
- Improved caching of minified files.

1.1.1 (10.09.2012)
==============
- Removed E_WARNING on line 94 of minifyx.class.php

1.1.0 (09.09.2012)
==============
- Changed css minifier to Minify_CSS_Compressor from https://code.google.com/p/minify/
- Added Douglas Crockford\'s JSMin https://github.com/rgrove/jsmin-php/
- Serious refactor of code
- Added properties to snippet
- Removed plugin
- Improved caching of files
- Added parameters jsFilename && cssFilename


1.0.0
==============
- Initial Version',
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
MinifyX
--------------------

MinifyX is a MODX® Revolution addon that allows you to combine and minify JS and CSS files to speed up your site and reduce server load.

Feel free to suggest ideas/improvements/bugs on GitHub:
http://github.com/sergant210/MinifyX/issues',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '846d51e658f805830712a54ca117bb08',
      'native_key' => 'minifyx',
      'filename' => 'modNamespace/2d57be3e97fec2eb0789477a24555736.vehicle',
      'namespace' => 'minifyx',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd1da5a1a42b9e8f09a402a6bc4178273',
      'native_key' => 'minifyx_process_registered',
      'filename' => 'modSystemSetting/abc82a660ceaf3f6c75c95727615068a.vehicle',
      'namespace' => 'minifyx',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '7546aa5d03414651502937569280fc45',
      'native_key' => 'minifyx_process_images',
      'filename' => 'modSystemSetting/781846074da29293cdadfee65b9ed95d.vehicle',
      'namespace' => 'minifyx',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'bfee72488ef92e58c95f0772e36a2350',
      'native_key' => 'minifyx_exclude_registered',
      'filename' => 'modSystemSetting/2679960bddbe5ee27dd889b5905f5fda.vehicle',
      'namespace' => 'minifyx',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '92c35f6035386390209339c3289683ee',
      'native_key' => 'minifyx_exclude_images',
      'filename' => 'modSystemSetting/735de6e19c8f5a6d3da3be3409864272.vehicle',
      'namespace' => 'minifyx',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '521794294668e0ffdce15d66e5cbf91a',
      'native_key' => 'minifyx_images_filters',
      'filename' => 'modSystemSetting/9123daf5080a8129c916ec0b004bb64e.vehicle',
      'namespace' => 'minifyx',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5c633f550d5d6ac622c4616e7533395f',
      'native_key' => 'minifyx_minifyJs',
      'filename' => 'modSystemSetting/4250a926c1ad5b572f7c6df4bc87745d.vehicle',
      'namespace' => 'minifyx',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'b60755031d7ec89d0eb0e953ec41a0c1',
      'native_key' => 'minifyx_minifyCss',
      'filename' => 'modSystemSetting/aecffab71d9753bee643369e0b6999ac.vehicle',
      'namespace' => 'minifyx',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5ffbb2ecb355f4949dbfd74b011f2efd',
      'native_key' => 'minifyx_processRawJs',
      'filename' => 'modSystemSetting/be4d4f9ee90872befd817533339dc63b.vehicle',
      'namespace' => 'minifyx',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '456f694a6b625310f50b4ba6cff19678',
      'native_key' => 'minifyx_processRawCss',
      'filename' => 'modSystemSetting/79e40db79c8dad1917d23eff62170dae.vehicle',
      'namespace' => 'minifyx',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '7292c7718540c755d783c783cf646ad3',
      'native_key' => 'minifyx_jsFilename',
      'filename' => 'modSystemSetting/3bc37ea571a08b24a895d2b6c6db4fbe.vehicle',
      'namespace' => 'minifyx',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '51e98cc6acf817fa9599cfde5d244a81',
      'native_key' => 'minifyx_cssFilename',
      'filename' => 'modSystemSetting/00e9b0729b963e54fea25a24c6408a89.vehicle',
      'namespace' => 'minifyx',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '45e957c2fbdab2d50e41b1a4e8727d8f',
      'native_key' => 'minifyx_cacheFolder',
      'filename' => 'modSystemSetting/620abe33ad1d36de6444aed11674d0e5.vehicle',
      'namespace' => 'minifyx',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '222bcc9653fb768a0d5f3018f5319b45',
      'native_key' => 'minifyx_forceUpdate',
      'filename' => 'modSystemSetting/2f3925e922f672f3b226e075c5cc806b.vehicle',
      'namespace' => 'minifyx',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4cabe79ac52fc7cc8bb2c7234022a2fa',
      'native_key' => 'minifyx_forceDelete',
      'filename' => 'modSystemSetting/3923ded96e82dc36155b945e62d832c6.vehicle',
      'namespace' => 'minifyx',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '71d29ad8dc21eed2ce364df4c3b3247b',
      'native_key' => NULL,
      'filename' => 'modCategory/85ec214754ac043d71ddf8612d316c04.vehicle',
      'namespace' => 'minifyx',
    ),
  ),
);