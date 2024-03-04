<?php

class Model
{

//    Подключение к базе данных
    public function getPDO(): PDO
    {
        return new PDO("pgsql:host=db;dbname=postgres", "dbuser", "dbpwd");
    }
}