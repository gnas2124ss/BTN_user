<?php
session_start();
require_once "config.php";

if(isset($_SESSION['cart'])&&$_GET['xoa']) {
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'] + 1,
                'giagoc' => $cart_item['giagoc'],
                'hinhanhchinh' => $cart_item['hinhanhchinh']
            );
        }
    }
    $_SESSION['cart'] = $product;
    header('Location:cart.php');
}


// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['addtocart'])) {
    $product_id = $_GET['product_id'];
    $soluong = 1;
    $sql = "SELECT product_id, product_name, gia_khuyen_mai, gia_goc, hinh_anh_chinh FROM db_phone WHERE product_id='" . $product_id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(array(
            'tensanpham' => $row['product_name'],
            'id' => $row['product_id'],
            'soluong' => $soluong,
            'giagoc' => $row['gia_goc'],
            'hinhanhchinh' => $row['hinh_anh_chinh']
        ));

        // Kiểm tra session giỏ hàng tồn tại
        if (isset($_SESSION['cart'])) {
            $found = false;
            $product = array();
            foreach ($_SESSION['cart'] as $cart_item) {
                // Nếu dữ liệu trùng
                if ($cart_item['id'] == $product_id) {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'] + 1,
                        'giagoc' => $cart_item['giagoc'],
                        'hinhanhchinh' => $cart_item['hinhanhchinh']
                    );
                    $found = true;
                } else {
                    // Nếu dữ liệu không trùng
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'],
                        'giagoc' => $cart_item['giagoc'],
                        'hinhanhchinh' => $cart_item['hinhanhchinh']
                    );
                }
            }
            if ($found == false) {
                // Liên kết dữ liệu new product với product
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location: cart.php');
    exit();
}
?>