<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once '../connect.php';

    // if($_SERVER['REQUEST_METHOD'] === 'GET'){
    //     $stmt = $conn->query('SELECT * FROM products');
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     if (count($result)) { //ค่ามากกว่า 1 จะเป็น true เมื่อเป็น 0 จะเป็น false
    //         $response = array(
    //             'status' => true,
    //             'response' => $result,
    //             'message' => 'ดึงข้อมูลสำเร็จ'
    //         );
    //         http_response_code(200); //ส่ง status ไปยัง Cilent
    //         echo json_encode($response); //แปลง response ให้เป็น JSON ที่ฝั่ง Javascript สามารถอ่านได้
    
    //     }else{
    //         $response = array(
    //             'status' => false,
    //             'message' => 'ไม่มีข้อมูลใน database'
    //         );
    //         http_response_code(400);
    //         echo json_encode($response);
    //     }   
    // }else{
    //     $response = array(
    //         'status' => false,
    //         'message' => 'ไม่ได้รับอนุญาตให้ใช้งาน Method not Allowed!!'
    //     );
    //     http_response_code(405);
    //     echo json_encode($response);
    // }
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        
        $id = $_GET['p_id'] ?? null; //แบบไม่ใช่ isset , PHP 7 ขึ้นไปถึงใช้ได้ อธิบาย ซ้ายมีข้อมูลมั้ย ถ้ามีเอาซ้าย ถ้าไม่มีเอาขวา
        
        if ($id) {
            $param = array(
                ':p_id'=> $id
            );
            $stmt = $conn->prepare('SELECT * FROM products WHERE p_id = :p_id '); 
            $stmt->execute($param);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($result)){
                $response = array(
                    'status' => true,
                    'response' => $result[0],
                    'message' => 'ดึงข้อมูลสำเร็จ GET Data Success'
                );
                http_response_code(200);
                echo json_encode($response);    
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'ไม่มีข้อมูลใน Database'
                );
                http_response_code(404);
                echo json_encode($response); 
            }
        }else{
            $stmt = $conn->query('SELECT * FROM products');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result)) { //ค่ามากกว่า 1 จะเป็น true เมื่อเป็น 0 จะเป็น false
                $response = array(
                    'status' => true,
                    'response' => $result,
                    'message' => 'ดึงข้อมูลสำเร็จ'
                );
                http_response_code(200); //ส่ง status ไปยัง Cilent
                echo json_encode($response); //แปลง response ให้เป็น JSON ที่ฝั่ง Javascript สามารถอ่านได้
        
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'ไม่มีข้อมูลใน Database'
                );
                http_response_code(400);
                echo json_encode($response);
            }
        }
    }else{
        $response = array(
            'status' => false,
            'message' => 'ไม่ได้รับอนุญาตให้ใช้งาน Method not Allowed!!'
        );
        http_response_code(405);
        echo json_encode($response);
    }