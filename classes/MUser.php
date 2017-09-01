<?php
require_once(MBase::getBase() . 'classes/MError.php');
require_once(MBase::getBase() . 'classes/MDatabase.php');
require_once(MBase::getBase() . 'tools/XenForoWrapper.php');
require_once(MBase::getBase() . 'tools/UUID.php');

class MUser {
    /** @var XenForoVisitor XenForoVisitor that the user is logged in with*/
    public $visitor = null;

    /** @var string user session */
    public $session = "";

    /** @var string username */
    public $username = "";

    /** @var int timestamp when session expires */
    public $sessionExpires = -1;

    /** @var string current user socketToken */
    public $socketToken = "";

    /** @var int timestamp when socketToken expires */
    public $socketTokenExpires = 0;

    /** @var string user's firstName */
    public $firstName = "";

    /** @var string user's name */
    public $name = "";

    /** @var string user's language */
    public $lang = "";

    /** @var string user's theme */
    public $theme = "";

    public function __construct($visitor, $session, $username, $firstName, $name,  $sessionExpires, $socketToken, $socketTokenExpires, $lang, $theme) {
        $this->visitor = $visitor;
        $this->session = $session;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->name = $name;
        $this->sessionExpires = $sessionExpires;
        $this->socketToken = $socketToken;
        $this->socketTokenExpires = $socketTokenExpires;
        $this->lang = $lang;
        $this->theme = $theme;
    }

    public static function getCurrentUser() {
        //get current XenforoUser
        $user = XenForoWrapper::getXenforoVisitor();
        if (!$user) return MError::RESTRICTED_ACCESS;

        $uuid = $user->uuid;
        $uuid = UUID::fromDashed($uuid);

        //try to authenticate user
        $db = MDatabase::init();
        $res = $db->executeQuery("SELECT * FROM `__user` WHERE `uuid`='" . $db->quote($uuid). "';");

        if (!$res) return MError::RESTRICTED_ACCESS;
        if (mysqli_num_rows($res) != 1) return MError::RESTRICTED_ACCESS;

        $result = mysqli_fetch_array($res);
        if (isset($_SESSION["session"])) {
            $userSession = $_SESSION["session"];

            if (!($result['session'] == $userSession)) {
                $_SESSION['uuid'] = $uuid;
                return MInfo::SHOWPIN;
            }

            if ($result['sessionExpires'] <= time()) {
                $_SESSION['uuid'] = $uuid;
                return MInfo::SHOWPIN;
            }
        } else {
            $_SESSION['uuid'] = $uuid;
            return MInfo::SHOWPIN;
        }

        if ($result["username"] != $user->mcName) {
            $db->executeQuery("UPDATE `__user` SET `username`='" . $db->quote($user->mcName). "' WHERE `uuid`='" . $db->quote($uuid). "'");
        }

        $db->close();
        return new MUser($user, $result['session'], $user->mcName, $result['firstName'], $result['name'], $result['sessionExpires'], $result['socketToken'], $result['socketTokenExpires'], $result['lang'], $result['theme']);
    }
}
