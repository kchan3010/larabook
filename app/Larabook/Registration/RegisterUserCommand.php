<?php


namespace Larabook\Registration;


/**
 * Basically a data transfer object
 */
class RegisterUserCommand
{

    public $username;
    public $email;
    public $password;

    function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


}