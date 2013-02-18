moodle-block_login_userinfo
===========================
Moodle block which provides all functionality of block_login and displays additional information (username, avatar, logout button) as soon as the user is logged in


Requirements
============
This plugin requires Moodle 2.4+


Changes
=======
2013-02-18 - Check compatibility for Moodle 2.4, modified HTML and CSS to overcome problems in some core themes. Please check your custom theme if you have one
2012-11-27 - German language has been integrated into AMOS and was removed from this plugin. Please update your language packs with http://YOURMOODLEURL/admin/tool/langimport/index.php after installing this plugin version
2012-11-27 - Small code cleanup
2012-09-26 - Replace deprecated get_context_instance function
2012-06-25 - Initial version


Installation
============
Install the plugin like any other plugin to folder
/blocks/login_userinfo

See http://docs.moodle.org/24/en/Installing_plugins for details on installing Moodle plugins


Placement
=========
block_login_userinfo is used ideally as sticky block and appears on all of your moodle pages at the same position

See http://docs.moodle.org/24/en/Sticky_blocks for details about sticky blocks


Usage
=====
The block_login_userinfo plugin has two views:
As long as the user is logged out, it displays a login form just as block_login does.
As soon as the user is logged in, block_login dispears. In contrast to this, block_login_userinfo displays pleasant information about the logged in user like his/her username, his/her avatar. Additionally, it displays a logout button where the user expects it to be: exactly at the position where the login button was previously.

Furthermore, for teachers and admins, block_login_userinfo shows exactly the same information as the login info section which is normally found in the top right corner of your moodle page - especially information about role changes and about failed user logins.


Themes
======
block_login_userinfo should work with all themes from moodle core.

As block_login_userinfo duplicates information and widgets from the login info section which is normally found in the top right corner of your moodle page, I recommend to experienced themers to remove $OUTPUT->login_info() from your theme layout files.


Settings
========
block_login_userinfo has neither a settings page nor settings in config.php.


Further information
===================
block_login_userinfo is found in the Moodle Plugins repository: http://moodle.org/plugins/view.php?plugin=block_login_userinfo

Report a bug or suggest an improvement: https://github.com/abias/moodle-block_login_userinfo/issues


Moodle release support
======================
Due to limited ressources, block_login_userinfo is only maintained for the most recent major release of Moodle. However, previous versions of this plugin which work in legacy major releases of Moodle are still available as-is without any further updates in the Moodle Plugins repository.

There may be several weeks after a new major release of Moodle has been published until I can do a compatibility check and fix problems if necessary. If you encounter problems with a new major release of Moodle - or can confirm that block_login_userinfo still works with a new major relase - please let me know on https://github.com/abias/moodle-block_login_userinfo/issues


Copyright
=========
Alexander Bias, University of Ulm