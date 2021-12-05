<?php
    //กำหนดตัวแปร
    $DB_HOST = 'localhost';
    $DB_NAME = 'pdo_crud';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';

    //ใช้ Try Catch กำหนดการทำงานหลังเกิดข้อผิดพลาด
    try {
        //สร้าง instant ของ Class PDO ให้สามารถเรียก Mysql ได้
        $conn = new PDO("mysql:host={$DB_HOST}; 
        dbname={$DB_NAME};
        charset=utf8", 
        $DB_USERNAME, $DB_PASSWORD); 
        //Set mode Error ของ PDO ให้เป็น MODE EXCEPTION
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\Throwable $th) {
        echo 'การเชื่อมต่อฐานข้อมูลล้มเหลว : '.$th->getMessage();
        exit();
    }

    
?>