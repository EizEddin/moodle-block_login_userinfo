<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block "login / userinfo"
 *
 * @package    block_login_userinfo
 * @copyright  2016 onwards Eiz Eddin Al Katrib  <eiz@barasoft.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_login_userinfo extends block_base {
    function init() {
        $this->title = get_string('pluginname', 'block_login_userinfo');
    }

    function specialization() {
        if (!isloggedin() or isguestuser()) {
            $this->title = get_string('login');
        } else {
            $this->title = get_string('user');
        }
    }

    function html_attributes() {
        if (!isloggedin() or isguestuser()) {
            return array('id' => 'inst'.$this->instance->id, 'class' => 'block block_login block_'. $this->name());
        } else {
            return array('id' => 'inst'.$this->instance->id, 'class' => 'block block_userinfo block_'. $this->name());
        }
    }

    function applicable_formats() {
        return array('site' => true);
    }

    function has_config() {
        return false;
    }

    function instance_allow_multiple() {
        return false;
    }

    function instance_can_be_hidden() {
        return false;
    }

    function get_content () {
        global $USER, $CFG, $SESSION, $OUTPUT;
        $wwwroot = '';
        $signup = '';

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($CFG->loginhttps)) {
            $wwwroot = $CFG->wwwroot;
        } else {
            // This actually is not so secure ;-), 'cause we're
            // in unencrypted connection...
            $wwwroot = str_replace("http://", "https://", $CFG->wwwroot);
        }

        if (!empty($CFG->registerauth)) {
            $authplugin = get_auth_plugin($CFG->registerauth);
            if ($authplugin->can_signup()) {
                $signup = $wwwroot . '/login/signup.php';
            }
        }
        // TODO: now that we have multiauth it is hard to find out if there is a way to change password
        $forgot = $wwwroot . '/login/forgot_password.php';

        if (!empty($CFG->loginpasswordautocomplete)) {
            $autocomplete = 'autocomplete="off"';
        } else {
            $autocomplete = '';
        }

        $username = get_moodle_cookie();

        $this->content = new stdClass();
        $this->content->footer = '';
        $this->content->text = '';

        if (!isloggedin() or isguestuser()) {   // Show the block
            if (empty($CFG->authloginviaemail)) {
                $strusername = get_string('username');
            } else {
                $strusername = get_string('usernameemail');
            }

            $this->content->text .= "\n".'<form class="loginform" id="login" method="post" action="'.get_login_url().'" '.$autocomplete.'>';

            $this->content->text .= '<div class="c1 fld username"><label for="login_username">'.$strusername.'</label>';
            $this->content->text .= '<input type="text" name="username" id="login_username" value="'.s($username).'" /></div>';

            $this->content->text .= '<div class="c1 fld password"><label for="login_password">'.get_string('password').'</label>';
            $this->content->text .= '<input type="password" name="password" id="login_password" value="" '.$autocomplete.' /></div>';

            if (isset($CFG->rememberusername) and $CFG->rememberusername == 2) {
                $checked = $username ? 'checked="checked"' : '';
                $this->content->text .= '<div class="c1 rememberusername"><input type="checkbox" name="rememberusername" id="rememberusername" value="1" '.$checked.'/>';
                $this->content->text .= ' <label for="rememberusername">'.get_string('rememberusername', 'admin').'</label></div>';
            }

            $this->content->text .= '<div class="c1 btn"><input type="submit" value="'.get_string('login').'" /></div>';

            $this->content->text .= "</form>\n";

            if (!empty($signup)) {
                $this->content->footer .= '<div><a href="'.$signup.'">'.get_string('startsignup').'</a></div>';
            }
            if (!empty($forgot)) {
                $this->content->footer .= '<div><a href="'.$forgot.'">'.get_string('forgotaccount').'</a></div>';
            }
        } else {
            $this->content->text .= '<div class="wrapper">';
                $this->content->text .= $OUTPUT->user_picture($USER, array('size'=>30));
                $renderer = $this->page->get_renderer('block_login_userinfo');
                $this->content->text .= $renderer->login_userinfo();
            $this->content->text .= '</div>';
        }

        return $this->content;
    }
}
