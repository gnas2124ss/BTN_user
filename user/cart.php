<?php
require_once 'header.php';
?>
<head>
    <link rel="stylesheet" href="css/cart.css"> <!-- Thêm file CSS ở đây -->
</head>
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
                        <?php echo "Giỏ hàng của bạn" ?>
                    </span></strong>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (isset($_SESSION['cart'])) {
        echo "<h1 class='cart-title'>Giỏ hàng của bạn có " . count($_SESSION['cart']) . " sản phẩm.</h1>"; 
    } else {
        echo "0";
    }
    ?>

    <table class="cart-table">
        <tr>
            <th>Số thứ tự</th>
            <th>Hình ảnh</th>
            <th>Mã sp</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
        <?php
        if (isset($_SESSION['cart'])) {
            $tongtien = 0;
            $i = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
                $i++;
                $id = $cart_item['id'];
                $soluong = isset($cart_item['soluong']) ? (int)$cart_item['soluong'] : 0;
                $giagoc = isset($cart_item['giagoc']) ? (float)$cart_item['giagoc'] : 0;
                $thanhtien = $soluong * $giagoc;
                $tongtien += $thanhtien;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><img src='./image/<?php echo $cart_item['hinhanhchinh']; ?>' class="product-image"></td>
            <td><?php echo $cart_item['id']; ?></td>
            <td><?php echo $cart_item['tensanpham']; ?></td>
            <td><?php echo $cart_item['soluong']; ?></td>
            <td><?php echo number_format($cart_item['giagoc'], 0, ',', '.'); ?></td>
            <td><?php echo number_format($thanhtien, 0, ',', '.') ?></td>
            <td>
                <button class="remove-button">
                    <a href="add_to_cart.php?xoa=<?php echo $cart_item['id']; ?>">Xóa</a>
                </button>
            </td> 
        </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="8">
                <p class="total-price">TỔNG TIỀN: <?php echo number_format($tongtien, 0, ',', '.'); ?></p>
                <button class="order-button">ĐẶT HÀNG</button>
            </td>
        </tr>
        <?php
        } else {
        ?>
        <tr>
            <td colspan="8"><p>Hiện tại giỏ hàng trống!</p></td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>