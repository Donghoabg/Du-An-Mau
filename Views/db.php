<?php
class DB {
    public static function connect() {
        return new PDO("mysql:host=localhost;dbname=duan;charset=utf8", "root", "");
    }
}
