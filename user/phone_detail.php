
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Sale giá sốc</title>
    <link rel="stylesheet" href="css/header.css">
    <link href="css/style_detail.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<?php require_once 'header.php' ;?>  

    <section class="product details-main" itemscope itemtype="https://schema.org/Product">
        <?php
            if(isset($_GET['product_id']))
        {
            require_once "config.php";
            $product_id = $_GET['product_id'];        
        
            //Viết câu lệnh SQL
            $sql = "select* from db_phone where product_id = $product_id";
            // Thực thi câu lệnh
            $result = $conn->query($sql);
            if ($result) {
                // Lấy và chuyển tất cả các bộ dữ liệu sang dạng mảng kết hợp
                $db_phone = $result->fetch_assoc();
                // Hiển thị kết quả
            ?>
            
            <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="detail-wp white-p mr-bt-15">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="product-detail-left product-images">
                                    <div class="product-image-detail">
                                        <div class="swiper-container gallery-top margin-bottom-10 swiper-container-initialized swiper-container-horizontal">
                                            
                                            <img class="swiper-container gallery-top margin-bottom-10 swiper-container-initialized swiper-container-horizontal" src= "./image/<?php echo $db_phone['hinh_anh_chinh'];?>">
                                            
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-12 col-12">
                                <h1 class="title-head"><?php echo $db_phone["product_name"];?></h1>
                                <div class="details-pro">
                                    <div class="prview">
                                        <div class="sapo-product-reviews-badge" data-id="34149156" ></div> 
                                            <div class="sapo-product-reviews-star" data-score="3.5" data-number="5" style="color: #ffbe00" title="good">
                                                <i data-alt="1" class="star-on-png" title="good"></i>&nbsp;                                           
                                                <i data-alt="2" class="star-on-png" title="good"></i>&nbsp;                                            
                                                <i data-alt="3" class="star-on-png" title="good"></i>&nbsp;
                                                <i data-alt="4" class="star-half-png" title="good"></i>&nbsp;
                                                <i data-alt="5" class="star-off-png" title="good"></i>
                                                <input name="score" type="hidden" value="3.5" readonly=""></div>
                                        <span onclick="scrollToSection('reviewtab')">Xem 4 đánh giá</span>
                                    </div>
        
                                    <div class="group-action-button">
                                        <div class="group-power">
                                            <div class="inventory_quantity d-none">
                                                <span class="a-stock a2"><link itemprop="availability" href="http://schema.org/InStock" />Còn hàng</span>
                                            </div>
                                            <p>
                                                Online giá rẻ quá
                                            </p>
                                            <div class="price-box clearfix">
                                                
                                                <div class="product-price">
                                                    <b><?php echo $db_phone["gia_khuyen_mai"];?>đ</b>
                                                </div>
                                                <div class="price-compare">
                                                    <span class="old-price">
                                                        <del class="price product-price-old">
                                                        <b><?php echo $db_phone["gia_goc"];?>đ</b>
                                                        </del>
                                                    </span> 

                                                    <span class="save-price">
                                                        <span class="price product-price-save"></span>
                                                    </span>
                                                </div>
                                                
                                            </div>

                                            <div class="flashdetails ">
        
                                                <div class="timer">
                                                    <div class="d-flex">
                                                        <span>
                                                            Kết thúc sau
                                                        </span>
                                                        <div class="timein" data-time="1/10/2025 15:10:00" data-countdown-type="hours">                                       
                                                            <span class="hours">15</span> &nbsp;:
                                                            <span class="minutes">10</span> &nbsp;:
                                                            <span class="second">00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
        
                                                <div class="flashsale_product">
                                                    <div class="product-item-flash"  data-productID="3" data-qty="350" data-pavailable="true">
                                                        <div class="flashproduct">
                                                            <div class="quantity_sale" style="display:none">
                                                                <div class="titlecount">
                                                                    <b class="qtyflash">350</b> sản phẩm đã bán
                                                                </div>

                                                                <div class="barprocess">
                                                                    <div class="countlength_sale"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kmkemtheo">
                                            <p>Combo ốp lưng, dán màn hình miễn phí</p>
                                        </div>
                                        <div class="d-flex vendor-group">
                                            <div class="vendor">
                                                Thương hiệu: <?php echo $db_phone['category_brand'];?><br><br>
                                            </div>
                                            <div class="type">
                                                Loại: <span>Điện thoại</span><br><br>             
                                            </div>
                                            
                                            <div>
                                                Thông tin sản phẩm: <?php echo $db_phone ['mo_ta'];?><br>
                                            </div>
                                        <div>


                                        <form enctype="multipart/form-data" id="add-to-cart-form" data-cart-form action="add_to_cart.php?product_id=<?php echo $db_phone['product_id'];?>" method="post" class="wishItem">
                                            <input type="hidden" name="properties[Quà tặng]" value="Combo ốp lưng dán màn hình miễn phí"/>
                                                <div class="form-product">
                                                    <div class="clearfix from-action-addcart">
                                                        <div class="qty-ant clearfix custom-btn-number">
                                                            <label class="d-none">Số lượng:</label>
                                                            <div class="custom custom-btn-numbers clearfix input_number_product">		
                                                                <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty) & qty > 1 ) result.value--;return false;" class="btn-minus btn-cts" type="button">–</button>
                                                                <input aria-label="Số lượng" readonly type="text" class="qty input-text" id="qty" name="quantity" size="4" value="1" maxlength="3" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;" />
                                                                <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" class="btn-plus btn-cts" type="button">+</button>
                                                            </div>
                                                        </div>

                                                        <div class="btn-mua">
                                                                    
                                                            <button type="button" class="btn btn-lg btn-gray btn_buy btn-buy-now btn-buy-now-grid">Mua ngay quá rẻ</button>
                                                            <button type="button" onclick="window.location.href='#'" class="btn btn-lg btn-gray btn-tragop">Mua trả góp<span>Duyệt hồ sơ trong 5 phút</span></button>
                                                        
                                                            <button name="addtocart" type="submit" data-role='addtocart' class="btn btn-lg btn-gray btn-cart btn_buy add_to_cart">Thêm vào giỏ<span>Thêm trước thanh toán sau</span></button>
                                               
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>               
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                    
                <div>
            </div>
            </div>
            


            <?php
            }

        }
        ?>
    </section>

</body>
</html>