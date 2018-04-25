<?php

class Session
{
    protected static $_sessionStarted = false;
    protected static $_sessionIdRegenerated = false;

    public function __construct()
    {
        if (!self::$_sessionStarted) {
            session_start();

            self::$_sessionStarted = true;
        }
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name, $default = null)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : $default;
    }

    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    public function clear()
    {
        $_SESSION = array();
    }

    public function regenerate($destroy = true)
    {
        if (!self::$_sessionIdRegenerated) {
            session_regenerate_id($destroy);

            self::$_sessionIdRegenerated = true;
        }
    }

    public function setAuthenticated($bool)
    {
        $this->set('_authenticated', (bool)$bool);

        $this->regenerate();
    }

    public function isAuthenticated()
    {
        return $this->get('_authenticated', false);
    }
}
