<?php
    require_once 'connect.php';

    $get_data = file_get_contents('http://localhost/DEENA/api-nack/product/');
    $json_data = json_decode($get_data);
    // echo '<pre>';
    // print_r($json_data->response);
    // echo '</pre>';
    
    $count_data = count($json_data->response);
    echo $count_data;
    for ($i=0; $i < $count_data; $i++) { 
        try {
            $param = [
                $json_data->response[$i]->p_name,
                $json_data->response[$i]->p_title,
                $json_data->response[$i]->p_detail,
                $json_data->response[$i]->p_price,
                $json_data->response[$i]->p_image,
                true,
                $json_data->response[$i]->cat_id
            ];
            $stmt = $conn->prepare('INSERT INTO products (p_name, p_title, p_detail, p_price, p_image, p_status, cat_id) VALUES (?,?,?,?,?,?,?)'); 
            $stmt->execute($param);
            
            header("Location: http://localhost/DEENA/PDO-CRUD/");
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        

    }




    
?>