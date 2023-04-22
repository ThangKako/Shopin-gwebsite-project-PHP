<h3 class="text-center text-success">Tài khoản trên hệ thống</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">
        <?php
        $get_user="Select * from `user_table`";
        $result=mysqli_query($con,$get_user);
        $row_count=mysqli_num_rows($result);
        

    if($row_count==0){
        echo "<h2 class='text-center mt-5'>Không có tài khoản nào</h2>";
    }else{
        echo "
        <tr>
            <th>Stt</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Ảnh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại liên lạc</th>
        </tr>
    </thead>
    <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username =$row_data['username'];
            $useremail=$row_data['useremail'];
            $user_img=$row_data['user_img'];
            $user_address=$row_data['user_address'];
            $phone=$row_data['phone'];
            $number++;
            echo "
            <tr>
            <td>$number</td>
            <td>$username</td>        
            <td>$useremail</td>
            <td><img src='../user/user_imgs/$user_img' alt='$username' class='product_img'</td>
            <td>$user_address</td>
            <td>$phone</td>
            s 
        </tr>
            ";
        }
    }
        ?>
        
        
    </tbody>
</table>