<?php
session_start(); 
?> 
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đăng nhập </title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="section wrap_background">
            <!-- Breadcrumb Section Start -->
            <nav class="bread-crumb">
                <div class="container">
                    <ul class="breadcrumb">                 
                        <li class="home" onclick="window.location.href='header.php'">
                            <i class="material-icons">home</i>
                            <i class="material-icons">keyboard_arrow_right</i>
                        </li>
                        <li>
                            <strong><span> 
                                <?php echo "Đăng nhập tài khoản" ?>
                            </span></strong>
                        </li>
                    </ul>
                </div>
            </nav> 

            <div class="page-content-account">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
				<div class="d-group">
					<div class="left-col">
						<div class="group-login group-log">
							<h1 class="title-block-page">Đăng nhập tài khoản</h1>
							<form method="post" action="login.php" accept-charset="UTF-8">
	
							<p class="error">
								
							</p>
							<fieldset class="form-group">
								<label>Tên Đăng Nhập <span class="required">*</span></label>
								<input type="text" class="form-control form-control-lg" value="" name="user" placeholder="Nhập tài khoản" required="" >
                            </fieldset>
							<fieldset class="form-group">
								<label>Mật khẩu <span class="required">*</span> </label>
								<input type="password" class="form-control form-control-lg" value="" name="pass" id="customer_password" placeholder="Mật khẩu" required="">
							</fieldset>
							<button class="btn-login" type="submit" name ="login" value="Đăng nhập">Đăng nhập</button>

							</form>
                            <p>
								Bạn quên mật khẩu bấm <a href="recover.php" onclick="showRecoverPasswordForm();return false;">vào đây</a>
							</p>
					<div class="right-col">
						<a href="signup.php" class="btn-register-default">Đăng ký</a>
					</div>
				</div>
			</div>
		</div>
	</div>	
    </div>
	<?php
            if(isset($_POST['login'])){
                
                $user = $_POST["user"];
                $pass= md5($_POST["pass"]);

                if(!empty($user) && !empty($pass)){
                    require_once "config.php"; 
                    $sql = "SELECT * FROM user
                            WHERE username = ? and password =?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ss', $user,$pass);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows>0 ) {
                            //echo "Đăng nhập thành công!";
                            $user = $result -> fetch_assoc ();
                            $_SESSION ['username']=$user ["username"];
                            setcookie("user", $user["username"], time ()+30000, "/"); 
                            header("Location:index.php");
                        } else {
                            echo "Thông tin tài khoản và mật khẩu không đúng ";
                        }
                    
                } else {
                    echo "Vui lòng nhập dữ liệu!";
                }
                
            }
            ?>
</body>