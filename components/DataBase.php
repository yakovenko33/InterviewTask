<?php


class DataBase
{

    public static function getPDO()
    {
        $configDB = require_once(ROOT.'/config/configDataBase.php');

        $dsn = $dsn = "mysql:host={$configDB['host']};dbname={$configDB['db']};charset={$configDB['charset']}";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $configDB['user'], $configDB['pass'], $opt);

        return  $pdo;
    }
}






