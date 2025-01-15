<html>
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/listsp.css">
    </head>
<body>
<?php
    require_once "config.php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT product_id,product_name, mo_ta, gia_khuyen_mai, gia_goc, hinh_anh_chinh, giam_gia FROM db_phone limit 12";
    $result = $conn->query($sql);
?>
<div class="product-container">
    <h1 style="float:left">Sản Phẩm Nổi Bật</h1>
    
    <br style="clear:both;">
    <div class="product-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';?>
                        <a href="./phone_detail.php?product_id=<?php echo $row['product_id']; ?>">
                <?php
                echo '<div class="discount-label">Giảm ' . $row["giam_gia"] . '%</div>';
                echo '<img src="./image/' . $row["hinh_anh_chinh"] . '" alt="' . $row["product_name"] . '">';
                echo '<h2>' . $row["product_name"] . '</h2>';
                echo '<p class="price">Giá: <span class="discounted">' . $row["gia_khuyen_mai"] . 'đ</span>';
                echo ' <span class="original">' . $row["gia_goc"] . 'đ</span></p>';
                echo '<button class="add-to-cart">+</button>';
                echo '</div>';
            }
        } else {
            echo "<p>Không có sản phẩm nào.</p>";
        }
        ?>
    </div>
    
    <div class="load-more-container">
        <button class="load-more"> <a href="./allproduct.php">Xem thêm</a></button>
    </div>
</div>
</body>
</html>

<?php $conn->close(); ?>