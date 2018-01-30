<?php

class Member {

    var $id;
    var $login;
    var $password;
    var $mail;
    var $teamLeader;


    function set_id($new_id) {
        $this->id = $new_id;
    }
    function get_id() {
        return $this->id;
    }


    function set_login($new_login) {
        $this->login = $new_login;
    }
    function get_login() {
        return $this->login;
    }


    function set_password($new_password) {
        $this->password = $new_password;
    }
    function get_password() {
        return $this->password;
    }


    function set_mail($new_mail) {
        $this->mail= $new_mail;
    }
    function get_mail() {
        return $this->mail;
    }


    function set_teamLeader($new_teamLeader) {
        $this->teamLeader= $new_teamLeader;
    }
    function get_teamLeader() {
        return $this->teamLeader;
    }

}
