<?php 

    //กำหนดสถานะของหน้าเว็บไซต์ให้เป็น JSON ด้วย Header
    header('Content-Type: application/json');
    require_once 'connect.php';

    $query = $conn->query('SELECT * FROM products'); //query ข้อมูล 

    //fetch มีหลายชนิด แต่ fetch เฉยๆจะดึงแค่ข้อมูลตัวแรกออกมา
    // $result = $query->fetch(PDO::FETCH_ASSOC); //fetch ข้อมูล ::FETCH_ASSOC คือ static method 
    
    // while ($row = $query->fetch(PDO::FETCH_ASSOC) ) {
    //     print_r($row);
    // }


    /** PDOstament : fetch style */
    echo 'PDO::FETCH_BOTH : ';
    echo "เป็นค่าพื้นฐานของการ Fetch ข้อมูล โดยส่งคืนค่าข้อมูลเป็นอาร์เรย์ ที่ใช้ชื่อคอลัมน์เป็น index และตัวเลขของข้อมูล \n\n\n";
    // $result = $query->fetchAll(PDO::FETCH_BOTH);
    // print_r($result);

    echo 'PDO::FETCH_ASSOC : ';
    echo "ส่งคืนค่าข้อมูลเป็นอาร์เรย์ ที่ใช้ชื่อคอลัมน์เป็น index ของข้อมูล\n\n\n";
    // $result = $query->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);
    // echo $result[0]['p_name'];

    echo 'PDO::FETCH_NUM : ';
    echo "ส่งคืนค่าข้อมูลเป็นอาร์เรย์ ที่ใช้ตัวเลขคอมลัมน์เป็น index ของข้อมูล โดยเริม่จาก 0 เสมอ\n\n\n";
    // $result = $query->fetchAll(PDO::FETCH_NUM);
    // print_r($result);
    // echo $result[0][2];

    echo 'PDO::FETCH_OBJ : ';
    echo "ส่งคืนค่าข้อมูลเป็นออบเจ็ค โดยใช้ชื่อคอมลัมน์เป็น index ของข้อมูล \n\n\n";
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    print_r($result);
    echo $result[0]->p_name;
    echo "\n";
    echo $result[1]->p_name;
?>