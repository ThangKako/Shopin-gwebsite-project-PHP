<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $username=$_SESSION['username'];
    $get_user="Select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    //echo $user_id
    ?>
<h3 class="text-success text-center">Đơn hàng của tôi</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">
    <tr>
        <th>Thứ tự</th>
        <th>Số tiền</th>
        <th>Tổng sản phẩm</th>
        <th>Mã hóa đơn</th>
        <th>Ngày đặt hàng</th>
        <th>Xác nhận đơn hàng</th>
        <th>Trạng thái</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $number = 1;
        $get_order_detail = "SELECT * FROM `user_orders` WHERE user_id=$user_id";
        $result_order = mysqli_query($con,$get_order_detail);
        if (!$result_order) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
          }
        if (mysqli_num_rows($result_order) > 0) {
            while($row_orders = mysqli_fetch_assoc($result_order)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_product = $row_orders['total_product'];
                $invoice_number = $row_orders['invoice_number'];
                $order_status = $row_orders['order_status'];
                if($order_status=='chưa giải quyết'){
                    $order_status='Chưa hoàn thành';
                }else{
                    $order_status='Hoàn thành';
                }
                $order_date = $row_orders['order_date'];

                echo "
                <tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_product</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td><a href='confirm_payment.php?order_id=$order_id'>Đồng ý</a></td>
                    <td>$order_status</td>
                </tr>";
                $number++;
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>Không có đơn hàng nào.</td></tr>";
        }
        ?>  
 
    </tbody>
</table>
</body>
</html>