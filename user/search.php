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
    <?php require_once 'header.php'; ?>  

    <?php
    if (isset($_GET['query'])) {
        require_once "config.php";
        $query = $_GET['query'];
        $sql = "SELECT * FROM db_phone WHERE product_name LIKE '%$query%' OR category_brand LIKE '%$query%'";
        // Thực thi câu lệnh
        $result = $conn->query($sql);    
        if ($result) {
            // Lấy và chuyển tất cả các bộ dữ liệu sang dạng mảng kết hợp
            $cate_id = $result->fetch_all(MYSQLI_ASSOC); ?>
            <div class="section wrap_background">
                <!-- Danh sach sản phẩm theo cat -->
                <div class="container list-product">
                    <div class="col-product">                
                        <?php
                        foreach($cate_id as $key=>$row) { ?>
                        <div class="product-item">
                            <div class="product-top">
                                <a href="product_info.php?id=<?php echo $row['product_id']; ?>">
                                    <img src='./image/<?php echo $row['hinh_anh_chinh']; ?>' alt='' class="product-img">
                                </a>                        
                            </div>
                            <div class="product-info">
                                <a href="product_info.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
                                <div class="product-price">
                                    <p><?php echo $row['gia_khuyen_mai']; ?>$</p>
                                    <del><?php echo $row['gia_goc']; ?>$</del>
                                </div>
                                <div class="product-add-box">
                                    <button class="btn btn-add-box">Add</button>
                                    <i class="material-icons">cart</i>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div> 
            <?php
        } else {
            echo "Lỗi: " . $conn->error;
        }
        $conn->close();
    }
    ?>

</body>
</html>
