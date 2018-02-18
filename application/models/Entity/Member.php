<?php
/* MAJ */
class Member {

    private $id;
    private $login;
    private $password;
    private $mail;
    private $teamLeader;


    public function set_id($new_id) {
        $this->id = $new_id;
    }
    public function get_id() {
        return $this->id;
    }


    public function set_login($new_login) {
        $this->login = $new_login;
    }
    public function get_login() {
        return $this->login;
    }


    public function set_password($new_password) {
        $this->password = $new_password;
    }
    public function get_password() {
        return $this->password;
    }


    public function set_mail($new_mail) {
        $this->mail= $new_mail;
    }
    public function get_mail() {
        return $this->mail;
    }


    public function set_teamLeader($new_teamLeader) {
        $this->teamLeader= $new_teamLeader;
    }
    public function get_teamLeader() {
        return $this->teamLeader;
    }

}
