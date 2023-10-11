<?php

class Session
{
    private $sessionName = 'meux_soft_com_tr';

    public function __construct()
    {
        session_name($this->sessionName);
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public function getSessionName()
    {
        return $this->sessionName;
    }

    public function destroy()
    {
        session_destroy();
    }
}