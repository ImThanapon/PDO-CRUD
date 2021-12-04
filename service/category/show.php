<?php
    header('Content-Type: application/json');
    require_once '../connect.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        //bindParam การใส่ค่าผ่านตัวแปรเท่านั้น และตัวแปรสุดท้ายก่อน execute เท่านั้น
        // $id = 2;
        // $stmt = $conn->prepare('SELECT * FROM categories WHERE cat_id = :cat_id '); //prepare statment ใช้ในกรณี ที่มีการรับค่ามาจากฝั่ง Front End ป้องกัน SQL Injection
        // $stmt->bindParam(':cat_id', $id);

        //bindValue การใส่ค่าไปตรงๆ หรือตัวแปรก็ได้ ถ้าเป็นตัวแปร จะเอาค่าจากการประกาศครั้งแรกเท่านั้น
        // $stmt = $conn->prepare('SELECT * FROM categories WHERE cat_id = :cat_id '); //prepare statment ใช้ในกรณี ที่มีการรับค่ามาจากฝั่ง Front End ป้องกัน SQL Injection
        // $stmt->bindValue(':cat_id', 1);

        //วิธี Question Mark
        // $param = [2,'food'];
        // $stmt = $conn->prepare('SELECT * FROM categories WHERE cat_id = ? AND cat_name = ?'); 
        // $stmt->execute($param);
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //วิธี Named Parameter
        // $param = array(
        //     ':cat_id'=>2
        // );
        // $stmt = $conn->prepare('SELECT * FROM categories WHERE cat_id = :cat_id '); 
        // $stmt->execute($param);

        // $id = isset($_GET['cat_id']) ? $_GET['cat_id'] : null; //short if statment
        
        $id = $_GET['cat_id'] ?? null; //แบบไม่ใช่ isset , PHP 7 ขึ้นไปถึงใช้ได้ อธิบาย ซ้ายมีข้อมูลมั้ย ถ้ามีเอาซ้าย ถ้าไม่มีเอาขวา
        if ($id) {
            $param = array(':cat_id'=> $id);
            $stmt = $conn->prepare('SELECT * FROM categories WHERE cat_id = :cat_id '); 
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
                    'message' => 'ไม่มีข้อมูล Not found!'
                );
                http_response_code(404);
                echo json_encode($response); 
            }
        }else{ // ถ้า $id ไม่ได้ถูกส่งมา จะถือว่าไม่ได้ทำตามจุดประสงค์ API
            $response = array(
                'status' => false,
                'message' => 'Bad Request!'
            );
            http_response_code(400);
            echo json_encode($response);
        }
    }else{
        $response = array(
            'status' => false,
            'message' => 'ไม่ได้รับอนุญาตให้ใช้งาน Method not Allowed!!'
        );
        http_response_code(405);
        echo json_encode($response);
    }