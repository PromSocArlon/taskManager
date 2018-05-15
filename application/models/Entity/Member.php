<?php

namespace app\models\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_member")
 **/
class Member extends Entity
{
    /** @ORM\Column(type="string") * */
    private $login;
    /** @ORM\Column(type="string") * */
    private $password;
    /** @ORM\Column(type="string") * */
    private $mail;

    public function setLogin($new_login)
    {
        $this->login = $new_login;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setPassword($new_password)
    {
        $this->password = $new_password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setMail($new_mail)
    {
        $this->mail = $new_mail;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}