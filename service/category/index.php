<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once '../connect.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $stmt = $conn->query('SELECT * FROM categories');
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
    
        




    // if (count($result)) { //ค่ามากกว่า 1 จะเป็น true เมื่อเป็น 0 จะเป็น false
    //     // print_r($result);
    //     //ในส่วน response ข้อมูล
    //     $response = array(
    //         'status' => true,
    //         'response' => $result,
    //         'message' => 'ดึงข้อมูลสำเร็จ'
    //     );
    //     http_response_code(200); //ส่ง status ไปยัง Cilent
    //     echo json_encode($response); //แปลง response ให้เป็น JSON ที่ฝั่ง Javascript สามารถอ่านได้

    // }else{
    //     $response = array(
    //         'status' => false,
    //         'message' => 'ไม่มีข้อมูล'
    //     );
    //     http_response_code(400);
    //     echo json_encode($response);
    // }




  

