<h3 class="text-center text-success">Tất cả khoản thu</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">
        <?php
        $get_payments="Select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);
        

    if($row_count==0){
        echo "<h2 class='text-center mt-5'>Không có khoản thu</h2>";
    }else{
        echo "
        <tr>
            <th>Stt</th>
            <th>Mã hóa đơn</th>
            <th>Tổng tiền</th>
            <th>Phương thức thanh toán</th>
            <th>Ngày đặt hàng</th>
        </tr>
    </thead>
    <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id =$row_data['payment_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $date=$row_data['date'];
            $payment_mode=$row_data['payment_mode'];
            $number++;
            echo "
            <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
        </tr>
            ";
        }
    }
        ?>
        
        
    </tbody>
</table>