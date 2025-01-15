<?php
session_start(); 
?> 
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="css/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Kết nối CSS -->
    <title> Ego Mobile </title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
</head>
<body>
	<header class="header index">
	<div class="top-bar d-none d-md-block">
		<div class="header-container">
			<div class="row">
				<div class="col-md-6 text-left">
					<p>
						<span id="greeting">Chúc buổi sáng vui vẻ</span>, Bạn cần thông tin gì hôm nay?
					</p>
				</div>
				<div class="col-md-6  text-right">
					<div class="item-top-bar d-inline-flex">
						Email hỗ trợ:&nbsp;
						<a title="Email" href="mailto:support@sapo.vn">
							nhom5@gmail.com
						</a>
					</div>
					<div class="item-top-bar d-inline-flex">
					<?php
        if (isset ($_SESSION["username"])|| isset ($_COOKIE ["user"])){
        $user = isset($_SESSION ["username"])?$_SESSION ["username"]:$_COOKIE ["user"];
        
        ?> 
		 <span style ="color: white;">
            Xin Chào <?php echo $_SESSION ["username"];?> 
            </span>&nbsp;
            <a href= "logout.php" class ="btnx" > / Đăng xuất </a> 
<?php 
} else {
        ?> 			
						<a class="btnx" href="login.php" title="Đăng nhập">Đăng nhập</a>&nbsp;/&nbsp;
						<a href="signup.php" title="Đăng ký">Đăng ký</a>
						<?php
}
?> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="child-container">
		<div class="header-container">
			<div class="row">
				<div class="col-lg-3 col-xl-3 col-md-3  col-logo ">	
				<a title="logo Ego Mobile" href="index.php" class="logo">	
				<img width="240" height="56" src="image/logo.png" alt="Ego Mobile">
					</a>
				</div>
				<div class="col-md-9 col-lg-9 col-xl-9 group-header-action">
					<div class="item-header search-group">
					<form action="search.php" id="searchForm" method="get" class="header-search-form" role="search">
						<input type="text" name="query" id="searchInput" class="search-auto form-control" onkeyup="searchHeader()" placeholder="Nhập tìm kiếm" autocomplete="off" />
						<button class="btn btn-default" id="submitButton" type="submit" aria-label="Tìm kiếm">
							<i class="material-icons">search</i>
						</button>
						<div id="result-search" class="result-search">
							<ul class="d-flex d-tab">
								<li data-tab="#sp" class="current" onclick="showTab(event, '#sp')">Sản phẩm</li>
								<li data-tab="#tt" onclick="showTab(event, '#tt')">Tin tức</li>
							</ul>
							<div id="sp" class="t-ct current">
							</div>
							<div id="tt" class="t-ct">
							</div>
						</div>
					</form>

					</div>
					<div class="item-header block-phone">
					<i class="material-icons">phone</i>
					
						<div class="right-item ">
							
							Gọi đặt hàng
							<a class="phone" title="Gọi ngay" href="tel:19006750">
								19006750
							</a>
						</div>
					</div>
					<div class="item-header block-store">
					   <i class="material-icons">store</i>
						<div class="right-item">
							Hệ thống
							<a title="Xem ngay" class="phone" href="/he-thong-cua-hang">
								<span>Hơn 12</span> cửa hàng								
							</a>
							
						</div>
					</div>
					<div class="item-header block-cart d-none d-md-inline-flex">
					<i class="material-icons">shopping_cart</i>
					<div class="right-item">
    Giỏ hàng
    <a class="cartcount" href="cart.php" title="Giỏ hàng">
        (<?php echo isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>) sản phẩm
    </a>
</div>
					</div>
				</div>
				<div class="col-12 col-lg-12 col-mobile">
					<div class="navigation-header header_nav_main">
<div class="navigation-head">
	<div class="first-nav d-xl-none d-flex">
		
		<div class="block-img-acc lazyload"  data-src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/img-account.png?1735287986531"></div>
		
		</div>
		<nav class="nav-horizontal">	
		<ul class="item_big" style="margin-left:0px;">              
			<?php
				require_once "config.php";
				$sql = "SELECT DISTINCT category_id, category_brand FROM db_phone";
				$result = $conn->query($sql);
				$first = true;  // Add a flag to check the first item
				if ($result) {
					$list_category = $result->fetch_all(MYSQLI_ASSOC);
					foreach ($list_category as $row) {
						?>  
							<li class="nav-item is-icon lazyload">  
								<?php if ($first) { ?>
									<span class="tag-style" style="background-color:#c800eb;"><span style="background:#c800eb;"></span>HOT</span>
								<?php $first = false; } ?>
								<a class="a-img" href="phone_category.php?category_id=<?php echo $row['category_id']; ?>" > <?php echo $row['category_brand']; ?> </a>                      
							</li> 
						<?php
					}
				}
			?>
			<li class="nav-item has-child  is-icon lazyload" >
			<span class="tag-style" style="background-color:#00a3ff;"><span style="background:#00a3ff;"></span>NEW</span>
				<a class="a-img caret-down" href="/tin-tuc" title="Tin tức"> Tin tức <i class="material-icons">arrow_drop_down</i></a>
				<ul class="dropdown-menu"> <li><a href="/tin-cong-nghe">Tin công nghệ</a></li> <li><a href="/tin-reviews">Tin reviews</a></li> <li><a href="/tin-khuyen-mai">Tin khuyến mãi</a></li> </ul>
			</li>


			<li class="nav-item ">	
				<a class="a-img" href="/lien-he" title="Liên hệ">Liên hệ</a>
			</li>


			<li class="nav-item">	
				<a class="a-img" href="/he-thong-cua-hang" title="Hệ thống cửa hàng">Hệ thống cửa hàng </a>
			</li>
			<li class="nav-item">	
				<a class="a-img" href="/he-thong-cua-hang" title="So sánh sản phẩm">So Sánh sản phẩm </a>
			</li>
		</ul>


 
</header>



</body> 
</html>