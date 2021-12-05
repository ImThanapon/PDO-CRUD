<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once '../connect.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $stmt = $conn->query('SELECT * FROM products');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $response = array(
            'status' => true,
            'response' => $result,
            'message' => 'ดึงข้อมูลสำเร็จ'
        );
        http_response_code(200); 
        echo json_encode($response);   
    }else{
        $response = array(
            'status' => false,
            'message' => 'ไม่ได้รับอนุญาตให้ใช้งาน Method not Allowed!!'
        );
        http_response_code(405);
        echo json_encode($response);
    }
    



