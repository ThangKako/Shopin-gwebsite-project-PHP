<?php 
include('../include/connect.php');
include('../function/common_funtion.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shopping Online PHP Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Admin Board</title>
    <link rel="stylesheet" type="text/css" href="../stlye.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- font Awsome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<style>
		.Admin_img{
  width: 100px;
  object-fit: contain;
}
.product_img{
  width:100px ;
  object-fit: contain;
}
	</style>
</head>
<body>

<div class="container-fluid" p-0>
	<!--first-->
	<nav class="navbar navbar-expland-lg navbar-light bg-success">
		<div class="container-fluid">
			<img src="../img/products/Pin.png" alt="" class="logo">
			<nav class="navbar navbar-expland-lg">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="" class="nav-link">Welcome</a>
					</li>
				</ul>
			</nav>
		</div>
	</nav>

	<!--second-->
	<div class="bg-light">
		<h3 class="text-center p-2"> Thông tin quản lý</h3>		
	</div>
	<div class="row">
		<div class="col-md-12  p-1 d-flex align-item-center">
			<div class="px-5">
				<a href="#"><img src="../img/User/admin.png" alt="" class="Admin_img"></a>
				<p class="text-center">Admin <?php echo "$_SESSION[admin_name]." ?></p>
			</div>
			<div class="text-center">
				<a href="insert_product.php" class="btn btn-outline-success">Thêm sản phẩm</a>
				<a href="index.php?view_products" class="btn btn-outline-success">Xem sản phẩm</a>
				<a href="index.php?insert_category" class="btn btn-outline-success">Thêm danh mục</a>
				<a href="index.php?insert_brand" class="btn btn-outline-success">Thêm nhãn hiệu</a>
				<a href="index.php?view_category" class="btn btn-outline-success">Xem danh mục</a>
				<a href="index.php?view_brand" class="btn btn-outline-success">Xem nhãn hiệu</a>
				<a href="index.php?list_order" class="btn btn-outline-success">Đơn hàng</a>
				
				<a href="index.php?list_payment" class="btn btn-outline-success">Khoản thu</a>
				<a href="index.php?list_user" class="btn btn-outline-success">Tài khoản</a>
				<a href="index.php?admin_logout" class="btn btn-outline-success">Đăng xuất</a>
			</div> 
	</div>
	<div class="container my-5">
		<?php
		if(isset($_GET['insert_category'])){
			include('insert_category.php');
		}
		if(isset($_GET['insert_brand'])){
			include('insert_brand.php');
		}
		if(isset($_GET['view_products'])){
			include('view_products.php');
		}
		if(isset($_GET['edit_products'])){
			include('edit_products.php');
		}
		if(isset($_GET['delete_product'])){
			include('delete_product.php');
		}
		if(isset($_GET['view_category'])){
			include('view_category.php');
		}
		if(isset($_GET['view_brand'])){
			include('view_brand.php');
		}
		if(isset($_GET['edit_category'])){
			include('edit_category.php');
		}
		if(isset($_GET['edit_brand'])){
			include('edit_brand.php');
		}
		if(isset($_GET['delete_category'])){
			include('delete_category.php');
		}
		if(isset($_GET['delete_brand'])){
			include('delete_brand.php');
		}
		if(isset($_GET['list_order'])){
			include('list_order.php');
		}
		if(isset($_GET['list_payment'])){
			include('list_payment.php');
		}
		if(isset($_GET['list_user'])){
			include('list_user.php');
		}
		if(isset($_GET['admin_logout'])){
			include('admin_logout.php');
		}
	
		?>
	</div>
</div>

	

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer>
<footer id="contact">
  <div class="container ">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <h4>Về Chúng Tôi</h4>
        <p>Sứ mệnh của chúng tôi là cung cấp cho khách hàng trải nghiệm mua sắm tốt nhất có thể. Chúng tôi cung cấp nhiều lựa chọn sản phẩm chất lượng cao với giá cả cạnh tranh và chúng tôi cam kết cung cấp dịch vụ khách hàng xuất sắc.</p>
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Liên Hệ</h4>
        <ul>
          <li><i class="fa fa-phone"></i> 123-456-7890</li>
          <li><i class="fa fa-envelope"></i> info@example.com</li>
          <li><i class="fa fa-map-marker"></i> 123 Trần Thanh Ngọ, Kiến An, Hải Phòng</li>
        </ul>
      </div>
      
      <div class="col-md-3 col-sm-6">
        <h4>Tài khoản mạng xã hội</h4>
        <ul class="social-icons">
          <li><a href="#"><i class="fa-brands fa-facebook"></i></i></a></li>
          <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bg-body-tertiary p3 text-center"><p>Bài Làm Đồ Án - Designed by Hoàng Mạnh Thắng - 2023</p></div>
</footer>
</html>