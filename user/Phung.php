<head>
    <link rel="stylesheet" type="text/css" rel="noopener" target="_blank" href="css/uudai.css">
</head>
</style>

<body>

<section style="margin-bottom:20px;">
<div class="section_product_endow">
	<div class="container">
		<div class="white product-grid">
			<div class="label-tag lazyload" data-src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/endow_module_tag.png?1735287986531" style="background-image: url(&quot;//bizweb.dktcdn.net/100/507/051/themes/936909/assets/endow_module_tag.png?1735287986531&quot;);"></div>
			<div class="block-title">
				<h2 class="title-module">
					Ưu đãi bất ngờ
				</h2>
			</div>
            <?php
                require_once "config.php";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "select * from type_phone";
                $type_phone = [];
                $result = $conn->query($sql);
                if ($result) {
                    $type_phone = $result->fetch_all(MYSQLI_ASSOC);
                }
            ?>
			<ul class="tabs">
				<li style="background-color:#6fcbff;" class="tab active has-data">
					<span><a href="./Phung.php?type_phone=1">Iphone</a></span>
				</li>
				<li style="background-color:#6fa8ff;" class="tab" >
					<span><a href="./Phung.php?type_phone=2">Samsung</a></span>
				</li>
				<li style="background-color:#ae6fff;" class="tab">
					<span><a href="./Phung.php?type_phone=3">Xaoimi</a></span>
				</li>
				<li style="background-color:#ff6fbd;" class="tab">
					<span><a href="./Phung.php?type_phone=4">Oppo</a></span>
				</li>
			</ul>
            <?php
            $sql = "select * from db_phone limit 12";
            if(isset($_GET["type_phone"]))
            {
                $type_phone = $_GET["type_phone"];
            
            
                //Viết câu lệnh SQL
                $sql = "SELECT product_id, product_name, mo_ta, gia_khuyen_mai, gia_goc, hinh_anh_chinh, category_id
                                FROM db_phone
                                WHERE category_id = ".$type_phone." limit 12";
            }
                $result = $conn->query($sql);
                if ($result) {
                    $phone = $result->fetch_all(MYSQLI_ASSOC);
            ?>
			<div class="tab-content">
            <div class="grid-container">
            <?php   
            foreach ($phone as $row) {
            ?>
					<div class="row">
						<div class="col-lg-2-5 col-xl-2 col-md-3 col-6">
                            <form action="/cart/add" method="post" class="variants product-action item_product_main" data-cart-form="" data-id="product-actions-34149032" enctype="multipart/form-data">
                                <a href="./phone_detail.php?product_id=<?php echo $row['product_id'];?>">
                                    <span class="label-sale ">
                                        Giảm 8% 
                                    </span>
                                    <img style="transform:scale(0.9); width: 200px;height: 214px; margin-bottom: 0;" src="./image/<?php echo $row['hinh_anh_chinh']?>"><br>
                                </a>  
                                <div class="info-product">
                                    <p class="product-name"><?php echo $row['product_name'];?></p>
                                    <div class="price-action">
                                        <div class="price-box">
                                            <span class="price"><b><?php echo $row['gia_khuyen_mai'];?></b></span><br>
                                            <span class="compare-price"><?php echo $row['gia_goc'];?></span>
                                        </div>
                                        <div class="action-cart">
                                            <span class="more-action">
                                                <svg class="icon"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#plusicon"></use> </svg>
                                            </span>
                                            <div class="group-action">
                                                <input type="hidden" name="variantId" data-qty="1000000" value="106946027">
                                                <button data-text="Thêm vào giỏ" class="btn-buy btn-left btn-views add_to_cart " title="Thêm vào giỏ">
                                                    <svg class="icon svg-cart"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#addcarticon"></use> </svg>
                                                </button>
                                                <a class="quick-view btn-views" data-text="Xem nhanh" href="javascript:;" title="Xem nhanh" onclick="onQuickView(this);" data-handle="apple-iphone-14-pro-max-128gb-vn-a">
                                                    <svg class="icon svg-qv"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#searchicon"></use> </svg>
                                                </a>
                                                
                                                <a href="javascript:;" data-url="/apple-iphone-14-pro-max-128gb-vn-a" data-text="So sánh" data-type="Điện thoại" data-img="//bizweb.dktcdn.net/thumb/thumb/100/507/051/products/iphone-14-pro-m-main-979.png?v=1704424297997" data-name="Apple iPhone 14 Pro Max 128Gb (VN/A)" title="Thêm vào so sánh" class="compare-link btn-views d-inline-block"><svg class="icon compa"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#compareIcon"></use> </svg></a>
                                            </div>
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
                            ?>
                
                            <div class="col-12 text-center" style =" text-align: center !important;">
							<a class="button-default" href="" title="Xem thêm">Xem thêm (18) sản phẩm</a>
						</div>
                        <?php
                        } else {
                            echo "Lỗi: " . $conn->error;
                        }
                        $conn->close();
                        ?>
				<div class="tab-pane"></div>
				<div class="tab-pane"></div>
				<div class="tab-pane"></div>
				<div class="tab-pane"></div>

            
		</div>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.querySelector('.tab-pane:first-child').style.display = 'block';
		document.querySelector('.tab:first-child').classList.add('active');
		document.querySelector('.tab:first-child').classList.add('has-data');
		document.querySelectorAll('.tab').forEach(function(tab) {
			tab.addEventListener('click', function() {
				let tabIndex = Array.from(document.querySelectorAll('.tab')).indexOf(tab);
				document.querySelectorAll('.tab').forEach(function(tab) {
					tab.classList.remove('active');
				});
				tab.classList.add('active');

				document.querySelectorAll('.tab-pane').forEach(function(tabPane) {
					tabPane.style.display = 'none';
				});

				document.querySelector('.tab-pane:nth-child(' + (tabIndex + 1) + ')').style.display = 'block';
				let url = tab.dataset.url;

				if (tab.classList.contains('has-data')) {
					BaseGlobal.resizeImageAuto('.image_thumb');
					BaseGlobal.lazyloadImage(theme.settings.lazyload);
					const favoriteLinks = document.querySelectorAll('.favorite-link');
					favoriteLinks.forEach(link => {
						link.addEventListener('click', toggleFavorite);
					});
					const compareLinks = document.querySelectorAll('.compare-link');
					compareLinks.forEach(com => {
						com.addEventListener('click', toggleCompare);
					});
					updateUI();
					updateUIC();
				}else {
					fetch(url + '?view=datatab')
						.then(response => response.text())
						.then(data => {
						if (data.includes("<!DOCTYPE html>")) {
							document.querySelector('.tab-pane:nth-child(' + (tabIndex + 1) + ')').innerHTML = '<div class="alert alert-warning alert-dismissible margin-top-15 section" role="alert">Danh mục đang cập nhật sản phẩm</div>';
						} else {
							document.querySelector('.tab-pane:nth-child(' + (tabIndex + 1) + ')').innerHTML = data;
							BaseGlobal.resizeImageAuto('.image_thumb');
							BaseGlobal.lazyloadImage(theme.settings.lazyload);
							document.querySelectorAll('.add_to_cart').forEach(function(element) {
								element.addEventListener('click', BaseGlobal.addToCartFly);
							});
							document.querySelectorAll('.btn-buy-now-grid').forEach(function(element) {
								element.addEventListener('click', BaseGlobal.addToCartFast);
							});
						}
						tab.classList.add('has-data');
						const favoriteLinks = document.querySelectorAll('.favorite-link');
						favoriteLinks.forEach(link => {
							link.addEventListener('click', toggleFavorite);
						});
						const compareLinks = document.querySelectorAll('.compare-link');
						compareLinks.forEach(com => {
							com.addEventListener('click', toggleCompare);
						});
						updateUI();
						updateUIC();
					})
						.catch(error => {
						console.error("Lỗi khi tải dữ liệu từ URL: " + url);
					});

					tab.classList.add('has-data');

				}

			});
		});
	});
</script></section>
</body>
</html>
