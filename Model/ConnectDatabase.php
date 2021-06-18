<?php

class ConnectDatabase
{

    public function connect(): PDO
    {

            $databaseHost = "localhost";
            $databaseUser = "root";
            $databasePassword = "pikAKorijen1120";
            $databaseName = "price";

            $driverOptions = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];
            //echo 'Connected successfully';
            return new PDO('mysql:host=' . $databaseHost . ';dbname=' . $databaseName, $databaseUser, $databasePassword, $driverOptions);

    }
}
