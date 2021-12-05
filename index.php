<?php

    require '../PDO-CRUD/service/connect.php';
    $url = 'http://localhost/DEENA/PDO-CRUD/service/product/'; 
    try{
        $ch = curl_init(); 
        // curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false); 
        // curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET'); // กำหนด Method เป็น GET
        curl_setopt( $ch, CURLOPT_URL, $url );  // กำหนด url ของ api
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true); // กำหนด True คือ response ค่ากลับมาเป็น String ซึ่งเราจะนำไปแปลงเป็น JSON อีกที
        $content = curl_exec( $ch );
        curl_close($ch);
        $data = json_decode($content);
        // echo '<pre>';
        // print_r($data->response); //$data->response[0]->cat_title
        // echo '</pre>';

    }catch(Exception $ex){
        echo $ex;
    }    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Covid API</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0-rc/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container brand pt-3">
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link"><b>API Calling</b> แสดงรายการสินค้าจาก api</a>
                        </li>
                        <button onclick='alert()' class="btn btn-primary" role="button">เพิ่มข้อมูลสินค้า</button>
                    </ul>
                    
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="pt-3 pb-3 content">
                <div class="container">
                    <!-- Default box -->
                            <?php for ($i=0; $i < count($data->response) ; $i++) { 
                                ?>
                                <div class="card card-solid">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <h3 class="d-inline-block d-sm-none"><?php echo $data->response[$i]->p_name ?></h3>
                                                <div class="col-6 rounded mx-auto d-block">
                                                    <img src=<?php echo $data->response[$i]->p_image ?> class="product-image" alt="Product Image">
                                                </div>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                <h3 class="my-3"><?php echo $data->response[$i]->p_name ?></h3>
                                                <p><b><?php echo $data->response[$i]->p_title ?></b>
                                                    <br><hr>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam esse eum sed ipsum explicabo ad quibusdam, laborum modi, consectetur autem eos voluptas laboriosam. Sed quod saepe deleniti quibusdam at veniam?</p>

                                                <hr>
                                            
                                                <div class="bg-gray py-2 px-3 mt-4">
                                                    <h2 class="mb-0">
                                                    <?php echo number_format($data->response[$i]->p_price)  ?> บาท
                                                    </h2>
                                                    <span class="mt-0">
                                                    ราคานี้รวมภาษีมูลค่าเพิ่มแล้ว
                                                    </span>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                
                                <?php
                            }
                            
                            ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function alert(){
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'คุณต้องการเพิ่มรายการสินค้า ?',
            text: "ข้อมูลสินค้าจากการ Calling API-Nack",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                'ทำรายการสำเร็จ!',
                'เพิ่มรายการสินค้าด้วยการ Calling API',
                'success'
                )
                setTimeout(function() {
                    window.location.replace("../PDO-CRUD/service/insert.php");
                }, 2000);
                
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'ยกเลิกคำสั่งแล้ว',
                'ขอบคุณที่ลองคลิก ไว้โอกาสหน้ามาคลิกฉันอีกนะ',
                'error'
                )
            }
            })




            
            // Swal.fire({
            //     icon: 'success',
            //     title: 'ทำรายการสำเร็จ',
            //     text: 'เพิ่มรายการสินค้าด้วยการ Calling API',
            //     footer: '<a href="../PDO-CRUD/service/insert.php">เรียกดู API รายการสินค้า </a>'
            // })
        }
    </script>
</body>
</html>