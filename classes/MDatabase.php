<?php
require_once(MBase::getBase() . "classes/MError.php");
class MDatabase {
    private $con = null;
    private $host = "";
    private $username = "";
    private $password = "";
    private $port = 3306;
    private $database = "";
    private $prefix = "";
    public static $dieError = true;

    public static function init()
    {
        $db = new self();
        $db->connect();
        return $db;
    }

    public function __construct($host = "mahlke-concepts.de", $username = "guardian", $password = "XRxHq5LOY0ej1j0q", $port = 3306, $database = "guardian", $prefix = "ga_")
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
        $this->database = $database;
        $this->prefix = $prefix;
    }

    public function prepareTables() {
        //TODO FINISH $this->executeQuery("CREATE TABLE IF NOT EXISTS `" . $this->prefix . "user` (`uuid` VARCHAR(32) NOT NULL PRIMARY KEY, `username` TEXT NOT NULL, `session` TEXT, `sessionExpires` BIGINT, `socketToken` TEXT, `socketTokenExpires` BIGINT); ");
    }

    public function connect()
    {
        $this->con = @mysqli_connect($this->host, $this->username, $this->password, $this->database, $this->port);
        if ($this->con->connect_error || $this->con == null) return self::error(MError::DATABASE_ERROR);

        mysqli_set_charset($this->con, "UTF8");
        $this->executeQuery("SET NAMES 'utf8'");
        $res = $this->executeQuery("SET CHARACTER SET 'utf8'");

        if (!$res) return self::error((MError::DATABASE_ERROR));

        $this->prepareTables();

        return $this->con;
    }

    public function close()
    {
        if (mysqli_connect_errno() == false) {
            try {
                $this->con->close();
                $this->con = null;
            } catch (Exception $ex) {
                return self::error((MError::DATABASE_ERROR));
            }
        }
    }

    public function getConnection()
    {
        return $this->con;
    }

    public function getTablePrefix()
    {
        return $this->prefix;
    }

    public function executeQuery($sql)
    {
        $sql = $this->prepareQuery($sql);

        $result = mysqli_query($this->con, $sql);
        if (!$result) return self::error((MError::QUERY_ERROR));

        return $result;
    }

    public function insert($sql)
    {
        $sql = $this->prepareQuery($sql);

        $result = mysqli_query($this->con, $sql);
        if (!$result) return self::error((MError::QUERY_ERROR));

        return mysqli_insert_id($this->con);
    }

    public function insertid()
    {
        return mysqli_insert_id($this->con);
    }

    public function quote($string) {
        return mysqli_real_escape_string($this->con, $string);
    }

    public function prepareQuery($sql) {
        $sql = str_replace("__", $this->prefix, $sql);

        return $sql;
    }

    private static function error($msg) {
        if (self::$dieError) die($msg);
        return $msg;
    }
}