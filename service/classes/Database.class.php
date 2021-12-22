<?php

class Database
{

    private $DB_HOST = 'localhost';
    private $DB_NAME = 'pdo_crud';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';

    private $connect = null;

    public function connect()
    {
        //ใช้ Try Catch กำหนดการทำงานหลังเกิดข้อผิดพลาด
        try {
            //สร้าง instant ของ Class PDO ให้สามารถเรียก Mysql ได้
            $this->connect = new PDO(
                "mysql:host={$this->DB_HOST}; 
                dbname={$this->DB_NAME};
                charset=utf8",
                $this->DB_USERNAME,
                $this->DB_PASSWORD
            );
            //Set mode Error ของ PDO ให้เป็น MODE EXCEPTION
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connect;
        
        } catch (Throwable $th) {
            echo 'การเชื่อมต่อฐานข้อมูลล้มเหลว : ' . $th->getMessage();
            exit();
        }
    }
}

$database = new Database;
$conn = $database->connect();
print_r($conn);
