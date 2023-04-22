<h3 class="text-center text-success">Tất cả đơn hàng</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">
        <?php
        $get_order="Select * from `user_orders`";
        $result=mysqli_query($con,$get_order);
        $row_count=mysqli_num_rows($result);
        

    if($row_count==0){
        echo "<h2 class='text-center mt-5'>Không có đơn hàng nào</h2>";
    }else{
        echo "
        <tr>
            <th>Stt</th>
            <th>Số tiền</th>
            <th>Mã hóa đơn</th>
            <th>Tổng sản phẩm</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_product=$row_data['total_product'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
            echo "
            <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_product</td>
            <td>$order_date</td>
            <td>$order_status</td>
        </tr>
            ";
        }
    }
        ?>
        
        
    </tbody>
</table>