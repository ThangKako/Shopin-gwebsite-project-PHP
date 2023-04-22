<?php 
include('../include/connect.php');
include('../function/common_funtion.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

//
$get_ip_address=getIPAddress();
$total_price=0;
//truy vấn lấy thông tin sản phẩm trong giỏ hàng của người dùng với địa chỉ IP tương ứng.
$cart_query_price="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$invoice_number=mt_rand();
$status='chưa giải quyết';
$result_cart_price=mysqli_query($con,$cart_query_price);
//lấy số lượng sản phẩm trong giỏ hàng.
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product="SELECT * FROM `products` WHERE product_id=$product_id";
    $run_price=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}
$get_cart="SELECT * FROM `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

$insert_order="INSERT INTO `user_orders` (user_id,amount_due,invoice_number,total_product,order_date,order_status) value($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_order);
if($result_query){
    echo"<script>alert('Gửi thành công một đơn hàng')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}

//Đơn hàng chờ xử lý
$insert_pending_order="INSERT INTO `order_pending` (user_id,invoice_number,product_id,quantity,order_status) value($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_order=mysqli_query($con,$insert_pending_order);


// Xóa hàng 
$empty_cart="DELETE from `cart_details` where ip_address='$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);
?>