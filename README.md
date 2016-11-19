moodle-block_login_userinfo
===========================

Moodle block which provides all functionality of block_login and displays additional information (username, avatar, logout button) as soon as the user is logged in


Requirements
------------

This plugin requires Moodle 3.0+


Changes
-------

* 2016-11-19 - New release v3.1-r1 (2016111900): Checked compatibility for Moodle 3.1, no functionality change, some coding style amendments
* 2016-11-19 - Updated info of the new maintainer
* 2016-11-19 - Transfer Github repository from github.com/moodleuulm/... to github.com/EizEddin/...; Please update your Git paths if necessary
* 2016-02-10 - Change plugin version and release scheme to the scheme promoted by moodle.org, no functionality change
* 2016-01-25 - Improve RewriteRules in README, no functionality change - Credits to Daniel Ruf		
* 2016-01-01 - Check compatibility for Moodle 3.0, no functionality change
* 2015-08-21 - Change My Moodle to Dashboard in language pack
* 2015-08-18 - Check compatibility for Moodle 2.9, no functionality change
* 2015-01-23 - Check compatibility for Moodle 2.8, no functionality change
* 2014-08-29 - Update README file
* 2014-08-19 - Use another "username" string when $CFG->authloginviaemail is used
* 2014-06-30 - Drop support for Non-Bootstrap based themes
* 2014-06-30 - Check compatibility for Moodle 2.7, no functionality change
* 2014-01-31 - Bugfix: This block used the same title as the core block_login plugin which caused CLI updates to fail under certain circumstances
* 2014-01-31 - Check compatibility for Moodle 2.6, no functionality change
* 2013-09-02 - Add non-vendor-prefixed styles for pulse text style (used when displaying failed logins)
* 2013-07-30 - Transfer Github repository from github.com/abias/... to github.com/moodleuulm/...; Please update your Git paths if necessary
* 2013-07-30 - Check compatibility for Moodle 2.5, no functionality change
* 2013-04-23 - Add required capability for placing block on MyMoodle page
* 2013-03-25 - Small code change because of change in Moodle core which is the basis for this plugin
* 2013-03-18 - Fix php strict standards bug, Code cleanup according to moodle codechecker
* 2013-02-18 - Check compatibility for Moodle 2.4, modified HTML and CSS to overcome problems in some core themes. Please check your custom theme if you have one
* 2012-11-27 - German language has been integrated into AMOS and was removed from this plugin. Please update your language packs with http://YOURMOODLEURL/admin/tool/langimport/index.php after installing this plugin version
* 2012-11-27 - Small code cleanup
* 2012-09-26 - Replace deprecated get_context_instance function
* 2012-06-25 - Initial version


Installation
------------

Install the plugin like any other plugin to folder
/blocks/login_userinfo

See http://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins


Placement
---------

block_login_userinfo is used ideally as sticky block and appears on all of your moodle pages at the same position

See http://docs.moodle.org/en/Block_settings#Making_a_block_sticky_throughout_the_whole_site for details about sticky blocks


Usage
-----

The block_login_userinfo plugin has two views:

* As long as the user is logged out, it displays a login form just as block_login does.
* As soon as the user is logged in, block_login dispears. In contrast to this, block_login_userinfo displays pleasant information about the logged in user like his/her username, his/her avatar. Additionally, it displays a logout button where the user expects it to be: exactly at the position where the login button was previously.

Furthermore, for teachers and admins, block_login_userinfo shows exactly the same information as the login info section which is normally found in the top right corner of your moodle page - especially information about role changes and about failed user logins.


Themes
------

block_login_userinfo should work with all Bootstrap based Moodle themes.

As block_login_userinfo duplicates information and widgets from the login info section which is normally found in the top right corner of your moodle page, I recommend to experienced themers to remove $OUTPUT->login_info() from your theme layout files.


Settings
--------

block_login_userinfo has neither a settings page nor settings in config.php.


Further information
-------------------

block_login_userinfo is found in the Moodle Plugins repository: https://moodle.org/plugins/view/block_login_userinfo

Report a bug or suggest an improvement: https://github.com/EizEddin/moodle-block_login_userinfo/issues


Moodle release support
----------------------

Due to limited resources, block_login_userinfo is only maintained for the most recent major release of Moodle. However, previous versions of this plugin which work in legacy major releases of Moodle are still available as-is without any further updates in the Moodle Plugins repository.

There may be several weeks after a new major release of Moodle has been published until we can do a compatibility check and fix problems if necessary. If you encounter problems with a new major release of Moodle - or can confirm that block_login_userinfo still works with a new major relase - please let us know on https://github.com/EizEddin/moodle-block_login_userinfo/issues


Right-to-left support
---------------------

This plugin has not been tested with Moodle's support for right-to-left (RTL) languages.
If you want to use this plugin with a RTL language and it doesn't work as-is, you are free to send me a pull request on
github with modifications.


Copyright
---------

2016 onwards Eiz Eddin Al Katrib


Original author
---------------

University of Ulm
kiz - Media Department
Team Web & Teaching Support
Alexander Bias


Change of maintainer
---------------------

On 18/11/2016, this plugin was transferred to Eiz Eddin Al Katrib who is now the main maintainer.
