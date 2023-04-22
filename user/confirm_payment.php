<?php 
include('../include/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="SELECT * FROM `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}


if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode) VALUES ('$order_id','$invoice_number','$amount','$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3>Thanh toán thành công</h3>";
        echo "<script>window.open('profile.php?my_order','_self');</script>";
    }
    $update_orders="update `user_orders` set order_status='Đã thanh toán' where order_id=$order_id";
    $result_order=mysqli_query($con,$update_orders);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
    <div class="container my-5">
    <h1 class="text-center">Xác Nhận Thanh toán</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center m-auto">
            <label for="">Mã hóa đơn</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>"> 
            </div>
            <div class="form-outline my-4 text-center m-auto">
                <label for="">Số tiền cần thanh toán</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>"> 
            </div>
            <div class="form-outline my-4 text-center m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Chọn phương thức thanh toán</option>
                    <option>UPI</option>
                    <option>Ví điện tử</option>
                    <option>Paypal</option>
                    <option>Thanh toán khi giao hàng</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="btn btn-outline-success" value="Đồng ý" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>