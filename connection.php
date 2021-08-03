<?php
session_start();
class Connection{
	public function get_connection(){
	    $host = "localhost";
	    $database = "ngeunah";
	    $username = "root";
	    $password = "";
	    $connect = new mysqli($host, $username, $password, $database);
	    return $connect;
	 }

	public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }
} 



?>