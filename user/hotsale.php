<head>
    <title>Hot Sale giá sốc</title>
    <link href="css/hotsale.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/thoi_gian.js" defer></script> <!-- Kết nối script --> 
</head>
<body>
<section style="margin-bottom:20px;">
    <div class="section-deal">
        <div class="container">
        <div class="white lazyload" data-src="image/bg-sale.webp" style ="background-image: url(image/bg-sale.webp);">
            
                
                <div class="d-flex block-title">
                    <h2 class="title-background">
                        <a href="san-pham-khuyen-mai" title="Deal giá sốc">
                            <img src="image/title-sale.webp" alt="title">
                        </a>
                    </h2>
                    <div class="flex-time">
                    <div class="flex-time">
					<div class="timer d-flex">
						Kết thúc sau:
						<div class="timein d-flex" data-time="1/11/2025 15:10:40" data-countdown-type="hours">
							<span class="hours">15</span> &nbsp;:
							<span class="minutes">10</span> &nbsp;:
							<span class="second">00</span>
						</div>
                        
                        
					</div>
				    </div>
                    </div>
                        
                </div>
                <div class="tab-pane-content">
				    <div class="pane active">
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'db_phone');

                                $sql = "select *from db_phone order by giam_gia desc limit 5";
                                    if(isset($_GET["type_phone"]))
                                    {
                                        $type_phone = $_GET["type_phone"];
                                    
                                    
                                        //Viết câu lệnh SQL
                                        $sql = "SELECT product_name, gia_khuyen_mai, gia_goc, hinh_anh_chinh
                                                        FROM db_phone
                                                        WHERE id_type_phone = ".$type_phone." limit 5";
                                    }

                                        // Thực thi câu lệnh
                                        $result = $conn->query($sql);
                                        if ($result) {
                                            // Lấy và chuyển tất cả các bộ dữ liệu sang dạng mảng kết hợp
                                            $db_phone = $result->fetch_all(MYSQLI_ASSOC);
                                            // Hiển thị kết quả
                                            ?>
                                            <div class="grid-container">
                                                <?php   
                                                foreach ($db_phone as $row) {
                                                
                                                ?>
                                                
                                                        <div class="swiper-slide">
									                    
                                                        <div class="product-item-flash">
                                                
                                                        <form action="/cart/add" method="post" class="variants product-action item_product_main"  data-cart-form data-id="product-actions-34149419" enctype="multipart/form-data">
                                                        

                                                                <span class="label-sale ">                                                            
                                                                    Giảm <?php echo $row['giam_gia'];?>%
                                                                </span>
                                                                <a href ="./phone_detail.php?product_id=<?php echo $row['product_id'];?>">
                                                                <img width="214" height="214" class="lazyload img-responsive center-block" src="./image/<?php echo $row['hinh_anh_chinh'];?>"><br>
                                                               
                                                            
                                                                <div class="info-product">
                                                            
                                                                <h3 class="product-name"><b><?php echo $row['product_name'];?></b><br>
                                                                

                                                                </h3>
                                                                </a>
                                                                <div class="price-action">
                                                                    <div class="price-box">
                                                                    
                                                                        <span class="price"><i><?php echo $row['gia_khuyen_mai'];?>đ</i></span>
                                                                        <span class="compare-price"><i><?php echo $row['gia_goc'];?>đ</i></span>

                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="quantity_sale" style="display:block;">
                                                                            <div class="titlecount">
                                                                          
                                                                            <b class="qtyflash">350</b> sản phẩm đã bán
                                                                            </div>

                                                                    <div class="barprocess">
                                                                        <div class="countlength_sale" style = "width:90%;"></div>
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="nowship">
                                                                    Giao siêu tốc 2H
                                                                </div>

                                                            </div>
                                                        
                                                        </form>
                                                </div>
                                                        </div>
                                                    
                                                <?php
                                                }
                                            echo "</div>";
                                        } else {
                                            echo "Lỗi: " . $conn->error;
                                        }
                                        $conn->close();
                                    
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>