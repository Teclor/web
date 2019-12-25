<?php
class DB
{
    static private $db;

    static public function init() {
        try {
            $db_info = array(
                'server' => 'localhost',
                'adminname' =>'root',
                'adminpassword'=>'',
                'name' =>'favbook'
            );
            $dsn='mysql:host='.$db_info['server'].';dbname='.$db_info['name'].';charset=utf8';
            self::$db = new PDO($dsn, $db_info['adminname'], $db_info['adminpassword']);
        } catch (PDOException $e) {
            setcookie('error',$e, time()+5, "/");
            header("Location: ..\handlers\default_error_handler.php");
            die();
        }
    }

    static public function get_database_handler(){
        return self::$db;
    }
    static public function query($sql) {
        return self::$db->query($sql);
    }

    static public function exec($sql) {
        return self::$db->exec($sql);
    }


    static public function column($sql) {
        return self::$db->query($sql)->fetchColumn();
    }

    static public function columnInt($sql) {
        return intval(self::$db->query($sql)->fetchColumn());
    }

    static public function prepare($sql) {
        return self::$db->prepare($sql);
    }

    static public function lastInsertId() {
        return self::$db->lastInsertId();
    }

    static public function execute($sql, $ar) {
        return self::$db->prepare($sql)->execute($ar);
    }

    static public function error() {
        $ar = self::$db->errorInfo();
        return $ar[2] . ' (' . $ar[1] . '/' . $ar[0] . ')';
    }

    static public function fetchAssoc($sql) {
        return self::$db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    static public function fetchNum($sql) {
        return self::$db->query($sql)->fetch(PDO::FETCH_NUM);
    }

}
DB::init();
?>