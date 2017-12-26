<?php
require_once("MError.php");

class MDatabase {

    public static $dieError = true;

    public static function init(){
        $db = new self();
        $db->connect();
        return $db;
    }

    public function __construct($host = null, $username = null, $password = null, $port = null, $database = null) {
        $cfg = MBase::getConfig()["database"];

        $this->host     = $host     != null ? $host     : $cfg["host"];
        $this->username = $username != null ? $username : $cfg["username"];
        $this->password = $password != null ? $password : $cfg["password"];
        $this->port     = $port     != null ? $port     : $cfg["port"];
        $this->database = $database != null ? $database : $cfg["database"];
    }

    public function prepareTables() {
        //TODO
    }

    public function connect()
    {
        $this->con = @mysqli_connect($this->host, $this->username, $this->password, $this->database, $this->port);
        if ($this->con->connect_error || $this->con == null) return self::error(MError::DATABASE_ERROR);

        mysqli_set_charset($this->con, "UTF8");
        $this->executeQuery("SET NAMES 'utf8'");
        $res = $this->executeQuery("SET CHARACTER SET 'utf8'");

        if (!$res) return self::error(MError::DATABASE_ERROR);

        $this->prepareTables();

        return $this->con;
    }

    public function close(){
        if (mysqli_connect_errno() == false) {
            try {
                $this->con->close();
                $this->con = null;
            } catch (Exception $ex) {
                return self::error(MError::DATABASE_ERROR);
            }
        }
    }

    public function getConnection()
    {
        return $this->con;
    }

    public function executeQuery($sql)
    {
        $result = mysqli_query($this->con, $sql);
        if (!$result) return self::error(mysqli_error($this->con));

        return $result;
    }

    public function quote($string) {
        return mysqli_real_escape_string($this->con, $string);
    }

    private static function error($msg) {
        echo($msg);
        return $msg;
    }
}

class MDatabaseAuth {
    /**
     * @param $username string
     * @return MUser|null
     */
    public static function getUser($username) {
        $db = MDatabase::init();
        $res = $db->executeQuery("SELECT * FROM `tbl_user` WHERE `username`='" . $db->quote($username). "';");

        if (!$res) {
            $db->close();
            return null;
        }

        if (mysqli_num_rows($res) != 1) {
            $db->close();
            return null;
        }

        $result = mysqli_fetch_array($res);
        $db->close();


        return new MUser($result["username"], $result["session"], $result["sessionExpires"]);
    }

    /**
     * @param $username string
     * @return bool
     */
    public static function resetUser($username) {
        $db = MDatabase::init();
        $res = $db->executeQuery("UPDATE `tbl_user` SET `session` = NULL, `sessionExpires` = NULL  WHERE `username` = '" . $db->quote($username) . "';");

        $db->close();
        return $res;
    }

    /**
     * @param $username string
     * @return null|string
     */
    public static function loginUser($username) {
        $db = MDatabase::init();
        $ses = MBase::generateString(32);

        $res = $db->executeQuery("UPDATE `tbl_user` SET `session` = '" . $ses . "', `sessionExpires` = '" . (time() + 60 * 60 * 24 * 2) ."' WHERE `username`='" . $db->quote($username) . "';");

        $db->close();
        if (!$res) return null;
        return $ses;
    }
}

class MDatabaseElement {
    /**
     * sets the description of an element
     * @param $name string name
     * @param $description string description
     * @return bool
     */
    public static function setDescription($name, $description) {
        $name = strtolower($name);

        $db = MDatabase::init();
        $res = $db->executeQuery("REPLACE INTO `tbl_element_description` (`name`, `description`) VALUES ('" . $name . "','" . $description . "')");

        $db->close();
        if (!$res) return false;
        return true;
    }

    /**
     * gets the description of an element
     * @param $name string name
     * @return string
     */
    public static function getDescription($name) {
        $name = strtolower($name);

        $db = MDatabase::init();
        $res = $db->executeQuery("SELECT `description` FROM `tbl_element_description` WHERE `name` = '" . $name . "'");

        if (!$res) {
            $db->close();
            return "TO BE FILLED BY STORY";
        }

        if (mysqli_num_rows($res) != 1) {
            $db->close();
            return "TO BE FILLED BY STORY";
        }

        $result = mysqli_fetch_array($res);
        $db->close();


        return $result["description"];
    }

    public static function getAllDescriptions() {
        $db = MDatabase::init();
        $res = $db->executeQuery("SELECT * FROM `tbl_element_description`");

        if (!$res) {
            $db->close();
            return array();
        }

        if (mysqli_num_rows($res) == 0) {
            $db->close();
            return array();
        }

        $result = array();

        while ($row = $res->fetch_assoc()) {
            $result[$row["name"]] = $row["description"];
        }

        $db->close();

        return $result;
    }
}