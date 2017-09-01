<?php

class MBase {
    private static $initialized = false;

    /** @var MUser logged-in user instance */
    public static $user = null;


    public static function initialize() {
        if (self::$initialized)
            return;

        self::$initialized = true;

        require_once ("classes/MUser.php");
        self::$user = MUser::getCurrentUser();

        if (self::$user == MError::RESTRICTED_ACCESS || self::$user == MError::DATABASE_ERROR || self::$user == MError::QUERY_ERROR) {
            self::$user = null;
        }
    }

    public static function getUser() {
        self::initialize();
        return self::$user;
    }

    public static function generateString($length = 15, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}