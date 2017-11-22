<?php
require_once('MError.php');
require_once('MDatabase.php');

class MUser {
    /** @var string username */
    public $username = "";

    /** @var string user session */
    public $session = "";

    /** @var int timestamp when session expires */
    public $sessionExpires = null;


    public function __construct($username, $session, $sessionExpires) {
        $this->username = $username;
        $this->session = $session;
        $this->sessionExpires = $sessionExpires;
    }

    public static function clearSession() {
        $_SESSION["session"] = null;
        $_SESSION["username"] = null;
    }

    public static function setSession($ses, $user) {
        $_SESSION["session"] = $ses;
        $_SESSION["username"] = $user;
    }

    public static function getCurrentUser() {
        if (empty($_SESSION["session"]) || empty($_SESSION["username"])) return null;

        $res = MDatabaseAuth::getUser($_SESSION["username"]);

        if ($res == null) return null;


        if (!($res->session == $_SESSION["session"])) {
            self::clearSession();
            return self::getCurrentUser();
        }

        if ($res->sessionExpires <= time()) {
            self::clearSession();
            return self::getCurrentUser();
        }

        return $res;
    }
}
