<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css"> <!-- Kết nối CSS -->
    <title> Ego Mobile </title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
</head>
<body>
    <?php require_once 'header.php' ;?>  

<?php            
if(isset($_GET['category_id']))  
{
    require_once "config.php";
    $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM db_phone WHERE category_id=$category_id";

    // Thực thi câu lệnh
    $result = $conn->query($sql);
    
    if ($result) {
        // Lấy và chuyển tất cả các bộ dữ liệu sang dạng mảng kết hợp
        $cat_id = $result->fetch_assoc();
        // Hiển thị kết quả
        ?>                        
        <div class="section wrap_background">
            <!-- Breadcrumb Section Start -->
            <nav class="bread-crumb">
                <div class="container">
                    <ul class="breadcrumb">                 
                        <li class="home" onclick="window.location.href='index.php'">
                            <i class="material-icons">home</i>
                            <i class="material-icons">keyboard_arrow_right</i>
                        </li>
                        <li>
                            <strong><span> 
                                <?php echo $cat_id['category_brand']; ?>
                            </span></strong>
                        </li>
                    </ul>
                </div>
            </nav> 

        <?php $cate_id = $result->fetch_all(MYSQLI_ASSOC); ?>
        <!-- Danh sach sản phẩm theo cat -->
            <div class="container list-product">
                <div class="col-product">                
                    <?php
                    foreach($cate_id as $key=>$row){?>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="./phone_detail.php?product_id=<?php echo $row['product_id']; ?>">
                                <img src='./image/<?php echo $row['hinh_anh_chinh']; ?>' alt='' class="product-img">
                            </a>                        
                        </div>
                        <div class="product-info">
                            <a href="./phone_detail.php"><?php echo $row['product_name'];?></a>
                            <div class="product-price">
                                <p><?php echo $row['gia_khuyen_mai'];?>$</p>
                                <del><?php echo $row['gia_goc'];?>$</del>
                            </div>
                            
                            <div class="product-add-box">
                                <button class="btn btn-add-box">Add</button>
                                <i class="material-icons">cart</i>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                    

            </div>
        <!-- div tổng -->
        </div> 
        <!-- php tổng -->
        <?php    
            } else {
                echo "Lỗi: " . $conn->error;
            }
            $conn->close();
                }
        ?>


</body>
