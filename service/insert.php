<?php
    require_once 'connect.php';

    $get_data = file_get_contents('http://localhost/DEENA/api-nack/product/');
    $json_data = json_decode($get_data);
    // echo '<pre>';
    // print_r($json_data->response);
    // echo '</pre>';

 
    // $curl = curl_init();
     
    // curl_setopt_array($curl, array(
    // CURLOPT_URL => "https://opend.data.go.th/get-ckan/datastore_search?resource_id=e8daef1c-12bb-4704-b9bd-c1b7b97a1131",
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => "",
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 30,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => "GET",
    // CURLOPT_HTTPHEADER => array(
    // "api-key: n4QxKT2y64q7O8FnZDVrIFsjvQwmRgIP",
    // "resource_id: e8daef1c-12bb-4704-b9bd-c1b7b97a1131"
    // )
    // ));
     
    // $response = curl_exec($curl);
    // $err = curl_error($curl);
     
    // curl_close($curl);
     
    // if ($err) {
    // echo "cURL Error #:" . $err;
    // } else {
    // echo $response;
    // echo 'dd';
    // }






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