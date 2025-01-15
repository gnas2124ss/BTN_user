<?php
    require "header.php";
?>
<html>
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/listsp.css">
    </head>
<body>
<?php
    require_once "config.php";
    $sql = "select * from type_phone";
    $result = $conn->query($sql);
    $type_phone = [];
    
    if ($result) {
        $type_phone = $result->fetch_all(MYSQLI_ASSOC);
    }

    $type_phone_selected = "";
    if(isset($_GET["type_phone"]))
            {
                $type_phone_selected = $_GET["type_phone"];
            }
 ?>
    <div class="product-container">
            <h1 style="float:left">TẤT CẢ SẢN PHẨM</h1>
        <div class="category-nav" style="float:right">
            <?php foreach($type_phone as $row) 
                    {?>
                    <button><a href="./allproduct.php?type_phone=<?php echo $row['category_id'];?>"> <?php echo $row['category_brand']; ?> </a> </button>
                    <?php
                    }
                    ?>
        </div>
        <br style="clear:both;">
    <?php
        $sql = "select * from db_phone";
        if(isset($_GET["type_phone"]))
        {
            $the_loai = $_GET["type_phone"];
                    //Viết câu lệnh SQL
                    $sql = "SELECT d.product_id, d.product_name, d.mo_ta, d.gia_khuyen_mai, d.gia_goc, d.hinh_anh_chinh, d.phanTram
                                    FROM db_phone d
                                    WHERE category_id = $type_phone_selected";
        }
            $result = $conn->query($sql);
            if ($result) {
                $phone = $result->fetch_all(MYSQLI_ASSOC);
    ?>
        <div class="product-grid">
            <?php
            foreach ($phone as $row) {
                    echo '<div class="product-card">';
                    echo '<div class="discount-label">Giảm ' . $row["giam_gia"] . '%</div>';
                    echo '<img src="./image/' . $row["hinh_anh_chinh"] . '" alt="' . $row["product_name"] . '">';
                    echo '<h2>' . $row["product_name"] . '</h2>';
                    echo '<p>' . $row["mo_ta"] . '</p>';
                    echo '<p class="price">Giá: <span class="discounted">' . $row["gia_khuyen_mai"] . 'đ</span>';
                    echo ' <span class="original">' . $row["gia_goc"] . 'đ</span></p>';
                    echo '<button class="add-to-cart">+</button>';
                    echo '</div>';
                }
            } else {
                echo "<p>Không có sản phẩm nào.</p>";
            }
            $conn->close();

            ?>
        </div>
    </div>
    
</body>